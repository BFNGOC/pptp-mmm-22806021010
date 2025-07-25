<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
class ProductController
{
    private $productModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    // Kiểm tra quyền Admin
    private function isAdmin() {
        return SessionHelper::isAdmin();
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function add()
    {
        // if (!$this->isAdmin()) {
        //     echo "Bạn không có quyền truy cập chức năng này!";
        //     exit;
        // }
        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }
    public function save()
    {
        // if (!$this->isAdmin()) {
        //     echo "Bạn không có quyền truy cập chức năng này!";
        //     exit;
        // }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = "";
            }
            $result = $this->productModel->addProduct(
                $name,
                $description,
                $price,
                $category_id,
                $image
            );
            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product');
            }
        }
    }
    public function edit($id)
    {
        // if (!$this->isAdmin()) {
        //     echo "Bạn không có quyền truy cập chức năng này!";
        //     exit;
        // }
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }
    public function update()
    {
        // if (!$this->isAdmin()) {
        //     echo "Bạn không có quyền truy cập chức năng này!";
        //     exit;
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = $_POST['existing_image'];
            }
            $edit = $this->productModel->updateProduct(
                $id,
                $name,
                $description,
                $price,
                $category_id,
                $image
            );
            if ($edit) {
                header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }
    public function delete($id)
    {
        // if (!$this->isAdmin()) {
        //     echo "Bạn không có quyền truy cập chức năng này!";
        //     exit;
        // }
        
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
    private function uploadImage($file)
    {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh.");
        }
        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
        }
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
        }
        return $target_file;
    }
    public function addToCart($id)
    {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }
        header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart');
    }
    public function list()
    {
        $products = $this->productModel->getProducts();
        require_once 'app/views/product/list.php';
    }
    public function cart()
    {
        $cart = isset($_SESSION['cart']) ?  $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }

    public function checkout()
    {
        include 'app/views/product/checkout.php';
    }

    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }

            $this->db->beginTransaction();

            try {
                $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->execute();
                $order_id = $this->db->lastInsertId();

                $cart = $_SESSION['cart'];
                foreach ($cart as $product_id => $item) {
                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }

                unset($_SESSION['cart']);
                $this->db->commit();
                header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/orderConfirmation');
            } catch (Exception $e) {
                $this->db->rollBack();
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }

    public function orderConfirmation()
    {
        include 'app/views/product/orderConfirmation.php';
    }

    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id && isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart');
        exit;
    }

    public function updateCart()
    {
        // Chỉ xử lý nếu request là POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $_POST['quantities'] sẽ là một mảng вида [product_id => quantity]
            if (isset($_POST['quantities']) && is_array($_POST['quantities'])) {
                
                foreach ($_POST['quantities'] as $id => $quantity) {
                    // Đảm bảo id và số lượng là số nguyên
                    $id = (int)$id;
                    $quantity = (int)$quantity;

                    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                    if (isset($_SESSION['cart'][$id])) {
                        if ($quantity > 0) {
                            // Cập nhật số lượng mới
                            $_SESSION['cart'][$id]['quantity'] = $quantity;
                        } else {
                            // Nếu số lượng là 0 hoặc nhỏ hơn, xóa sản phẩm khỏi giỏ
                            unset($_SESSION['cart'][$id]);
                        }
                    }
                }
            }
        }
        // Sau khi cập nhật xong, chuyển hướng người dùng trở lại trang giỏ hàng
        header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart');
        exit;
    }
    // Tăng số lượng sản phẩm trong cart
    public function increaseQuantity($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        }
        // Sau khi tăng, quay lại trang cart
        header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart');
        exit;
    }

    // Giảm số lượng sản phẩm trong cart
    public function decreaseQuantity($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            // Nếu quantity > 1, giảm, còn không thì xóa khỏi cart
            if ($_SESSION['cart'][$id]['quantity'] > 1) {
                $_SESSION['cart'][$id]['quantity']--;
            } else {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart');
        exit;
    }
}

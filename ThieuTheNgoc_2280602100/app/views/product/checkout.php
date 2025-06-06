<?php 
// Đặt session_start() ở đầu nếu chưa có, để có thể truy cập $_SESSION['cart']
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'app/views/shares/header.php'; 

// Lấy thông tin giỏ hàng từ session để hiển thị
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold">Thanh Toán</h1>
        
        <?php if (empty($cart)): ?>
            <div class="text-center p-5 bg-white rounded-3 shadow-sm">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                <h3 class="text-muted">Không có sản phẩm nào để thanh toán.</h3>
                <p>Vui lòng quay lại giỏ hàng và thêm sản phẩm.</p>
                <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart" class="btn btn-primary mt-3">
                    <i class="fas fa-arrow-left me-2"></i>Quay lại giỏ hàng
                </a>
            </div>
        <?php else: ?>

            <!-- Form phải bao bọc cả hai cột để gửi đi tất cả dữ liệu -->
            <form method="POST" action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/processCheckout">
                <div class="row g-4">

                    <!-- CỘT BÊN TRÁI: THÔNG TIN GIAO HÀNG & THANH TOÁN -->
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">Thông tin giao hàng</h4>

                                <!-- Sử dụng Floating Labels cho giao diện hiện đại -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                    <label for="name">Họ và tên</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                    <label for="phone">Số điện thoại</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="address" name="address" placeholder="Địa chỉ" style="height: 100px" required></textarea>
                                    <label for="address">Địa chỉ</label>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">Phương thức thanh toán</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                    <label class="form-check-label" for="cod">
                                        Thanh toán khi nhận hàng (COD)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" disabled>
                                    <label class="form-check-label text-muted" for="bank_transfer">
                                        Chuyển khoản ngân hàng (Sắp có)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CỘT BÊN PHẢI: TÓM TẮT ĐƠN HÀNG -->
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">Đơn hàng của bạn</h4>
                                
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($cart as $item): ?>
                                        <?php 
                                            $subtotal = $item['price'] * $item['quantity'];
                                            $total += $subtotal;
                                        ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div>
                                                <?php echo htmlspecialchars($item['name']); ?>
                                                <small class="d-block text-muted">Số lượng: <?php echo $item['quantity']; ?></small>
                                            </div>
                                            <span class="text-dark"><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Tạm tính</p>
                                    <p class="mb-2"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Phí vận chuyển</p>
                                    <p class="mb-2 text-success">Miễn phí</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5">
                                    <p class="mb-0">Tổng cộng</p>
                                    <p class="mb-0"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</p>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-check-circle me-2"></i>Hoàn tất đơn hàng
                                    </button>
                                </div>
                                
                                <div class="text-center mt-3">
                                    <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart" class="text-muted small">
                                        <i class="fas fa-arrow-left me-1"></i>Quay lại giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
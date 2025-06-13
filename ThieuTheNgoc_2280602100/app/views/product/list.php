<?php include 'app/views/shares/header.php'; ?>
<style>
    body {
        background-color: #1a1a1a;
        color: #f8f9fa;
    }

    .container {
        max-width: 900px;
    }

    h1 {
        font-weight: 700;
        color: #f8f9fa;
        text-align: center;
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-success {
        background: linear-gradient(45deg, #28a745, #218838);
        border-radius: 10px;
        padding: 10px 20px;
        color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(40, 167, 69, 0.5);
    }

    .list-group-item {
        background: linear-gradient(135deg, #2c2c2c, #3a3a3a);
        border: 1px solid transparent;
        border-radius: 25px;
        margin-bottom: 1.5rem;
        padding: 2rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        gap: 2.5rem;
        transition: transform 0.4s ease, box-shadow 0.4s ease, background 0.4s ease;
        overflow: hidden;
        position: relative;
    }

    .list-group-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0, 196, 180, 0.1), transparent);
        z-index: 0;
        transition: opacity 0.4s ease;
        opacity: 0;
    }

    .list-group-item:hover::before {
        opacity: 1;
    }

    .list-group-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
        background: linear-gradient(135deg, #343434, #444444);
    }

    .product-image {
        max-width: 130px;
        border-radius: 15px;
        border: 2px solid transparent;
        background: linear-gradient(45deg, #00c4b4, #218838) padding-box, linear-gradient(45deg, #00c4b4, #218838) border-box;
        /* Viền gradient */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        flex-shrink: 0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .list-group-item:hover .product-image {
        transform: scale(1.1);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
    }

    .product-details {
        flex-grow: 1;
        z-index: 1;
    }

    .product-details h2 {
        font-size: 1.6rem;
        margin-bottom: 0.6rem;
        font-weight: 600;
    }

    .product-details h2 a {
        color: #00c4b4;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .product-details h2 a:hover {
        color: #009b8b;
    }

    .product-details p {
        color: #d1d1d1;
        margin-bottom: 0.6rem;
        font-size: 0.95rem;
    }

    .btn-warning {
        background: linear-gradient(45deg, #ffca2c, #e0b828);
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        color: #1a1a1a;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 202, 44, 0.3);
    }

    .btn-warning:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(255, 202, 44, 0.5);
    }

    .btn-danger {
        background: linear-gradient(45deg, #dc3545, #b02a37);
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .btn-danger:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(220, 53, 69, 0.5);
    }

    @media (max-width: 576px) {
        .list-group-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 1.5rem;
        }

        .product-image {
            max-width: 100px;
            margin-bottom: 1rem;
        }

        .product-details h2 {
            font-size: 1.4rem;
        }
    }
</style>

<div class="container mt-5">
    <h1>Danh sách sản phẩm</h1>
    <?php if (SessionHelper::isAdmin()): ?>
        <div class="text-center mb-4">
            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
        </div>
    <?php endif; ?>
    
    <ul class="list-group" id="product-list">
        <!-- Sản phẩm sẽ được render tại đây bằng JS -->
    </ul>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem('jwtToken');

        if (!token) {
            alert('Vui lòng đăng nhập');
            location.href = '/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/login'; // Điều hướng đến trang đăng nhập
            return;
        }

        fetch('/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/api/product', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const productItem = document.createElement('li');
                productItem.className = 'list-group-item';

                const imageSrc = product.image 
                    ? `/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/${product.image}` 
                    : '/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/images/no-image.png';


                productItem.innerHTML = `
                    <img src="${imageSrc}" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <h2>
                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/show/${product.id}">
                                ${product.name}
                            </a>
                        </h2>
                        <p>${product.description}</p>
                        <p>Giá: ${parseInt(product.price).toLocaleString()} VND</p>
                        <p>Danh mục: ${product.category_name}</p>
                        <div class="d-flex gap-2">
                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/edit/${product.id}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Sửa
                            </a>
                            <button onclick="deleteProduct(${product.id})" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i> Xóa
                            </button>
                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/addToCart/${product.id}" class="btn btn-primary">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                `;

                productList.appendChild(productItem);
            });
        });
    });

    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            fetch(`/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/api/product/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('jwtToken')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Product deleted successfully') {
                    location.reload();
                } else {
                    alert('Xóa sản phẩm thất bại');
                }
            });
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #1a1a1a;
        }
        .navbar {
            background-color: #e9ecef;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .navbar-brand {
            font-weight: 700;
            color: #1a1a1a !important;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #1a1a1a !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #00c4b4 !important;
        }
        .navbar-toggler {
            border-color: #1a1a1a;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(26, 26, 26, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .nav-item.flex {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 150px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/">Quản lý sản phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item flex">
                        <a class="nav-link" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart">Xem giỏ hàng</a>
                        <span class="badge bg-info ms-1" id="cart-count">0</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/add">Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Category/list">Quản lý danh mục</a>
                    </li>

                    <!-- JWT User Info -->
                    <li class="nav-item" id="nav-user-info" style="display: none;">
                        <a class="nav-link" id="user-info-name"></a>
                    </li>

                    <!-- Login/Logout buttons -->
                    <li class="nav-item" id="nav-login">
                        <a class="nav-link" href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/login">Đăng nhập</a>
                    </li>
                    <li class="nav-item" id="nav-logout" style="display: none;">
                        <a class="nav-link" href="#" onclick="logout()">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Nội dung sẽ được include ở đây -->
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JWT Token Script -->
    <script>
        function logout() {
            localStorage.removeItem('jwtToken');
            location.href = '/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/login';
        }

        document.addEventListener("DOMContentLoaded", function () {
            const token = localStorage.getItem('jwtToken');
            if (token) {
                try {
                    const payload = JSON.parse(atob(token.split('.')[1]));
                    const username = payload.data?.username || "Người dùng";
                    const role = payload.data?.role;

                    document.getElementById('user-info-name').innerText = `${username} (${role})`;
                    document.getElementById('nav-user-info').style.display = 'block';
                    document.getElementById('nav-login').style.display = 'none';
                    document.getElementById('nav-logout').style.display = 'block';
                } catch (e) {
                    console.error("Lỗi khi giải mã JWT:", e);
                    localStorage.removeItem('jwtToken');
                }
            } else {
                document.getElementById('nav-user-info').style.display = 'none';
                document.getElementById('nav-login').style.display = 'block';
                document.getElementById('nav-logout').style.display = 'none';
            }
        });
    </script>
</body>
</html>

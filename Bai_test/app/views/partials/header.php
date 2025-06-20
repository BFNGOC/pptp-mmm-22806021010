<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once "app/controllers/HocPhanController.php";

// Gọi hàm controller để lấy số lượng học phần đã đăng ký
$soLuongHP = HocPhanController::countGioHang();
?>

<div class="navbar">
    <div class="navbar-container">
        <a href="index.php" class="navbar-link">Sinh Viên</a>
        <a href="index.php?action=hocphan" class="navbar-link">Học Phần</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?action=giohang" class="navbar-link">
                Đăng kí (<?= $soLuongHP ?>)
            </a>
            <span class="navbar-welcome">
                Xin chào <?= $_SESSION['user']['HoTen'] ?>!
            </span>
            <a href="index.php?action=logout" class="navbar-link logout-btn">Đăng xuất</a>
        <?php else: ?>
            <a href="index.php?action=login" class="navbar-link">Đăng nhập</a>
        <?php endif; ?>
    </div>
</div>

<style>
    /* General navbar styles */
    .navbar {
        background-color: #333;
        padding: 10px 0;
    }

    .navbar-container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
    }

    /* Navbar links */
    .navbar-link {
        color: white;
        text-decoration: none;
        margin-right: 15px;
        font-size: 1rem;
        font-weight: 500;
        transition: color 0.3s;
    }

    .navbar-link:hover {
        color: #3498db;
    }

    /* Welcome message */
    .navbar-welcome {
        color: white;
        margin-right: 15px;
        font-weight: 500;
    }

    /* Logout button styling */
    .logout-btn {
        background-color: #e74c3c;
        padding: 8px 15px;
        border-radius: 4px;
        color: white;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .navbar-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar-link {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .navbar-welcome {
            margin-bottom: 10px;
        }

        .logout-btn {
            margin-top: 10px;
        }
    }
</style>

</body>
</html>

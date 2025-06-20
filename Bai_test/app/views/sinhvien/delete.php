<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2>XÓA THÔNG TIN SINH VIÊN</h2>
    <p class="warning-message">Bạn có chắc chắn muốn xóa thông tin này không?</p>

    <div class="student-info">
        <div><strong>Họ tên:</strong> <?= $sv['HoTen'] ?></div>
        <div><strong>Giới tính:</strong> <?= $sv['GioiTinh'] ?></div>
        <div><strong>Ngày sinh:</strong> <?= $sv['NgaySinh'] ?></div>
        <div class="image-container">
            <img src="images/<?= $sv['Hinh'] ?>" alt="Student Image" class="student-image">
        </div>
        <div><strong>Mã ngành:</strong> <?= $sv['MaNganh'] ?></div>
    </div>

    <form method="POST" class="delete-form">
        <button type="submit" class="confirm-btn">Xác nhận xóa</button>
        <a href="index.php" class="cancel-btn">Quay lại danh sách</a>
    </form>
</div>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 90%;
        max-width: 800px;
        margin: 20px auto;
        background-color: white;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        text-align: center;
        color: #e74c3c;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .warning-message {
        color: #e74c3c;
        font-size: 1.2rem;
        text-align: center;
        margin-bottom: 30px;
    }

    .student-info {
        margin-bottom: 30px;
        font-size: 1.1rem;
        color: #34495E;
    }

    .student-info div {
        margin-bottom: 12px;
    }

    .image-container {
        text-align: center;
        margin-top: 10px;
    }

    .student-image {
        max-width: 100%;
        max-height: 150px;
        border-radius: 8px;
    }

    .delete-form {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        text-align: center;
    }

    .confirm-btn,
    .cancel-btn {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        color: white;
    }

    .confirm-btn {
        background-color: #e74c3c;
    }

    .confirm-btn:hover {
        background-color: #c0392b;
    }

    .cancel-btn {
        background-color: #3498db;
    }

    .cancel-btn:hover {
        background-color: #2980b9;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }

        h2 {
            font-size: 1.8rem;
        }

        .warning-message {
            font-size: 1rem;
        }

        .student-info {
            font-size: 1rem;
        }

        .student-image {
            max-width: 80%;
        }

        .delete-form {
            flex-direction: column;
            align-items: center;
        }

        .confirm-btn,
        .cancel-btn {
            width: 100%;
            padding: 12px 20px;
            margin: 5px 0;
        }
    }
</style>

</body>
</html>

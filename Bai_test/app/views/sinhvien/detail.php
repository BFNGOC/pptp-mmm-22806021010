<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2>Chi tiết sinh viên</h2>
    
    <div class="student-details">
        <div class="detail-item">
            <strong>Mã SV:</strong> <?= $sv['MaSV'] ?>
        </div>
        <div class="detail-item">
            <strong>Họ tên:</strong> <?= $sv['HoTen'] ?>
        </div>
        <div class="detail-item">
            <strong>Giới tính:</strong> <?= $sv['GioiTinh'] ?>
        </div>
        <div class="detail-item">
            <strong>Ngày sinh:</strong> <?= $sv['NgaySinh'] ?>
        </div>
        <div class="detail-item">
            <strong>Hình:</strong> 
            <div class="image-container">
                <img src="images/<?= $sv['Hinh'] ?>" alt="Student Image" class="student-image">
            </div>
        </div>
        <div class="detail-item">
            <strong>Mã ngành:</strong> <?= $sv['MaNganh'] ?>
        </div>
    </div>

    <div class="back-button">
        <a href="index.php" class="back-btn">Quay lại</a>
    </div>
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
        color: #2C3E50;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .student-details {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .detail-item {
        font-size: 1.2rem;
        color: #34495E;
        margin-bottom: 10px;
    }

    .detail-item strong {
        color: #2C3E50;
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

    .back-button {
        text-align: center;
        margin-top: 30px;
    }

    .back-btn {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        font-size: 1rem;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #2980b9;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }

        h2 {
            font-size: 1.8rem;
        }

        .detail-item {
            font-size: 1rem;
        }

        .student-image {
            max-width: 80%;
        }
    }
</style>

</body>
</html>

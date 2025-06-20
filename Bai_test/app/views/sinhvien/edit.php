<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2>Sửa thông tin sinh viên</h2>

    <form method="POST" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
            <label for="HoTen">Họ tên:</label>
            <input type="text" name="HoTen" id="HoTen" value="<?= $sv['HoTen'] ?>" required>
        </div>

        <div class="form-group">
            <label for="GioiTinh">Giới tính:</label>
            <select name="GioiTinh" id="GioiTinh">
                <option value="Nam" <?= ($sv['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= ($sv['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                <option value="Khác" <?= ($sv['GioiTinh'] == 'Khác') ? 'selected' : '' ?>>Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày sinh:</label>
            <input type="date" name="NgaySinh" id="NgaySinh" value="<?= $sv['NgaySinh'] ?>" required>
        </div>

        <div class="form-group">
            <label>Hình hiện tại:</label>
            <img src="images/<?= $sv['Hinh'] ?>" alt="Current Image" width="80" class="current-image"><br>
        </div>

        <div class="form-group">
            <label for="Hinh">Đổi hình mới:</label>
            <input type="file" name="Hinh" id="Hinh">
        </div>

        <div class="form-group">
            <label for="MaNganh">Mã ngành:</label>
            <input type="text" name="MaNganh" id="MaNganh" value="<?= $sv['MaNganh'] ?>" required>
        </div>

        <div class="form-buttons">
            <button type="submit" class="submit-btn">Lưu</button>
            <a href="index.php" class="back-btn">Quay lại</a>
        </div>
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
        color: #2C3E50;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 500;
        color: #34495E;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="date"],
    select,
    input[type="file"] {
        padding: 10px;
        border: 1px solid #BDC3C7;
        border-radius: 4px;
        font-size: 1rem;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus {
        border-color: #3498db;
        outline: none;
    }

    .current-image {
        border-radius: 8px;
        margin-top: 10px;
    }

    .form-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .submit-btn,
    .back-btn {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        text-align: center;
    }

    .submit-btn {
        background-color: #2ecc71;
    }

    .submit-btn:hover {
        background-color: #27ae60;
    }

    .back-btn {
        background-color: #3498db;
    }

    .back-btn:hover {
        background-color: #2980b9;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }
    }
</style>

</body>
</html>

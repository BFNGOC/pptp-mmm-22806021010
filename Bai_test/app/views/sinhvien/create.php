<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2>Thêm sinh viên</h2>

    <form method="POST" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
            <label for="MaSV">Mã SV:</label>
            <input type="text" name="MaSV" id="MaSV" required>
        </div>

        <div class="form-group">
            <label for="HoTen">Họ tên:</label>
            <input type="text" name="HoTen" id="HoTen" required>
        </div>

        <div class="form-group">
            <label for="GioiTinh">Giới tính:</label>
            <select name="GioiTinh" id="GioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày sinh:</label>
            <input type="date" name="NgaySinh" id="NgaySinh" required>
        </div>

        <div class="form-group">
            <label for="Hinh">Hình ảnh:</label>
            <input type="file" name="Hinh" id="Hinh" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="MaNganh">Mã ngành:</label>
            <input type="text" name="MaNganh" id="MaNganh" required>
        </div>

        <div class="form-buttons">
            <button type="submit" class="submit-btn">Thêm</button>
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
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        font-size: 1rem;
        color: #34495E;
    }

    label {
        font-weight: 500;
        color: #2C3E50;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    select {
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

    .form-buttons {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .submit-btn,
    .back-btn {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        color: white;
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
        background-colo

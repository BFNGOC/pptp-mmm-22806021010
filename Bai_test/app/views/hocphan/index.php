<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2 class="page-title">DANH SÁCH HỌC PHẦN</h2>

    <table class="course-table">
        <thead>
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Số tín chỉ</th>
                <th>Số lượng dự kiến</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ds as $hp): ?>
                <tr>
                    <td><?= $hp['MaHP'] ?></td>
                    <td><?= $hp['TenHP'] ?></td>
                    <td><?= $hp['SoTinChi'] ?></td>
                    <td><?= $hp['SoLuong'] ?></td>
                    <td>
                        <a href="index.php?action=dangky&mahp=<?= $hp['MaHP'] ?>" class="btn-register">Đăng ký</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
        max-width: 1200px;
        margin: 20px auto;
        background-color: white;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .page-title {
        text-align: center;
        color: #2C3E50;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 1rem;
    }

    .course-table th, .course-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .course-table th {
        background-color: #34495E;
        color: white;
        font-weight: 600;
    }

    .course-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .course-table tr:hover {
        background-color: #f1f1f1;
    }

    .btn-register {
        display: inline-block;
        padding: 8px 15px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .btn-register:hover {
        background-color: #2980b9;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
            padding: 20px;
        }

        .course-table th, .course-table td {
            padding: 8px;
        }

        .course-table {
            font-size: 0.9rem;
        }
    }
</style>

</body>
</html>

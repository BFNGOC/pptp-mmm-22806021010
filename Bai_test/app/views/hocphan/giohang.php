<?php include "app/views/partials/header.php"; ?>

<div class="container">
    <h2 class="page-title">Đăng Kí Học Phần</h2>

    <table class="course-table">
        <thead>
            <tr>
                <th>Mã HP</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ds as $hp): ?>
                <tr>
                    <td><?= $hp['MaHP'] ?></td>
                    <td><?= $hp['TenHP'] ?></td>
                    <td><?= $hp['SoTinChi'] ?></td>
                    <td><a href="index.php?action=xoaHocPhan&mahp=<?= $hp['MaHP'] ?>" class="btn-delete">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Tổng số tín chỉ:</strong> <?= $tongTinChi ?? 0 ?></p>

    <a href="index.php?action=xoaTatCa" class="btn-clear">Xóa đăng ký</a>

    <h2 class="page-title">Thông Tin Sinh Viên</h2>
    <ul class="student-info">
        <li><strong>Mã sinh viên:</strong> <?= $sinhvien['MaSV'] ?></li>
        <li><strong>Họ tên:</strong> <?= $sinhvien['HoTen'] ?></li>
        <li><strong>Giới tính:</strong> <?= $sinhvien['GioiTinh'] ?></li>
        <li><strong>Ngày sinh:</strong> <?= $sinhvien['NgaySinh'] ?></li>
        <li><strong>Ngành học:</strong> <?= $sinhvien['MaNganh'] ?></li>
    </ul>

    <form action="index.php?action=luudangky" method="post" class="form-save">
        <button type="submit" class="btn-save">Lưu đăng ký</button>
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

    /* Table Styling */
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

    .btn-delete {
        padding: 8px 15px;
        background-color: #e74c3c;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    /* Clear Button */
    .btn-clear {
        display: inline-block;
        padding: 8px 15px;
        background-color: #f39c12;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 1rem;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    .btn-clear:hover {
        background-color: #e67e22;
    }

    /* Student Information */
    .student-info {
        list-style-type: none;
        padding: 0;
        font-size: 1rem;
        color: #34495E;
    }

    .student-info li {
        margin-bottom: 10px;
    }

    /* Save Button */
    .form-save {
        text-align: center;
        margin-top: 30px;
    }

    .btn-save {
        padding: 10px 20px;
        background-color: #2ecc71;
        color: white;
        border: none;
        font-size: 1.2rem;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .btn-save:hover {
        background-color: #27ae60;
    }

    /* Responsive Design */
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

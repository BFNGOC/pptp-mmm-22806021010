<?php include "app/views/partials/header.php"; ?><!DOCTYPE html><html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <style>
        * {
            box-sizing: border-box;
        }body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(to right, #f0f2f5, #dfe9f3);
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .search-bar,
    .add-button {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .search-bar input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .search-bar button,
    .add-button a {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .search-bar button:hover,
    .add-button a:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #3498db;
        color: #fff;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    img {
        max-width: 60px;
        border-radius: 6px;
    }

    .actions a {
        color: #e67e22;
        margin-right: 10px;
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 14px;
        margin: 0 4px;
        background-color: #3498db;
        color: white;
        border-radius: 4px;
        text-decoration: none;
    }

    .pagination a.active {
        font-weight: bold;
        background-color: #2980b9;
    }

    @media (max-width: 600px) {
        table th,
        table td {
            font-size: 14px;
        }

        .search-bar,
        .add-button {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

</head>
<body><div class="container">
    <h1>Danh sách sinh viên</h1><?php if (!empty($_SESSION['message'])): ?>
    <div style="padding: 10px; background: #2ecc71; color: white; margin-bottom: 10px; border-radius: 5px;">
        <?= $_SESSION['message']; unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<div class="search-bar">
    <div class="add-button">
        <a href="?action=create">+ Thêm sinh viên</a>
    </div>
</div>

<table>
    <thead>
    <tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Hình</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($sinhviens as $sv): ?>
        <tr>
            <td><?= $sv['MaSV'] ?></td>
            <td><?= $sv['HoTen'] ?></td>
            <td><?= $sv['GioiTinh'] ?></td>
            <td><?= $sv['NgaySinh'] ?></td>
            <td><img src="images/<?= $sv['Hinh'] ?>" alt="<?= $sv['HoTen'] ?>" onerror="this.src='images/default.png';"></td>
            <td class="actions">
                <a href="?action=detail&id=<?= $sv['MaSV'] ?>">Xem</a>
                <a href="?action=edit&id=<?= $sv['MaSV'] ?>">Sửa</a>
                <a href="?action=delete&id=<?= $sv['MaSV'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>

</div></body>
</html>
<?php include 'app/views/shares/header.php'; ?>

<h1>Thanh toán</h1>

<form method="POST" action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/processCheckout">
    <div class="form-group">
        <label for="name" class="text-light">Họ tên:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone" class="text-light">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address" class="text-light">Địa chỉ:</label>
        <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thanh toán</button>
</form>
<a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>

<?php include 'app/views/shares/footer.php'; ?>
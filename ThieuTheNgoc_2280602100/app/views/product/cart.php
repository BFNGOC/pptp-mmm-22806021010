<?php include 'app/views/shares/header.php'; ?>

<style>
    .cart-product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 0.5rem;
    }
    .cart-quantity-control a {
        min-width: 32px;
        text-align: center;
    }
</style>

<section class="py-5">
    <div class="container">
        <h1 class="mb-4 fw-bold">Giỏ Hàng Của Bạn</h1>

        <?php if (empty($cart)): ?>
            <div class="text-center p-5 bg-light rounded-3">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                <h3 class="text-muted">Giỏ hàng của bạn đang trống.</h3>
                <p>Hãy khám phá các sản phẩm tuyệt vời của chúng tôi!</p>
                <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product" class="btn btn-primary mt-3">
                    Bắt đầu mua sắm
                </a>
            </div>
        <?php else: ?>
            <?php $total = 0; ?>
            <div class="row">
                <!-- CỘT TRÁI: DANH SÁCH SẢN PHẨM -->
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-end">Giá</th>
                                    <th class="text-end">Tạm tính</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $id => $item): ?>
                                    <?php 
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $total += $subtotal;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-product-img me-3">
                                                <div>
                                                    <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($item['name']); ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center cart-quantity-control">
                                            <?php if ($item['quantity'] > 1): ?>
                                                <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/decreaseQuantity/<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">-</a>
                                            <?php else: ?>
                                                <button class="btn btn-outline-secondary btn-sm" disabled>-</button>
                                            <?php endif; ?>
                                            
                                            <span class="mx-2"><?php echo $item['quantity']; ?></span>

                                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/increaseQuantity/<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">+</a>
                                        </div>

                                        </td>
                                        <td class="text-end">
                                            <?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ
                                        </td>
                                        <td class="text-end fw-bold">
                                            <?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ
                                        </td>
                                        <td class="text-center">
                                            <form action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/removeFromCart" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- NÚT TIẾP TỤC MUA SẮM -->
                    <div class="mt-3">
                        <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product" class="btn btn-outline-secondary">
                            Tiếp tục mua sắm
                        </a>
                    </div>
                </div>

                <!-- CỘT PHẢI: TÓM TẮT ĐƠN -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold mb-4">Tóm Tắt Đơn Hàng</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tạm tính</span>
                                <span><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Phí vận chuyển</span>
                                <span class="text-success">Miễn phí</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Tổng cộng</span>
                                <span><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <div class="d-grid mt-4">
                                <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/checkout" class="btn btn-primary btn-lg">
                                    Tiến hành Thanh Toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>

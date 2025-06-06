<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center bg-info text-dark">
            <h2 class="mb-0 fw-bold">Chi tiết sản phẩm</h2>
        </div>
        <div class="card-body">
            <?php if ($product): ?>
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center">
                        <?php if ($product->image): ?>
                            <img src="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/<?php echo htmlspecialchars($product->image); ?>"
                                 class="img-fluid rounded border border-secondary"
                                 style="max-width: 300px;" 
                                 alt="<?php echo htmlspecialchars($product->name); ?>">
                        <?php else: ?>
                            <img src="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/images/no-image.png"
                                 class="img-fluid rounded border border-secondary"
                                 style="max-width: 300px;" 
                                 alt="Không có ảnh">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h3 class="fw-bold text-white"><?php echo htmlspecialchars($product->name); ?></h3>
                        <p class="text-light"><?php echo nl2br(htmlspecialchars($product->description)); ?></p>
                        <h4 class="text-danger fw-bold">
                            💰 <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </h4>
                        <p>
                            <strong class="text-white">Danh mục:</strong>
                            <span class="badge bg-info text-dark">
                                <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name) : 'Chưa có danh mục'; ?>
                            </span>
                        </p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/addToCart/<?php echo $product->id; ?>"
                               class="btn btn-success">➕ Thêm vào giỏ hàng</a>
                            <a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/Product/list"
                               class="btn btn-secondary">Quay lại danh sách</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center mt-4">
                    <h4>Không tìm thấy sản phẩm!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
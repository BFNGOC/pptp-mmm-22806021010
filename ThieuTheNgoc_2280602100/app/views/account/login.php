<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Đăng Nhập</h3>
                </div>
                <div class="card-body">

                    <?php
                        // Vẫn giữ lại khối hiển thị lỗi, rất hữu ích khi đăng nhập sai
                        if (isset($errors) && !empty($errors)) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<ul>';
                            foreach ($errors as $err) {
                                echo "<li class='mb-0'>$err</li>";
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                    ?>
                    
                    <!-- Sửa action trỏ đến controller xử lý login -->
                    <form action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/checklogin" method="post">
                        <!-- Gợi ý: Rút ngắn đường dẫn để dễ quản lý hơn -->
                        <!-- <form action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/checklogin" method="post"> -->

                        <!-- Tên tài khoản -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản của bạn" required>
                        </div>

                        <!-- Mật khẩu -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        
                        <!-- Quên mật khẩu & Ghi nhớ đăng nhập -->
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Ghi nhớ tôi
                                </label>
                            </div>
                            <a class="small" href="#">Quên mật khẩu?</a>
                        </div>


                        <!-- Nút Đăng Nhập -->
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Đăng Nhập</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <!-- Sửa lại link trỏ đến trang đăng ký -->
                    <div class="small"><a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/register">Bạn chưa có tài khoản? Đăng ký ngay</a></div>
                    <!-- <div class="small"><a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/register">Bạn chưa có tài khoản? Đăng ký ngay</a></div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
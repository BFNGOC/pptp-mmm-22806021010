<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Tạo Tài Khoản Mới</h3>
                </div>
                <div class="card-body">
                    
                    <?php
                        // Hiển thị lỗi một cách trực quan hơn với Alert của Bootstrap
                        if (isset($errors) && !empty($errors)) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<ul>';
                            foreach ($errors as $err) {
                                // Sử dụng mb-0 để loại bỏ margin mặc định của thẻ li
                                echo "<li class='mb-0'>$err</li>";
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                    ?>

                    <form action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/save" method="post">
                        
                        <!-- Tên tài khoản -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản của bạn" required>
                        </div>

                        <!-- Tên người dùng -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Tên đầy đủ</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
                        </div>
                        
                        <!-- Mật khẩu và Xác nhận Mật khẩu trên cùng một hàng (cho màn hình lớn) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Tạo mật khẩu" required>
                            </div>
                            <div class="col-md-6">
                                <label for="confirmpassword" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Nhập lại mật khẩu" required>
                            </div>
                        </div>

                        <!-- Nút Đăng Kí -->
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Đăng Kí</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/login">Bạn đã có tài khoản? Đăng nhập</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="/pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/checklogin" method="post">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>
                                <p class="text-white-50 mb-5">Vui lòng nhập tài khoản và mật khẩu!</p>
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label " for="typeEmailX">Tên tài khoản</label>
                                    <input type="text" name="username" class="form-control form-controllg" />
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Mật khẩU</label>
                                    <input type="password" name="password" class="form-control formcontrol-lg" />
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Quên mật khẩu</a></p>
                                <button class="btn btn-outline-light btn-lg px-5"
                                type="submit">Đăng nhập</button>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f falg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4
                                    px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google falg"></i></a>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">Bạn không có tài khoản? <a href="
                                /pptp-mmm-22806021010/ThieuTheNgoc_2280602100/account/register " class="text-white-50 fw-bold">Đăng kí</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'app/views/shares/footer.php'; ?>
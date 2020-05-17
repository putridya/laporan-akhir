<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="USERNAME" name="USERNAME" placeholder="Enter USERNAME" value="<?= set_value('USERNAME'); ?>">
                                <?= form_error('USERNAME', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="PASSWORD" name="PASSWORD" placeholder="PASSWORD" value="<?= set_value('PASSWORD'); ?>">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0">

                                </div> -->
                                <!-- <div class="col-sm-6"value="">
                                    <input type="PASSWORD" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div> -->
                            </div>
                            <div class="form-group">
                                <!-- //set_value supaya mempopulasi ulang, biar user tidak perlu ngisi lagi, cukup yg salah aja -->
                                <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Enter Name" value="<?= set_value('nama_admin'); ?>">
                                <?= form_error('nama_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_telp_admin" name="no_telp_admin" placeholder="Enter Number Telephone">
                                <?= form_error('no_telp_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>

                        </form>
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                        <div class="text-center">
                            <!-- auth>>memanggil method index manggil halaman login echo -->
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
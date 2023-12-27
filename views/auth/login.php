<main class="main-content mt-6">
    <style>
        .form-container {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 525px;
            color: white;
        }

        .btn-primary {
            background-color: royalblue;
            color: white;
            border-color: royalblue;
        }

        .btn-primary:hover {
            background-color: gold;
            color: black;
            border-color: gold;
        }
    </style>
    <?= $this->session->flashdata('message'); ?>
    <section>
        <div class="col-lg-14">
            <div class="d-flex justify-content-center align-items-center mt-6">
                <div class="form-container">
                    <div class="text-center">
                        <h4 class="font-weight-bolder">Log In</h4>
                    </div>
                    <p class="mb-0">Enter your email and password to sign in</p>
                    <form class="user" method="post" action="<?= base_url('Auth'); ?>">
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                aria-label="Email" name="email" id="email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-user" placeholder="Password"
                                aria-label="Password" id="password" name="password" value="<?= set_value('nama'); ?>">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" a
                                href="<?= base_url(); ?>Admin/">Login</button>
                        </div>
                    </form>
                    <br>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto" style="color: black;">
                            Don't have an account?
                            <a href="<?= base_url(); ?>Auth/registrasi"
                                class="text-primary text-gradient font-weight-bold">Create Here!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
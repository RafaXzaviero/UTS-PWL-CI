<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>

<?php
$username = ['name' => 'username', 'id' => 'username', 'class' => 'form-control border-0 border-bottom rounded-0 bg-transparent text-dark'];
$password = ['name' => 'password', 'id' => 'password', 'class' => 'form-control border-0 border-bottom rounded-0 bg-transparent text-dark'];
?>

<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background-color:rgb(209, 25, 25);
    }

    .login-wrapper {
        max-width: 900px;
        margin: auto;
        padding: 4rem 2rem;
        background-color: #fff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-radius: 20px;
    }

    .login-wrapper .logo img {
        width: 150px;
        margin-bottom: 1rem;
    }

    .login-wrapper h5 {
        font-weight: bold;
        margin-bottom: 1rem;
        text-align: center;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #000;
    }

    .btn-login {
        background-color: #000;
        color: #fff;
        border-radius: 30px;
        padding: 0.6rem;
        font-weight: 600;
        letter-spacing: 1px;
        transition: 0.3s ease-in-out;
    }

    .btn-login:hover {
        background-color: #333;
    }

    .error-box {
        background-color: #f8d7da;
        color: #842029;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        font-size: 0.875rem;
    }
</style>

<section class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="login-wrapper">
        <div class="text-center logo">
            <img src="<?= base_url('NiceAdmin/assets/img/Newbalance-logo.webp') ?>" alt="logo">
        </div>

        <h5>Sign in to your account</h5>

        <?php if (session()->getFlashData('failed')): ?>
            <div class="error-box"><?= session()->getFlashData('failed') ?></div>
        <?php endif; ?>

        <?= form_open('login') ?>
            <div class="mb-4">
                <label for="username" class="form-label fw-semibold">Username</label>
                <?= form_input($username) ?>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <?= form_password($password) ?>
            </div>

            <div class="d-grid">
                <?= form_submit('submit', 'Login', ['class' => 'btn btn-login']) ?>
            </div>
        <?= form_close() ?>
    </div>
</section>

<?= $this->endSection() ?>

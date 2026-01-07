<?php
require __DIR__ . '/partials/header.php';
?>
<div class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0 shadow-sm rounded-0">

                    <div class="card-header bg-white p-0 border-bottom-0">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link py-3 text-secondary border-0" href="/login"
                                    style="border-bottom: 3px solid #0d6efd;">
                                    Inloggen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold py-3 text-primary border-top-0 border-start-0 border-end-0" aria-current="page"
                                    href="/register">
                                    Account aanmaken
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="mb-3 text-center">Register</h1>
                    <div class="card-body p-4 p-md-5">
                        <?php if (!empty($errors) && is_array($errors)) { ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $err) { ?>
                                        <li><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <?php if (!empty($success)) { ?>
                            <div class="alert alert-success"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        <?php } ?>

                        <form action="/register" method="post" novalidate>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required
                                    value="<?php echo htmlspecialchars($old['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="<?php echo htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirm" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirm"
                                    name="password_confirm" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>

                        <p class="mt-3 mb-0"><a href="/login">Already have an account? Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
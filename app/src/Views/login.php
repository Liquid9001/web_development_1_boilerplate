<?php
// We laden jouw bestaande header (zorg dat het pad klopt met jouw mappenstructuur)
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
                                <a class="nav-link active fw-bold py-3 text-primary border-top-0 border-start-0 border-end-0"
                                    aria-current="page" href="/login" style="border-bottom: 3px solid #0d6efd;">
                                    Inloggen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3 text-secondary border-0" href="/register">
                                    Account aanmaken
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body p-4 p-md-5">

                        <h3 class="text-center fw-bold mb-2 text-dark">Inloggen</h3>
                        <p class="text-center text-muted mb-4">
                            Nog geen account? <a href="/register" class="text-decoration-none">Registreer hier</a>
                        </p>

                        <form action="/login" method="post">
                            <div class="mb-4">
                                <label for="loginEmail" class="form-label fw-bold">E-mailadres</label>
                                <input type="email" class="form-control form-control-lg bg-light" id="loginEmail"
                                    name="email" required>
                            </div>

                            <div class="mb-2">
                                <label for="loginPassword" class="form-label fw-bold">Wachtwoord</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg bg-light border-end-0"
                                        id="loginPassword" name="password" required>
                                    <button class="btn btn-light border border-start-0 text-primary fw-bold"
                                        type="button" id="togglePasswordBtn" style="background-color: #f8f9fa;">
                                        Toon
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3 fs-5 fw-bold">Inloggen met je
                                e-mailadres</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('togglePasswordBtn').addEventListener('click', function () {
        const passwordInput = document.getElementById('loginPassword');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Toon' : 'Verberg';
    });
</script>

<?php
require __DIR__ . '/partials/footer.php';
?>
<?php
require __DIR__ . '/partials/header.php';
?>
    <div class="container">
        <h1>Login</h1>
        <?php if (!empty($error)) { ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p><a href="/guestbook">Back to guestbook</a></p>
    </div>
</body>
</html>

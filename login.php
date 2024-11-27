<?php include '../includes/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <p>Please enter your credentials to access your account.</p>
    <form action="../login.php" method="POST">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <p style="margin-top: 20px;">Don't have an account? <a href="register.php" style="color: #5a67d8; font-weight: bold;">Register here</a>.</p>
</div>

<?php include '../includes/footer.php'; ?>

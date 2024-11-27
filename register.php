<?php include '../includes/header.php'; ?>
<div class="container">
    <h2>Register</h2>
    <form action="../views/register.php" method="POST">
        <div class="form-control">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-control">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-control">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-control">
            <label>Role</label>
            <select name="role_id">
                <option value="1">Admin</option>
                <option value="2">User</option>
                <option value="3">Moderator</option>
            </select>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>

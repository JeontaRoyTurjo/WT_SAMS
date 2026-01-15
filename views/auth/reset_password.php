<?php include 'views/layouts/header.php'; ?>

<h2>Reset Password</h2>
<?php if (isset($success)): ?>
    <p style="color: green;"><?php echo $success; ?></p>
<?php endif; ?>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="index.php?url=reset_password_submit" method="POST">
    <label>Email:</label> <input type="email" name="email" required><br>
    <label>New Password:</label> <input type="password" name="new_password" required><br>
    <button type="submit">Reset Password</button>
</form>
<a href="index.php?url=login">Back to Login</a>

<?php include 'views/layouts/footer.php'; ?>

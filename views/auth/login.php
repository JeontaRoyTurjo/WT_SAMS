<?php include 'views/layouts/header.php'; ?>

<h2>Login</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form action="index.php?url=login_submit" method="POST">
    <label>Email:</label> <input type="email" name="email"><br>
    <label>Password:</label> <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
<a href="index.php?url=reset_password">Forgot Password?</a><br>
<a href="index.php?url=register">Register</a>

<?php include 'views/layouts/footer.php'; ?>

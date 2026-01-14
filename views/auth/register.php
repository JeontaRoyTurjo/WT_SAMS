<?php include 'views/layouts/header.php'; ?>

<h2>Register</h2>
<form action="index.php?url=register_submit" method="POST">
    <label>Username:</label> <input type="text" name="username"><br>
    <label>Email:</label> <input type="email" name="email"><br>
    <label>Password:</label> <input type="password" name="password"><br>
    <label>Role:</label>
    <select name="role">
        <option value="student">Student</option>
        <option value="university">University</option>
    </select><br>
    <button type="submit">Register</button>
</form>
<a href="index.php?url=login">Login</a>

<?php include 'views/layouts/footer.php'; ?>

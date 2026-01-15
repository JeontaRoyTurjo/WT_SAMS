<?php include 'views/layouts/header.php'; ?>

<center>
    <h2>My Profile</h2>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="index.php?url=update_profile" method="POST">
        <label>Username (Read Only):</label> <br>
        <input type="text" value="<?php echo $data['username']; ?>" readonly><br>

        <label>Email (Read Only):</label> <br>
        <input type="text" value="<?php echo $data['email']; ?>" readonly><br>

        <label>Full Name:</label> <br>
        <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>

        <label>Phone:</label> <br>
        <input type="text" name="phone" value="<?php echo $data['phone']; ?>"><br>

        <label>Address:</label> <br>
        <input type="text" name="address" value="<?php echo $data['address']; ?>"><br>

        <br>
        <button type="submit">Update Profile</button>
    </form>
    
    <br>
    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>



<?php include 'views/layouts/footer.php'; ?>

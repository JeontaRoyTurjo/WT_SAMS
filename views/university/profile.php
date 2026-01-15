<?php include 'views/layouts/header.php'; ?>

<center>
    <h2>University Profile</h2>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="index.php?url=update_university_profile" method="POST">
        <label>Username (Read Only):</label> <br>
        <input type="text" value="<?php echo $data['username']; ?>" readonly><br>

        <label>Email (Read Only):</label> <br>
        <input type="text" value="<?php echo $data['email']; ?>" readonly><br>

        <label>University Name:</label> <br>
        <input type="text" name="university_name" value="<?php echo $data['university_name']; ?>"><br>

        <label>Location:</label> <br>
        <input type="text" name="location" value="<?php echo $data['location']; ?>"><br>

        <label>Description:</label> <br>
        <textarea name="description" rows="4" cols="50"><?php echo $data['description']; ?></textarea><br>

        <br>
        <button type="submit">Update Profile</button>
    </form>
    
    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>

<?php include 'views/layouts/footer.php'; ?>

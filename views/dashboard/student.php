<?php include 'views/layouts/header.php'; ?>

<center>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    
    <h3>Student Dashboard</h3>
    
    <a href="index.php?url=profile">My Profile</a> <br><br>
    <a href="index.php?url=universities">Search Universities</a> <br><br>
    <a href="index.php?url=history">My Applications</a> <br><br>
    
    <hr>
    
    <a href="index.php?url=logout">Logout</a>
</center>

<?php include 'views/layouts/footer.php'; ?>

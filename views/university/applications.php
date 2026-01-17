<?php include 'views/layouts/header.php'; ?>

<center>
    <h2>Received Applications</h2>
    
    <?php if (empty($applications)): ?>
        <p>No applications found.</p>
    <?php else: ?>
        <table border="1" style="border-collapse: collapse; width: 80%; margin-top: 20px;">
            <tr style="background-color: White;">
                <th style="padding: 10px;">Student Name</th>
                <th style="padding: 10px;">Course Applied</th>
                <th style="padding: 10px;">Status</th>
            </tr>
            <?php foreach ($applications as $app): ?>
            <tr>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['student_name']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['course_name']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>

<?php include 'views/layouts/footer.php'; ?>

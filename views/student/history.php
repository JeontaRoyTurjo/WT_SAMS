<?php include 'views/layouts/header.php'; ?>

<center>
    <h2>Application History</h2>
    
    <?php if (empty($applications)): ?>
        <p>No applications found.</p>
    <?php else: ?>
        <table border="1" style="border-collapse: collapse; width: 80%; margin-top: 20px;">
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">University</th>
                <th style="padding: 10px;">Course</th>
                <th style="padding: 10px;">Status</th>
                <th style="padding: 10px;">Feedback</th>
            </tr>
            <?php foreach ($applications as $app): ?>
            <tr>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['university_name']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['course_name']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['status']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['feedback'] ?? ''); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>

<?php include 'views/layouts/footer.php'; ?>

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
                <th style="padding: 10px;">Action</th>
            </tr>
            <?php foreach ($applications as $app): ?>
            <tr id="row-<?php echo $app['id']; ?>">
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['student_name']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($app['course_name']); ?></td>
                <td style="padding: 10px;" id="status-<?php echo $app['id']; ?>"><?php echo htmlspecialchars($app['status']); ?></td>
                <td style="padding: 10px;">
                    <?php if ($app['status'] == 'pending'): ?>
                        <button onclick="updateStatus(<?php echo $app['id']; ?>, 'accepted')">Accept</button>
                        <button onclick="updateStatus(<?php echo $app['id']; ?>, 'rejected')">Reject</button>
                    <?php else: ?>
                        <span><?php echo ucfirst($app['status']); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>

<script>
function updateStatus(id, status) {
    if (!confirm('Are you sure you want to ' + status + ' this application?')) return;

    var formData = new FormData();
    formData.append('id', id);
    formData.append('status', status);

    fetch('index.php?url=update_application_status', {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        if (data.success) {
            document.getElementById('status-' + id).innerText = status;
            // Optionally reload to update buttons or hide them
            location.reload(); 
        } else {
            alert('Error: ' + data.message);
        }
    });
}
</script>

<?php include 'views/layouts/footer.php'; ?>

<center>
    <h2>Manage Courses</h2>
    
    <form action="index.php?url=add_course" method="POST">
        Department:
        <select name="department">
            <option value="FST">FST</option>
            <option value="FBSS">FBSS</option>
            <option value="FE">FE</option>
            <option value="FLS">FLS</option>
        </select>
        <br><br>
        
        Course Name:
        <input type="text" name="course_name">
        <br><br>
        
        <button type="submit">Add</button>
    </form>
    
    <hr>
    
    <h3>Course List</h3>
    <table border="1" style="border-collapse: collapse; width: 50%;">
        <tr>
            <th>Dept</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo $course['department']; ?></td>
            <td><?php echo $course['course_name']; ?></td>
            <td><a href="index.php?url=remove_course&id=<?php echo $course['id']; ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <a href="index.php?url=dashboard">Dashboard</a>
</center>

<?php include 'views/layouts/footer.php'; ?>

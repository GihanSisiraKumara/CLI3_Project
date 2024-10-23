<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance</title>
</head>
<body>
    <h2>Employee Attendance</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Employee Number</th>
                <th>Name</th>
                <th>Attendance</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($attendance)) : ?>
                <?php foreach ($attendance as $att) : ?>
                    <tr>
                        <td><?php echo $att['employee_number']; ?></td>
                        <td><?php echo $att['name']; ?></td>
                        <td><?php echo $att['exists_in_csv']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php require_once 'dbConfig.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Records</title>
    <style>
        table,th,td {
            border: 1px solid;
        }
    </style>

</head>
<body>
    <?php 
    $stmt = $pdo ->prepare("SELECT * FROM patients");

    if($stmt -> execute()){
        $staffs = $stmt->fetchAll();
    } else {
        echo "Query Failed";
        exit;
    }
    ?>

    <table> 
        <tr>
            <th>Patient ID</th>
            <th>First_name</th>
            <th>Last Name</th>
            <th>Patient Injury</th>
            <th>Phone Number</th>
        </tr>
        
    <?php if (!empty($staffs)): ?>
        <?php foreach ($staffs as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
            <td><?php echo htmlspecialchars($row['patient_injury']); ?></td>
            <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No data found</td>
        </tr>
    <?php endif; ?>
    </table>
    
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './dbconnect.php';
        include './functions.php';
        
        $db = getDatabase();

        $stmt = $db->prepare("SELECT * FROM actors");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Height</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['dob']; ?></td>  
                    <td><?php echo $row['height']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>

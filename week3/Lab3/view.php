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

        $stmt = $db->prepare("SELECT * FROM corps");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['corpdt']; ?></td>  
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zip']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="Read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>

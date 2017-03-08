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
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $corpdt = filter_input(INPUT_POST, 'corpdt');
                $email = filter_input(INPUT_POST, 'email');
                $zip = filter_input(INPUT_POST, 'zip');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                $stmt = $db->prepare("UPDATE corps set corp = :corp, corpdt = :corpdt, :email = :email, zip = :zip, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":corpdt" => $corpdt,
                    ":email" => $email,
                    ":zip" => $zip,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $corp = $results['corp'];
                $corpdt = $results['corpdt'];
                $email = $results['email'];
                $zip = $results['zip'];
                $owner = $results['owner'];
                $phone = $results['phone'];
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Corporation <input type="text" value="<?php echo $dataone; ?>" name="corp" />
            <br />
            Date <input type="text" value="<?php echo $datatwo; ?>" name="corpdt" />
            <br />  
            Email <input type ="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code <input type="text" value="<?php echo $zip; ?>" name="zip" />
            <br />
            Owner <input type="text" value="<?php echo $owner; ?> "name="owner" />
            <br />
            Phone Number <input type="text" value ="<?php echo $phone; ?>" name="phone" />
            <br />
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>

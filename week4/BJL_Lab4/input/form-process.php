<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>My Forms</h1>
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'Submit1' ) {
            echo 'You Have Re-Ordered The List';
        }
        if ( $action === 'Submit2' ) {
            echo 'You Are A(n) ' + datatwo;
        }
        
        include './includes/form1.php';
        include './includes/form2.php';
        
        ?>
    </body>
</html>

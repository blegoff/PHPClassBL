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

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET firstName = :FName, lastName = :LName, dob = :dob, height = :height");

            $firstName = filter_input(INPUT_POST, 'firstName');
            $lastName = filter_input(INPUT_POST, 'lastName');
            $dob = filter_input_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":FName" => $firstName,
                ":LName" => $lastName,
                ":dob" => $dob,
                ":height" => $height
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name <input type="text" value="" name="firstName" />
            <br />
            Last Name <input type="text" value="" name="lastName" />
            <br />
            DOB <input type="text" value="" name="dob" />
            <br />
            Height <input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>

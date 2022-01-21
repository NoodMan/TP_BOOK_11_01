<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page ajout d'un User</title>
</head>

<body>
    <div>
        <?php
        if (array_key_exists("error", $_SESSION)) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        } ?>
    </div>



    <form action="/User" method="POST">
        <label for="serviceID">Service ID: </label>
        <input type="text" name="serviceID" id="serviceID">

        <label for="firstname">Firstname: </label>
        <input type="text" name="firstname" id="firstname">

        <label for="lastname">Lastname: </label>
        <input type="text" name="lastname" id="lastname">

        <label for="age">Age: </label>
        <input type="" name="age" id="age">

        <label for="mail">Mail: </label>
        <input type="text" name="mail" id="mail">

        <label for="personal_data">Personal data </label>
        <input type="text" name="personal_data" id="personal_data">

        <input type="submit" value="ENREGISTRER LES INFORMATIONS">
    </form>
</body>

</html>
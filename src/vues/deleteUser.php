<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page suppression d'un User</title>
</head>

<body>
    <div>
        <?php
        if (array_key_exists("error", $_SESSION)) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        } ?>
    </div>

<?php
    $id = isset($_SESSION["userData"]["id"]) ? $_SESSION["userData"]["id"] : "";
    ?>

    <form action=<?="/User/$id"?> method="DELETE" id="form_controller">


        <label for="serviceID">Service ID: </label>
        <input 
            type="text" 
            name="serviceID" 
            id="serviceID" 
            value="<?php 
                echo isset($_SESSION['userData']['serviceID']) 
                ? $_SESSION['userData']['serviceID']
                : "";
                ?>" 
                />
                
    
        <label for="firstname">Firstname: </label>
        <input 
            type="text" 
            name="firstname" 
            id="firstname"
            value="<?php 
                echo isset($_SESSION['userData']['firstname']) 
                ? $_SESSION['userData']['firstname']
                : "";
                ?>" 
                />

        <label for="lastname">Lastname: </label>
        <input 
            type="text" 
            name="lastname" 
            id="lastname"
            value="<?php 
                echo isset($_SESSION['userData']['lastname']) 
                ? $_SESSION['userData']['lastname']
                : "";
                ?>" 
                />

        <label for="age">Age: </label>
        <input 
            type="text" 
            name="age" 
            id="age"
            value="<?php 
                echo isset($_SESSION['userData']['age']) 
                ? $_SESSION['userData']['age']
                : "";
                ?>" 
                />

        <label for="mail">Mail: </label>
        <input 
            type="text" 
            name="mail" 
            id="mail"
            value="<?php 
                echo isset($_SESSION['userData']['mail']) 
                ? $_SESSION['userData']['mail']
                : "";
                ?>" 
                />

        <label for="personal_data">Personal data </label>
        <input 
            type="text" 
            name="personal_data" 
            id="personal_data"
            value="<?php            
                echo isset($_SESSION['userData']['personal_data']) 
                ? $_SESSION['userData']['personal_data']
                : "";
                ?>" 
                />

        <input type="submit" value="SUPPRIMER LES DONNEES">
    </form>
</body>

</html>
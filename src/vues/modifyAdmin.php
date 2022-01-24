<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page modify d'un Admin</title>
        <style> 
            #form_controller{ /* mise en forme formulaire*/
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
                align-items: center;
                line-height: 3em;
            }
            .radius {
                border-radius: 20px;
                
            }
        </style>

        
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
 
 $id = isset($_SESSION["adminData"]["id"]) ? $_SESSION["adminData"]["id"] : "";
 
 ?>
    <form action=<?="/Admin/$id"?> method="POST" id="form_controller">
        
        
        <label for="serviceID">Service ID: </label>
        <input 
        type="text" 
        name="serviceID" 
        id="serviceID" 
        class="radius"
        value="<?php 
                echo isset($_SESSION['adminData']['serviceID']) 
                ? $_SESSION['adminData']['serviceID']
                : "";
                ?>" 
                />
                
                
        <label for="firstname">Firstname: </label>
        <input 
        type="text" 
        name="firstname" 
                id="firstname"
                class="radius"
                value="<?php 
                echo isset($_SESSION['adminData']['firstname']) 
                ? $_SESSION['adminData']['firstname']
                : "";
                ?>" 
                />

        <label for="lastname">Lastname: </label>
        <input 
            type="text" 
            name="lastname" 
            id="lastname"
            class="radius"
            value="<?php 
                echo isset($_SESSION['adminData']['lastname']) 
                ? $_SESSION['adminData']['lastname']
                : "";
                ?>" 
                />

        <label for="age">Age: </label>
        <input 
            type="text" 
            name="age" 
            id="age"
            class="radius"
            value="<?php 
                echo isset($_SESSION['adminData']['age']) 
                ? $_SESSION['adminData']['age']
                : "";
                ?>" 
                />

        <label for="mail">Mail: </label>
        <input 
            type="text" 
            name="mail" 
            id="mail"
            class="radius"
            value="<?php 
                echo isset($_SESSION['adminData']['mail']) 
                ? $_SESSION['adminData']['mail']
                : "";
                ?>" 
                />
                
        <label for="level">Level </label>
        <input 
            type="text" 
            name="level" 
            id="level"
            class="radius"
            value="<?php 
           
                echo isset($_SESSION['adminData']['level']) 
                ? $_SESSION['adminData']['level']
                : "";
                ?>" />
                ====>    

        <input type="submit"  class= "radius" value="ENREGISTRER LES MODIFICATIONS">
    </form>
</body>

</html>
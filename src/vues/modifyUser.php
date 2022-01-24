<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page modify d'un User</title>
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
 
 $id = isset($_SESSION["userData"]["id"]) ? $_SESSION["userData"]["id"] : "";
 
 ?>
    <form action=<?="/User/$id"?> method="POST" id="form_controller">
        
        
        <label for="serviceID">Service ID: </label>
        <input 
        type="text" 
        name="serviceID" 
        id="serviceID" 
        class="radius"
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
                class="radius"
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
            class="radius"
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
            class="radius"
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
            class="radius"
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
            class="radius"
            value="<?php 
           
                echo isset($_SESSION['userData']['personal_data']) 
                ? $_SESSION['userData']['personal_data']
                : "";
                ?>" />
                ====>    

        <input type="submit"  class= "radius" value="ENREGISTRER LES MODIFICATIONS">
    </form>
</body>

</html>
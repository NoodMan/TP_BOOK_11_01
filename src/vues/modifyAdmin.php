<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page modify d'un Admin</title>
    <style>
        #form_controller {
            /* mise en forme formulaire*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            line-height: 3em;
        }

        .radius {
            border-radius: 10px;

        }
    </style>


</head>

<body>

    <form method="POST" action=<?= "/Admin/$id" ?> id="form_controller">

        <label for="serviceId">Service Id: </label>
        <input name="serviceId" type="int" class="radius" value="<?= $admin->getServiceID() ?>" required />


        <label for="firstname">Firstname: </label>
        <input type="text" name="firstname" id="firstname" class="radius" value="<?= $admin->getFirstname() ?>" required />


        <label for="lastname">Lastname: </label>
        <input type="text" name="lastname" id="lastname" class="radius" value="<?= $admin->getLastname() ?>" required />


        <label for="age">Age: </label>
        <input type="text" name="age" id="age" class="radius" value="<?= $admin->getAge() ?>" required />


        <label for="mail">Mail: </label>
        <input type="text" name="mail" id="mail" class="radius" value="<?= $admin->getEmail() ?>" required />

        <br>
        ====>

        <input type="submit" class="radius" value="ENREGISTRER LES MODIFICATIONS">

        <!-- <label for="level">Level: </label>  NE FONCTIONNE PAS NIKE --> 
         <!-- <input type="int" name="level" id="level" class="radius" value="<?= $admin->getLevel() ?>" required /> -->    
         <!-- raccourcis command + shift + : = commentaire  -->

    </form>
</body>

</html>
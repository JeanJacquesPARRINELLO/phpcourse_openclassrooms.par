<?php
    $_POST['password'] = htmlspecialchars($_POST['password']);
    if(is_string($_POST['password']) && $_POST['password'] == 'kangourou'){
    }else{
        header('Location: http://phpcourse_openclassrooms.par/tp1/formulaire_tp1.php');
        exit();
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page code NASA</title>
    </head>
    <body>
        <?php
            echo ('voici les mots de sécurités de la NASA : NA & ZA');
        ?>
    </body>
</html>

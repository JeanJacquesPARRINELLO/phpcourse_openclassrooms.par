<?php
    //  INITIALISATION DE LA SESSION
    session_start();
    
    //  fonctions pratiques
    include("../globals_functions.php");
    
    printr($_POST);

    //  INITIALISATION D'UNE VARIABLE STRING CONTENANT UN MESSAGE D'ERREUR
    $errorMessage = '';
    foreach ($_POST as $key => $value) {
        if(isset($_POST[$key]) && is_string($_POST[$key]) && strlen($_POST['message']) > 0 && strlen($_POST['pseudo']) > 0){
            $_POST[$key] = secureInput($value);
        }
        else{
            $errorMessage .= 'Votre ' . $key . ' n\'est pas valide.<br>';
            echo($errorMessage . '<br>');
        }
    }
    
//    echo('strlen(' . $_POST['pseudo'] . ') ' . strlen($_POST['pseudo']) . '<br>');
//    echo('strlen(' . $_POST['message'] . ') ' . strlen($_POST['message']) . '<br>');
    if($errorMessage === ''){
        //  CONNEXION À LA BASE DE DONNÉES
        $bdd = connectDB();
        //  PRÉPARATION DE LA REQUÊTE D'INSERTION
        $requete = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');

        $requete->execute(array(
            'pseudo' => $_POST['pseudo'],
            'message' => $_POST['message']
            ));

        $requete->closeCursor();
    }
    //  MISE EN SESSION DU MESSAGE D'ERREUR ÉVENTUEL
    $_SESSION['error_message'] = $errorMessage;
    header('location: http://phpcourse_openclassrooms.par/tp2_chat/minichat.php');
    
?>
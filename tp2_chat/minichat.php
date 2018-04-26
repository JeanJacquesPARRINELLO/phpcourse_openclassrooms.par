<?php
    //  INITIALISATION DE LA SESSION
    session_start();
    
    //  fonctions pratiques
    include("../globals_functions.php");
    
    //  CONNECTION À LA BDD
    $bdd = connectDB();
//    $requete = ('SELECT * FROM minichat WHERE id > (SELECT max(id) FROM table - 10) ORDER BY id DESC');
    $requete = ('SELECT * FROM minichat WHERE id > 0 ORDER BY id DESC LIMIT 0,10');
    $reponse = $bdd->query($requete);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="./minichat_post.php">
            <fielsdet>
                <p class="errorMessage">
                    <?php
                        if(isset($_SESSION['error_message'])){
                            echo($_SESSION['error_message']);
                        }
                    ?>
                </p>
                <p><label for="pseudo">Votre pseudo</label></p>
                <p><input type="text" id="pseudo" name="pseudo" /></p>
                <p><label for="message">Votre message</label></p>
                <p> <textarea id="message" name="message" rows="4" cols="50"></textarea> </p>
                <div id="messages">
                    <?php
                        while ($donnees = $reponse->fetch()){
                            echo('<p>');
                                echo('<span class="pseudo">' . $donnees['pseudo'] . '</span>&nbsp;');
                                echo('<span class="message">' . $donnees['message'] . '</span>');
                            echo('</p>');
                        }
    $reponse->closeCursor();
                    ?>
                </div>
            </fielsdet>
        </form>
    </body>
</html>

<?php
    
    function printr($pData){
        echo '<pre>';
            print_r($pData);
        echo '</pre>';
    }
    
    function secureInput($string){
        return(htmlspecialchars($string));
    }
    
    function connectDB(){
        try{
            return (new PDO('mysql:host=localhost;dbname=beweb_db;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)));
        }
        catch (Exception $e){
                die('Erreur : ' . $e->getMessage());
        }
    }
?>
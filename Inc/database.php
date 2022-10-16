<?php

    session_start();
    
    $host_name  = "sql150130.byetcluster.com";
    $database   = "epiz_32796807_zombies";
    $user_name  = "epiz_32796807";
    $password   = "Haan7Malti35zaki";

    try {
        $bdd = new PDO('mysql:host='.$host_name.';dbname='.$database, $user_name, $password);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>"; die();
    }
    
    catch(Exception $e)
    {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }
?>
<?php
   if(isset($_POST['delete'])){
        try{
            include __DIR__.'/../includes/db.conection.php';
            include __DIR__.'/../class/DatabaseTable.php';

            $jokeTable = new DatabaseTable($pdo,'ijbd','id');

            $jokeTable->delete($_POST['id']);

            header('location: joke.php');
       
        }catch(PDOException $e){
            $err = "enable to connect to the database server ".$e->getMessage().'in'
            .$e->getFile() . '' .$e->getLine();
            exit();
        }
   }
?>
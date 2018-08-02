<?php

    if(!isset($_POST['joketext'])){
        $title = 'add a new joke';
        $output = ' ';
        ob_start();
         include 'addjoke.html.php';
        $output = ob_get_clean();
    }else{
        try{
            include  __DIR__.'/include/db.conection.php';
            include __DIR__.'/class/DatabaseTable.php';

            $jokeTable = new DatabaseTable($pdo,'ijdb','id');
            $authorTable = new DatabaseTable($pdo,'author','id');

    
            //$sql = 'UPDATE diallo SET jokeDate ="'.date('Y-m-d').'"  WHERE id = "%chicken%" ';
            $fields = ['jokeText'=>$_POST['joketext'],
            'authorID'=>2,'jokeDate'=>new DateTime()];
            $jokeTable->insertItems($fields);

        }catch(PDOException $e){
            $err = "enable to connect to the database server ".$e->getMessage().'in'
            .$e->getFile() . '' .$e->getLine();
            exit();
        }
       header('location:joke.php');
    }
    include 'layout.html.php';
?>
<?php
    if(!isset($_POST['joketext'])){
        $title = 'add a new joke';
        $output = ' ';
        ob_start();
         include 'addjoke.html.php';
        $output = ob_get_clean();
    }else{
        try{
            include 'database.inc.con.php';
            include 'func.inc.php';
            
            $db = new Databasetable();

            $db->pdo = $pdo;
            $db->table = 'ijbd';

    
            //$sql = 'UPDATE diallo SET jokeDate ="'.date('Y-m-d').'"  WHERE id = "%chicken%" ';
            $fields = ['jokeText'=>$_POST['joketext'],
            'authorID'=>2,'jokeDate'=>new DateTime()];
           insertItems($fields);

        }catch(PDOException $e){
            $err = "enable to connect to the database server ".$e->getMessage().'in'
            .$e->getFile() . '' .$e->getLine();
            exit();
        }
       header('location:joke.php');
    }
    include 'layout.html.php';
?>
<?php
   if(isset($_POST['delete'])){
        try{
           
        include 'database.inc.con.php';
        include 'func.inc.php';
            //$sql = 'UPDATE diallo SET jokeDate ="'.date('Y-m-d').'"  WHERE id = "%chicken%" ';
            delete($pdo,'ijbd','id',$_POST['id']);
        }catch(PDOException $e){
            $err = "enable to connect to the database server ".$e->getMessage().'in'
            .$e->getFile() . '' .$e->getLine();
            exit();
        }
        header('location:joke.php');
   }
?>
<?php
    include 'database.inc.con.php';
    include_once 'func.inc.php';
    try{
        if(isset($_POST['edits'])){
            $joke = findByid($pdo,'ijbd','id',$_POST['edit']);
            $output = '';
            ob_start();
                include 'editjoke.html.php';
            $output = ob_get_clean();
        }else{
            $record = ['id'=>$_POST['id'],
            'jokeText'=>$_POST['content']];
            update($pdo,'ijbd','id',$record);
            header('location: joke.php');
        }
       

        //$sql = 'UPDATE diallo SET jokeDate ="'.date('Y-m-d').'"  
        //WHERE id = "%chicken%" ';

    }catch(PDOException $e){
        $err = "enable to connect to the database server ".$e->getMessage().'in'
        .$e->getFile() . '' .$e->getLine();
    }
    include 'layout.html.php';
   
?>
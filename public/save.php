<?
  try{
        include __DIR__.'/../includes/db.conection.php';
        include_once __DIR__.'/../class/DatabaseTable.php';

        $jokeTable = new DatabaseTable($pdo,'ijbd','id');

        if(isset($_POST['update']) ){
            $record = $_POST['joke'];

            $record['jokeDate'] = new DateTime();

            $record['authorID'] = 1;

            $jokeTable->save($record);

            header('location: joke.php');
        }

    }catch(PDOException $e){
        $err = "enable to connect to the database server ".$e->getMessage().'in'
        .$e->getFile() . '' .$e->getLine();
    }

    if(isset($_POST['id'])){
        $joke = $jokeTable->findByid($_POST['id']);

        $value = 'update joke';

        $title = 'edit you joke here';

        ob_start();

        include __DIR__.'/../templates/now.html.php';

        $output = ob_get_clean();

    }else{

        $value = 'insert joke';

        $title = "add your joke here";

        ob_start();

        include __DIR__.'/../templates/now.html.php';

        $output = ob_get_clean();
    }

  include '../templates/layout.html.php';
    


<?
    include 'database.inc.con.php';
    include_once 'func.inc.php';

    

    if(isset($_POST['id'])){
        $joke = findByid($pdo,'ijbd','id',$_POST['id']);
        $value = 'update joke';
        $title = 'edit you joke here';
        ob_start();
         include 'now.html.php';
        $output = ob_get_clean();
    }else{
        $value = 'insert joke';
        $title = "add your joke here";
        ob_start();
         include 'now.html.php';
        $output = ob_get_clean();
    }

    if(isset($_POST['update']) ){
        $record = $_POST['joke'];
        $record['jokeDate'] = new DateTime();
        $record['authorID'] = 1;
        unset($record['update']);
        save($pdo,'ijbd','id',$record);
        header('location: joke.php');
    }
    include 'layout.html.php';

?>
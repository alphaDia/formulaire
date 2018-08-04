<?
    include __DIR__.'/../includes/db.conection.php';
    include_once __DIR__.'/../class/DatabaseTable.php';
    try{
        

        $jokeTable = new DatabaseTable($pdo,'ijbd','id');
        $authorTable = new DatabaseTable($pdo,'author','id');

        /*$thejokes = $jokeTable->findAll();

        $jokes = [];
        foreach ($thejokes as $key => $joke) {
            $author = $authorTable->findByid($joke['authorID']);

            $jokes = [
                'id'       => $joke['id'],
                'jokeText' => $joke['jokeText'],
                'jokeDate' => $joke['jokeDate'],
                'name'     => $author['name'],
                'email'    => $author['email']
            ];
        }*/

        $pdostm = $jokeTable->alljokes();

        $nbrejoke = $jokeTable->total();

        $title = 'joke list';

        //$totaljokes = $jokeTable->totaljokes();
      
    }catch(PDOException $e){
        $err = "enable to connect to the database server ".$e->getMessage().'in'
        .$e->getFile() . '' .$e->getLine();
    }

    ob_start();
        
        include '../templates/joke.html.php';
            
    $output = ob_get_clean();

    include '../templates/layout.html.php';
?>
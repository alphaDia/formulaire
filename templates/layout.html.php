<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sample.css">
    <title><?= $title; ?></title>
</head>
<body>
    <header>
        <h1>welcome to internet database jokes</h1>
    </header>

    <nav>   
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="joke.php">Jokes list</a></li>
            <li><a href="save.php">add jokes</a></li>
        </ul>
    </nav>

    <main>
        <?= $output; ?>
    </main>

    <footer>
     &copy;ijdb<?= date('Y'); ?> 
    </footer>
</body>
</html>
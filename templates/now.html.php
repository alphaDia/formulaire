<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1><?= $title; ?></h1>
    <form action="" method="post">
        <input type="hidden" name="joke[id]" value='<?= $_POST['id'] ?? '';?>'>
        <textarea name="joke[jokeText]" id="jokeText" cols="30" rows="4" ><?= $joke['jokeText'] ?? ''; ?></textarea><br>
        <input type="submit" name="update" value="<?= $value; ?>">
    </form>
</body>
</html>
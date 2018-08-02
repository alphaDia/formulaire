<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ijdb Internet Joke Database</title>
</head>
<style>
    blockquote {display: table; margin-bottom: 1em;
     border-bottom: 1px solid #ccc; padding: 0.5em;}
    blockquote p {display: table-cell; width: 90%;
    vertical-align: top;}
    blockquote form {display: table-cell; width: 10%;}
</style>
<body>
   
    <?php if(isset($err)) :?>

        <p><?= $err ?></p>

    <?php else :?>

        <?php foreach ($pdostm as $joke) :?>
            <blockquote>
                <p>
                    <?$date =new DateTime($joke['jokeDate'])?>
                    <?= htmlspecialchars($joke['name'],ENT_QUOTES,'UTF-8') ?><?= ' '. $date->format('m-d-Y');?><br />
                    <?= htmlspecialchars($joke['jokeText'],ENT_QUOTES,'UTF-8'); ?>
                    <form action="deletejoke.php" method="post">
                        <input type="hidden" name="id" id="id" value=<?= $joke['id']?> >
                        <input type="submit" name='delete' value="DELETE">
                    </form>
                    <form action="save.php" method="post">
                        <input type="hidden" name="id" id="id" value='<?= $joke['id'] ?? '';?>' >
                        <input type="submit" name="edits" value="EDIT">
                    </form>
                </p>

            </blockquote>

        <?php endforeach; ?>

    <?php endif; ?>
   

   
</body>
</html>
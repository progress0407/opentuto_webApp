<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><a href="http://localhost/WebApp/practice/index.php">home</a></h2>
    <nav>
        <ol>
            <?php
                echo file_get_contents('list.txt');
            ?>
        </ol>
    </nav>
    <article>
        <?php
            // echo 'empty check: '.empty($_GET['id']).'<br/><br/>';
            // echo 'true?: '.(true===true).'<br/><br/>';
            if(!empty($_GET['id'])) {
                echo file_get_contents($_GET['id'].'.html');
            }
        ?>
    </article>
</body>
</html>
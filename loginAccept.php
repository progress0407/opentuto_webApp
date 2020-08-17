<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_POST["ID"];
        $pwd = $_POST["password"];
        echo $id."<br/>";
        echo $pwd;

        if($id === 'swCho'){
            if($pwd === '1324') {
                echo 'hi';
            } else {
                echo 'who?...';
            }
        } else {
            echo 'there\'s not id';
        }
    ?>
</body>
</html>
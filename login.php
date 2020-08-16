<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        document.write('login.php');
        var id = prompt('input the id');
        var pwd = prompt('input the pwd');
        if(id === 'swCho'){
            if(pwd === '1324'){
                document.write('hi');
            } else {
                document.write('who?..');
            }
        } else {
            document.write('there''s not id');
        }
    </script>
</body>
</html>
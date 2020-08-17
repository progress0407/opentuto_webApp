<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- hello? -->
    <script>
        // document.write('login.php');
        let id = prompt('input the id');
        let pwd;
        // console.log('hihi');
        if(id === 'swCho'){
            pwd = prompt('input the pwd');
            if(pwd === '1324') {
                document.write('hi');
            } else {
                document.write('who?..');
            }
            
        } else {
            document.write('there\'s not id');
        }
        
    </script>
    
</body>
</html>
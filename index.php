<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Web Application</title>
</head>
<body>
    <header>
        <a href="index.php"><img id="tobni" src="tobnibaqi.jpg"/></a>
        <h1>Web Application</h1>
    </header>
    <nav>
        <?php
            echo file_get_contents('navList.html')
        ?>
    </nav>
    <div class = "subNav">
            <ol>
                <?php
                    // echo 'page: '. file_get_contents($_GET['page'].'.html').'<br>';
                    // echo 'subPage: '. file_get_contents($_GET['subPage'].'.html').'<br>';
                    if(empty($_GET['page'])){
                        echo ' . . .';
                    } else {
                        echo file_get_contents($_GET['page'].'.html');
                    }
                ?>
            </ol>
    </div>
    <div>
        <input type="button" value="night/Day" id = "btn_nightDay" />
    </div>
    <article>
        <?php
            if(!empty($_GET['subPage'])) {
                echo file_get_contents($_GET['subPage'].'.html');
            } else {
                echo file_get_contents('welcome.html');
            }
        ?>
    </article>
</body>
<script src="script.js"></script>
</html>
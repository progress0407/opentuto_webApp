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
                    if(empty($_GET['page'])){
                        echo ' . . .';
                    } else {
                        if($_GET['page'] === 'ByReadingDB') {
                            // 아래 구문은 힘들다. 하지 말 것!
                            // echo file_get_contents('byReadingDB.php');
                            header("Location: ByReadingDB/index.php");
                        } else if($_GET['page'] === 'toDoList_js' or $_GET['page'] === 'paintjs') {
                            echo ' . . .';
                        } else {
                            echo file_get_contents($_GET['page']. "/" .$_GET['page']. ".html" );
                        }
                    }
                ?>
            </ol>
    </div>
    <div>
        <input type="button" value="night/Day" id = "btn_nightDay" />
    </div>
    <article>
        <?php
        // subPage가 존재한다면
            if(!empty($_GET['subPage'])) {
                if($_GET['page'] === 'SWsLab') {
                    echo file_get_contents($_GET['page']."/".$_GET['subPage']);
                } else {
                    echo file_get_contents($_GET['page']."/".$_GET['subPage'].".html");
                }
                // 비어있는 경우에는 아래와 같은 content를 실행해 줄 거야.
            } else {
                if($_GET['page'] === 'toDoList_js' or $_GET['page'] === 'paintjs'){
                    echo file_get_contents($_GET['page']."/index.html");
                    header("Location: ".$_GET['page']."/index.html");
                } else {
                    echo file_get_contents('welcome.html');
                }
            }
        ?>
    </article>
</body>
<script src="script.js"></script>
</html>
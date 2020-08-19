<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Application</title>
</head>
<link rel="stylesheet" href="style.css">
<body class="swCho">
    <header>
        <h1>즐거운 생활코딩의 SQL 시간이에요</h1>
    </header>
    <a href="./../index.php">돌아가기</a>
    <?php
        $conn = mysqli_connect('localhost', 'root', '13245657');
        mysqli_select_db($conn, 'openTutoWebApp');
        $result = mysqli_query($conn, 'SELECT id, title FROM topic;');
    ?>
    <nav>
        <p>
            <ol>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                        //var_dump($row);
                        echo '<li><a href="index.php?id=' . $row['id'] . '">' . $row['title']. '</a></li>';
                        echo '
                            <form action="deleteDB.php" method="POST">
                                <input type="hidden" name="toDelete" value="' .$row['id']. '">
                                <input type="submit" value="삭제" name = "'.$row['id']. '">
                            </form>';
                    }
                ?>
            </ol>
        </p>
    </nav>
    <article>
        <?php
            if(empty($_GET['id'])) {
                echo 'welcome';
            } else {
                $article = 'SELECT * FROM topic WHERE id='.$_GET['id'];
                $result = mysqli_query($conn, $article);
                $oneRow = mysqli_fetch_assoc($result);
                echo '<h2>'.$oneRow['title'].'</h2>';
                echo '<p>'.$oneRow['description'].'</p>';
            }
        ?>
            <form action="deleteDB.php" method="POST">
                삭제할 것 : <input type="text"  name="toDelete">
                <input type="submit" value="삭제">
            </form>
        <a href="writeDB.html"><input type="button" value="wrtie"></a>
    </article>
</body>
</html>
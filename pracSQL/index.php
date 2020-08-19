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
        $result = mysqli_query($conn, "SELECT * FROM topic;");
    ?>
    <nav>
        <p>
            <ol>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                        //var_dump($row);
                        // 리스트 목록 작성
                        echo '<li><a href="index.php?id=' . $row['id'] . '">' . $row['title']. '</a></li>';
                        echo '
                            <form action="deleteDB.php" method="POST">
                                <input type="hidden" name="toDelete" value="' .$row['id']. '">
                                <input type="submit" value="삭제">
                            </form>';
                        echo '
                            <form action="updateDB.php" method="POST">
                                <input type="hidden" name="id" value="'.$row['id']. '">
                                <input type="hidden" name="title" value="'.$row['title']. '">
                                <input type="hidden" name="description" value="'.$row['description']. '">
                                <input type="hidden" name="author" value="'.$row['author']. '">
                                <input type="submit" value="수정">
                            </form>';
                    }
                ?>
            </ol>
        </p>
    </nav>
    <!-- 본문 작성 -->
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
            <br>
            ===============================글 작성하기===============================
            <form action="writeDB.php" method="POST">
                <p>제목 : <input type="text" name="title"></p>
                <p>작성자 : <input type="text" name="author""></p>
                <p>본문 : <textarea name="description" cols="30" rows="10"></textarea></p>
                <input type="submit" value="submit">
            </form>
    </article>
</body>
</html>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Application</title>
</head>
<link rel="stylesheet" href="bbsStyle.css">
<body class="swCho">
    <header>
        <h1>즐거운 생활코딩의 SQL 시간이에요</h1>
    </header>
    <a href="./../index.php">back to the future</a>
    <?php
        // if(empty($_GET['id'])) {
            
        // } else {
            
        // }
        $conn = mysqli_connect('localhost', 'root', '13245657');
            mysqli_select_db($conn, 'openTutoWebApp');
            $result = mysqli_query($conn, "SELECT * FROM topic;");
    ?>
    <nav>
        <p>
            <ol>
                <?php
                    echo
                        '<table border="1">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> title </th>
                                    <th> author </th>
                                    <th> created </th>
                                    <th> delete </th>
                                    <th> update </th>
                                </tr>
                            </thead>
                            <tbody>';
                    while($row = mysqli_fetch_assoc($result)){
                        //var_dump($row);
                        // 리스트 목록 작성
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></td>';
                        echo '<td>'.$row['author'].'</td>';
                        echo '<td>'.$row['created'].'</td>';
                        echo '
                            <td>
                                <form action="deleteDB.php" method="POST">
                                    <input type="hidden" name="toDelete" value="' .$row['id']. '">
                                    <input type="submit" value="삭제">
                                </form>
                            </td>';
                        echo '
                            <td>
                                <form action="updateDB.php" method="POST">
                                    <input type="hidden" name="id" value=" '.$row['id'].'">
                                    <input type="hidden" name="title" value="'.htmlspecialchars($row['title']).'">
                                    <input type="hidden" name="description" value="'.htmlspecialchars($row['description']).'">
                                    <input type="hidden" name="author" value="'.htmlspecialchars($row['author']).'">
                                    <input type="submit" value="수정">
                                </form>
                            </td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
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
                echo '<h2>'.htmlspecialchars($oneRow['title']).'</h2>';
                // 본문의 경우는 정보로서 가치있는 태그를 좀 열어 줘야 해
                echo '<p>'.strip_tags($oneRow['description'], "<a><h1><h2><h3><h4><h5><h6><ul><ol><li><p>").'</p>';
            }
        ?>
        </article>
        <div>
            <form action="queryDelete.php" method="POST">
                삭제할 것 : <input type="text"  name="toDelete">
                <input type="submit" value="삭제">
            </form>
        </div>
        <div>
            <h2>글 작성하기</h2>
            <form action="queryCreate.php" method="POST">
                <p>제목 : <input type="text" name="title"></p>
                <p>작성자 : <input type="text" name="author""></a>
                <p>본문 : <textarea name="description" cols="30" rows="10"></textarea></p>
                <input type="submit" value="submit">
            </form>
        </div>
        <div>
            <h2>글 수정하기</h2>
            <?php
                if(empty($_GET['id'])){
                    echo '...';
                } else {
                    echo'
                        <form action="updatePage.php" method="POST">
                            <input type="text" name="id" value=" '.$oneRow['id'].'">
                            <input type="text" name="title" value="'.htmlspecialchars($oneRow['title']).'">
                            <input type="text" name="description" value="'.htmlspecialchars($oneRow['description']).'">
                            <input type="textarea" name="author" value="'.htmlspecialchars($oneRow['author']).'">
                            <input type="submit" value="수정">
                        </form>';
                }
            ?>
        </div>
        <br><br>
</body>
</html>
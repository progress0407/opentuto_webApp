<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Application</title>
</head>
<link rel="stylesheet" href="bbsStyle.css">
<body>
    <header>
        <a href="./index.php"><img id="tobni" src="../tobnibaqi.jpg"/></a>
        <h1>즐거운 생활코딩의 SQL 시간이에요</h1>
        <a class="backward" href="../index.php"><h2>Back To the Future</h2></a>
    </header>
    <!-- DB 접속하기 -->
    <?php
        require("lib/db.php");
        require("config/config.php");
        $conn = db_init($config["hostname"], $config["DBUser"], $config["DBPwd"], $config["domainName"]);
        $result = mysqli_query($conn, "SELECT * FROM topic;");      
    ?>
    <div class="upperContainer">
        <div class="BBSList">
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
                                    <form action="queryDelete.php" method="POST">
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
        </div>
        <div class = "writeArticle">
            <h2>글 작성</h2>
                <form action="queryCreate.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <th>
                                제목 : 
                            </th>
                            <td>
                            <input type="text" name="title">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                작성자 : 
                            </th>
                            <td>
                                <input type="text" name="author"">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                본문 :
                            </th>
                            <td>
                                <textarea name="description" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input class="imSubmit" type="submit" value="작성할까여">
            </form>
        </div>
    </div>
    <!-- 본문 보기 -->
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
        <?php
             if(!empty($_GET['id'])){
                echo '
                    <div>
                        <h2>글 수정</h2>
                        <form action="updatePage.php" method="POST">
                            <input type="text" name="id" value=" ' .$oneRow['id']. '">
                            <input type="text" name="title" value="'. htmlspecialchars($oneRow['title']) .'">
                            <input type="text" name="description" value="'. htmlspecialchars($oneRow['description']) .'">
                            <input type="textarea" name="author" value="'. htmlspecialchars($oneRow['author']). '">
                            <input type="submit" value="수정">
                        </form>
                    </div>';
            }
        ?>
        <div>
            <h2>어떤 것을 사라지게 하고 싶니</h2>
            <form action="queryDelete.php" method="POST">
                 <input type="text"  name="toDelete">
                <input type="submit" value="삭제">
            </form>
        </div>
        <br>
        <br>
</body>
</html>
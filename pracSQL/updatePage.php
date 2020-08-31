<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>자, 여기서 수정할 수 있어 !</h2>
        <form action="queryUpdate.php" method="post">
            <input type="hidden" name="id" value= <?=$_POST['id']?> >
            <p>제목 : <input type="text" name="title" value= <?=$_POST['title']?> ></p>
            <p>작성자 : <input type="text" name="author" value= <?=$_POST['author']?> ></p>
            <p>본문 : <textarea name="description" cols="30" rows="10"><?=$_POST['description']?></textarea></p>
        <input type="submit" value="submit">
    </form>
</body>
</html>
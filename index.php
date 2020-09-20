<!DOCTYPE html>
<html lang="kor">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Web Application</title>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center"> 
            <header>
                <a href="index.php"><img class="img-circle" id="tobni" src="tobnibaqi.jpg" width="100px" height="100px"/></a>
                <h1>Web Application</h1>
            </header>
        </div>
        <nav>
            <ul class="nav nav-tabs">
                <?php
                    echo file_get_contents('navList.html')
                ?>
            </ul>
        </nav>
        <div class="row">
            <div class = "col-md-2">
                <ul class="nav nav-pills nav-stacked">
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
                </ul>
            </div>
            <article class="col-md-10">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-warning">night</button>
                    <button type="button" class="btn btn-success">day</button>
                    <button type="button" class="btn btn-danger" id = "btn_nightDay">night/Day</button>
                </div>
                <hr>
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
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
<script src="script.js"></script>
</html>
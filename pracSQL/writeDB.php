<?php
    $conn = mysqli_connect('localhost', 'root', '13245657');
    mysqli_select_db($conn, 'openTutoWebApp');
    $query = "INSERT INTO topic (title, description, author, created) 
            VALUES('".$_POST['title']."',  '" .$_POST['description']. "',  '" .$_POST['author']. "',  now());" ;
    $result = mysqli_query($conn, $query);
    // header('Location : http://localhost/webApp/pracSQL/index.php');
?>
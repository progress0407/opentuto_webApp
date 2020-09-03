<?php
    $conn = mysqli_connect('localhost', 'root', '13245657');
    mysqli_select_db($conn, 'openTutoWebApp');
    $query = 
            "UPDATE topic
                SET
                    title = '".$_POST['title']."',
                    description = '".$_POST['description']."',
                    author = '".$_POST['author']."',
                    created = now()
                WHERE
                     id = ".$_POST['id'].";" ;
    
    echo 'query : '.$query;                 
    $result = mysqli_query($conn, $query);
    echo '<br> result : '.$result;
    var_dump($result);
?>
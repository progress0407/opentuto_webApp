<?php
    $conn = mysqli_connect('localhost', 'root', '13245657');
    mysqli_select_db($conn, 'openTutoWebApp');
    $query = "DELETE from topic where id =" .$_POST['toDelete']. ";" ;
    $result = mysqli_query($conn, $query);
    echo $query;
?>
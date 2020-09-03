<?php
    function db_init($hostname, $DBUser, $DBPwd, $domainName) {
        $conn = mysqli_connect($hostname, $DBUser, $DBPwd);
        mysqli_select_db($conn, $domainName);
        return $conn;
    }
?>
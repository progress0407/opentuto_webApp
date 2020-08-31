<h2><a href="index.php?page=testLab&subPage=security.php">back to the future</a></h2>
&lt;a&gt;
<?php
    // echo "2";
    // echo 1+1;
    echo htmlspecialchars('<a>');
    echo htmlspecialchars('<a href="http://opentutorials.org/course/1">생코</a>');
    echo htmlspecialchars('<script>alert('메롱');</script>');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Hello, World!-->
    <h2>PHP</h2>
    <?php
        // echo "Hello, World!" ;
        // echo 10+20;
        echo "10"."10";
    ?>
    <h2>Java Script</h2>
    <script>
        // document.write(10+10);
        document.write("10"+"10");
    </script>
    <?php
        $nm = "swcho";
        echo  "hi <br>" . $nm."<br><br>";
        
        var_dump(2==1);
        echo 2==1;
        echo "<br>";
        $result = (2==1);

        if($result){
            echo "참이야";
        } else{
            echo "거짓이야";
        }
    ?>
    <h2>
        loop
    </h2>
    <ol>
        <script>
            let i=1;
            while(i<5) {
                document.write('<li> hi </hi>');
                i++;
                // i= i+1;
            }
        </script>
    </ol>
    <ol>
        <?php
            $i = 1;
            while($i<5) {
                echo "<li> hi </hi>";
                // $i = $i + 1;
                $i++;   
            }
        ?>
    </ol>
    <H2>Array</H2>
    <ol>
    <?php
        $li = array('one', 'two', 'three');
        $i=0;
        for($i=0 ; $i < count($li) ; $i++) {
            echo "<li>". $li[$i]."</li>";
        }
    ?>
    </ol>
    <ol>
        <script>
            let list = new Array("최진혁", "최유빈", "한이람", "한이은", "이고잉");
            i=0;
            while( i < list.length) {
                document.write('<li>'+ list[i++] +'</li>');
            }
        </script>
    </ol>
    <h2>Function</h2>
    <?php
        function a(){
            echo "hello PHP function <br>";
        }
        a();
        function b($a, $b){
            $r = $a+$b;
            echo "result : ".$r;
        }
        $a=7;
        $b=5;
        b($a, $b);
        
    ?>
    
</body>
</html>
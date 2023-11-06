<?php 

    // single line comments

    # comment

    /* multi line
    comments 
    also */

    // variable & data types
        $a = 23;            // [initialization & declaration is need to create a variable]

        $dfdsf343___324dfs;
        
        $int = 432234;
        $str = "String";
        $int_as_str = "3244324";
        $boolean = true;
        $boolean = false;
        $float = 34.34;

        $arr1 = [4232,"sadasd",true,4234.43];     // [index value array]
        $arr2 = ["name"=>"Akash Soni","age"=>25,"DL"=>true];    // [key-value pair array]

        $arr3 = array(4232,"sadasd",true,4234.43);

    // input & output
        $username = $_GET['uname'] ?? "Akash Soni";


        echo "Hello", "<br>", "World";
        $result = print("Hello"."<br>"."World");

        if(!$result) {

        }
        else {
            echo "PRinted successfully<br>";
        }

    // operators
        # arithmetic ops [ + - * / % ++ -- ]
        # conparison ops [ > < >= <= == === != ]
            $a=10;
            $b="10";
            echo $a===$b;
        # logical ops [ && || ! ]
            $a=10; $b=20; $c=30;
            echo $a>$b || $c<$b;
        # assignment ops [ = += -= *= /= %= ]
            $a=10; $b=20;
            $a = $a+$b;
            $a+=$b;
        # conditional operator [ ?: ]
            $a=10; $b=20;
            echo ($a>$b) ? $a : $b ;


    // branching 
        $age = 16; $ll=4;
       
        # if statement
            if($age > 18) {
                echo "Eligible to drive";
            }

        # if...else statement
            if($age > 18) {
                echo "Eligible to drive";
            }
            else {
                echo "Not eligible to drive";
            }

        # if...else if...else statement
            if($age>=16 && $age<18 && !$ll ) {
                echo "Eligible for LL";
            } 
            else if ($age>=16 && $age<18 && $ll) {
                echo "Not eligible for DL";
            }
            else if($age>=18 && !$ll) {
                echo "Eligible for LL";
            } 
            else if($age>=18 && $ll>6) {
                echo "Eligible for DL";
            }
            else {
                echo "Not Eligible for LL";
            }

        # switch...case statement
            $grade = 'z';
            switch($grade) {
                case 'A+':
                    echo "<br>Marks in the range of 95 to 100";
                    break;
                case 'A':
                    echo "<br>Marks in the range of 90 to 94";
                case 'B':
                    echo "<br>Marks in the range of 80 to 90";
                    break;
                case 'C':
                    echo "<br>Marks in the range of 70 to 80";
                    break;
                case 'D':
                    echo "<br>Marks in the range of 60 to 70";
                    break;
                case 'E':
                    echo "<br>Marks in the range of 40 to 60";
                    break;
                case 'F':
                    echo "<br>Marks below 40";
                    break;
                default:
                    echo "Wrong input";  
            }
            
            
    // looping
        # while loop
            $i = 1000;
            while($i<=100) {
                if($i%2==0) {
                    echo "<br>",$i;
                }
                $i++;
            }

        # for loop
            for($i=0;$i<=100;$i++) {
                if($i%2==0) {
                    echo "<br>",$i;
                }
            }
            
        # do...while loop
            $i=1000;
            do {
                if($i%2==0) {
                    echo "<br>",$i;
                }
                $i++;
            }
            while($i<=100);

        # foreach loop
            $student = ["roll_no"=>1,"name"=>"Akash Soni","address"=>"Bengaluru","attendance"=>75.6];
            foreach ($student as $value) {
                echo $value;
            }

    // functions
        function sum($a,$b) {
            return $a+$b;
        }

        $sum = sum(12,14);

        $array = array();
        print($array);
        password_hash($a,$b);
        openssl_cms_encrypt($a,$b,$c,$d);
        openssl_cms_decrypt($a,$b,$c);

    // superglobal variables
        $GLOBALS;
        $_GET;
        $_POST;
        $_SESSION;
        $_COOKIE;
        $_REQUEST;
        $_FILES;
        $_ENV;
        $_SERVER;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<body>
    <p id="para">Hello <?php echo $username ?></p>
    <button type="button">Click</button>
    <form method="get" action="">
        <input type="text" name="uname" placeholder="Enter your name" />
        <button type="submit">SUBMIT</button>
    </form>
    <?php 
        $students = ["student1"=>[1,"Akash Soni","Bengaluru"],"student2"=>[2,"Soumya","Chennai"],"student3"=>[3,"Yogesh","Pune"]];
        foreach ($students as $value) {
    ?>
        Student ID: <?php echo $value[0]; ?><br>
        Student Name: <?php echo $value[1]; ?><br>
        Student Address: <?php echo $value[2]; ?><br>
    <?php }?>
</body>
</html>
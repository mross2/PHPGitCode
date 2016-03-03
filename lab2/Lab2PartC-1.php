<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(!empty($_POST['fName'])&& !empty($_POST['lName']) && !empty($_POST['heightFeet'])&& !empty($_POST['heightInches'])){
                echo "<p> Your First Name is: ".$_POST['fName']."</p>";
                echo "<p> Your Last Name is: ".$_POST['lName']."</p>";
                if (is_numeric($_POST['heightFeet'])&& is_numeric($_POST['heightInches']) ){
                    $feet = $_POST['heightFeet'] / 3.2808;
                    $inches = $_POST['heightInches'] / 39.370;
                    $metres = $feet + $inches;
                    echo "<p> Your Height in Metres is: ".round($metres,2)."</p>";
                }else{
                    echo "<p> Your Height in Metres Could Not be Converted</p>";
                }
            }else{
                echo "<p>Invalid input</p>";
            }

        ?>
    </body>
</html>
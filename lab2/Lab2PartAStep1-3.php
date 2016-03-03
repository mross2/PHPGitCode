<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        function outputHeading($H, $message) {
        if($H >= 1 && $H <= 6) {
        echo "<h$H>$message</h$H>";
        } else {
        echo "error this h tag is outside the bounds of 1-6";
        }
        }//end outputHeading
        ?>

        <h3>Step 1</h3>
        <?php
        for($i=1; $i<=7; $i++) {
            outputHeading($i, "This is a h" . $i . " heading");
        }// end forLoop
        ?>
        <br />

        <h3>Step 2</h3>
        <?php
        $myString = "Hello World";
        function appendByVal(&$s) {
            $s .= "...blah";
        }// end append By Value
        function appendByRef(&$s) {
            $s .= "...blah";
        }// end append By Reference
        echo $myString . "<br />";
        appendByVal($myString);
        echo $myString . "<br />";
        appendByRef($myString);
        echo $myString . "<br />";
        ?>
        <br />

        <h3>Step 3</h3>
        <?php
        $myGlobal = 19;
        function printAge() {
            echo "You are " . $GLOBALS['myGlobal'] . " years old!!!";
        }
        printAge();
        ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    <?php
    // Using a modified snip of code from http://phpsnips.com/115/Zodiac-Signs#.VggyQnUVhHw to save time
    function zodiac ( $month , $day )
    {
        $zodiac ="";

        if     ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $zodiac = "Aries"; }
        elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $zodiac = "Taurus"; }
        elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $zodiac = "Gemini"; }
        elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $zodiac = "Cancer"; }
        elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $zodiac = "Leo"; }
        elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $zodiac = "Virgo"; }
        elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $zodiac = "Libra"; }
        elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $zodiac = "Scorpio"; }
        elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $zodiac = "Sagittarius"; }
        elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $zodiac = "Capricorn"; }
        elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $zodiac = "Aquarius"; }
        elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $zodiac = "Pisces"; }

        return $zodiac;
    }
    //End of modified code snip
            if(!empty($_GET['fName'])&& !empty($_GET['lName']) && !empty($_GET['birthMonth'])&& !empty($_GET['birthDay'])){
                echo "<p> Your First Name is: ".$_GET['fName']."</p>";
                echo "<p> Your Last Name is: ".$_GET['lName']."</p>";
                if (is_numeric($_GET['birthMonth'])&& is_numeric($_GET['birthDay']) ){
                    $month =$_GET['birthMonth'];
                    $day =$_GET['birthDay'];
                    echo "<p> Your Zodiac is: ". zodiac($month,$day)."</p>";
                }else{
                    echo "<p> Your Zodiac Could Not be Determined</p>";
                }
            }else{
                echo "<p>Invalid input</p>";
            }
        ?>
    </body>
</html>
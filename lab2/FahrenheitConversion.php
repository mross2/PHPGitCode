<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Lab 2 part B</title>
    <style type="text/css">
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<h2> Fahrenheit to Celsius</h2>
<a href="http://localhost:8880/CelsiusConversion.php">switch to celsius to fahrenheit!</a>
<table>
    <thead>
    <tr>
        <th>Fahrenheit</th>
        <th>Celsius</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i =0; $i <= 100; $i+=1):
        $Celsius = ($i - 32) * (5/9);
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo round($Celsius,2); ?></td>
        </tr>
    <?php
    endfor; // end of for loop for kilo table
    ?>
    </tbody>
</table>


</body>
</html>
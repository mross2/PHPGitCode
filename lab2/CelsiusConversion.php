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

<h2>Celsius to Fahrenheit</h2>
<a href="http://localhost:8880/FahrenheitConversion.php">switch to Fahrenheit to Celsius!</a>
<table>
    <thead>
    <tr>
        <th>Celsius</th>
        <th>Fahrenheit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i =0; $i <= 100; $i+=1):
        $Fahrenheit = $i * 1.8 + 32;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $Fahrenheit; ?></td>
        </tr>
    <?php
    endfor; // end of for loop for kilo table
    ?>
    </tbody>
</table>


</body>
</html>
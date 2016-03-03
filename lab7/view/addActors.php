<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Actor Insert</title>
    </head>
    <body>
        <h1>Add Actor:</h1>
        <form id="formUpdate" name="formUpdate" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>
            <p>    
		<label>First Name: 
                    <input type="text" name="firstName" id="firstName" value=""/>
                </label>  
            </p>  
            <p>    
		<label>Last Name:
                    <input type="text" name="lastName" id="lastName" value=""/>
                </label>  
            </p>  
            <p> 
                <input type="submit" name="AddBtn" id="AddBtn" value="Update" onclick="return confirm('Really Add?')"/>
            </p>
        </form>
    </body>
</html>

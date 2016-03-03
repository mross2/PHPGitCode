<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Actors</title>
        <style type="text/css">
            table
            {
               border: 1px solid purple;
            }
            th, td
            {
               border: 1px solid red;
            }
            .erase{
                transform: rotate(180deg);
                -webkit-transform: rotate(180deg);
            }
        </style>
    </head>
    <body>
        <?php
            if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
        <?php
            endif;
        ?>
        <h1>Current Actors:</h1>
        <form id="searchForm" name="searchForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="searchText" id="searchText">
            <input type="submit" name="SearchBtn" id="SearchBtn" value="Add actor">
        </form>
        <br/>
        <form id="formAdd" name="formAdd" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="submit" name="addActor" value="Add actor">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Actor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($arrayOfActors as $Actor):
                    ?>
                        <tr>
                            <td><?php echo $Actor->getID(); ?></td>
                            <td><?php echo $Actor->getFirstName(); ?></td>
                            <td><?php echo $Actor->getLastName(); ?></td>
                            <td>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $Actor->getID(); ?>">
                                    <img src="images/edit_icon.png" height="25px" width="25px"/>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idDelete=<?php echo $Actor->getID(); ?>">
                                    <img class="erase" src="images/edit_icon.png" height="25px" width="25px"/>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                ?>
            </tbody>
            <tfoot></tfoot>
        </table>  
    </body>
</html>

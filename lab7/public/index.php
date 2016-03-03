<?php

require_once '../controller/ActorController.php';

$ActorController = new ActorController();

if(isset($_GET['idUpdate']))
{
    $ActorController->updateAction($_GET['idUpdate']);
}
elseif(isset($_GET['idDelete']))
{
    $ActorController->deleteAction($_GET['idDelete']);
}
elseif(isset($_POST['addActor'])){
    $ActorController->addAction();

}
elseif (isset($_POST['UpdateBtn']))
{
    $ActorController->commitUpdateAction($_POST['editActorId'],$_POST['firstName'],$_POST['lastName']);
}
elseif(isset($_POST['DeleteBtn'])){
    $ActorController->commitDeleteAction($_POST['editActorId'],$_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_POST['AddBtn']))
{
    $ActorController->commitAddAction($_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_POST['SearchBtn']))
{
    $ActorController->searchAction($_POST['searchText']);
}
else
{
    $ActorController->displayAction();
}

?>
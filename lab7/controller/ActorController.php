<?php

require_once('../model/ActorModel.php');

class ActorController
{
    public $model;
    
    public function __construct()
    {
        $this->model = new ActorModel();
    }
    
    public function displayAction()
    {
        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function updateAction($ActorID)
    {
        $currentActor = $this->model->getActor($ActorID);

        include '../view/editActors.php';
    }
    public function deleteAction($ActorID)
    {
        $currentActor = $this->model->getActor($ActorID);

        include '../view/deleteActors.php';
    }

    public function addAction(){
        include '../view/addActors.php';
    }

    public function commitUpdateAction($ActorID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($ActorID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->updateActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }
    public function commitDeleteAction($ActorID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($ActorID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->deleteActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function commitAddAction($fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = new Actor(null,$fName,$lName);

        $lastOperationResults = $this->model->addActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function searchAction($searchText){
        $lastOperationResults = "";
        $arrayOfActors = $this->model->getAllSearchedActors($searchText);

        include '../view/displayActors.php';
    }
}

?>

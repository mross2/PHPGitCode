<?php

require_once '../model/Actor.php';

require_once '../model/data/MySQLiActorDataModel.php';
//require_once '../model/data/PDOMySQLActorDataModel.php';

class ActorModel
{
    private $m_DataAccess;
    
    public function __construct()
    {
        $this->m_DataAccess = new MySQLiActorDataModel();
//        $this->m_DataAccess = new PDOMySQLActorDataModel();
    }
    
    public function __destruct()
    {
        // not doing anything at the moment
    }
            
    public function getAllActors()
    {
        $this->m_DataAccess->connectToDB();
        
        $arrayOfActorObjects = array();
        
        $this->m_DataAccess->selectActors();
        
        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
                    $this->m_DataAccess->fetchActorFirstName($row),
                    $this->m_DataAccess->fetchActorLastName($row));
            
            $arrayOfActorObjects[] = $currentActor;
        }
        
        $this->m_DataAccess->closeDB();
        
        return $arrayOfActorObjects;
    }

    public function getAllSearchedActors($searchText)
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfActorObjects = array();

        $this->m_DataAccess->searchedActors($searchText);

        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
                $this->m_DataAccess->fetchActorFirstName($row),
                $this->m_DataAccess->fetchActorLastName($row));

            $arrayOfActorObjects[] = $currentActor;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfActorObjects;
    }

    public function getActor($ActorID)
    {
        $this->m_DataAccess->connectToDB();
        
        $this->m_DataAccess->selectActorById($ActorID);
        
        $record =  $this->m_DataAccess->fetchActors();

         $fetchedActor = new Actor($this->m_DataAccess->fetchActorID($record),
                 $this->m_DataAccess->fetchActorFirstName($record),
                 $this->m_DataAccess->fetchActorLastName($record));
        
        $this->m_DataAccess->closeDB();
        
        return $fetchedActor;
    }
    
     public function updateActor($ActorToUpdate)
    {
        $this->m_DataAccess->connectToDB();
        
        $recordsAffected = $this->m_DataAccess->updateActor($ActorToUpdate->getID(),
                $ActorToUpdate->getFirstName(),
                $ActorToUpdate->getLastName());
        
        return "$recordsAffected record(s) updated succesfully!";
    }

    public function deleteActor($ActorToDelete)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->deleteActor($ActorToDelete->getID(),
            $ActorToDelete->getFirstName(),
            $ActorToDelete->getLastName());

        return "$recordsAffected record(s) updated succesfully!";
    }
    public function addActor($ActorToAdd)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->addActor(
            $ActorToAdd->getFirstName(),
            $ActorToAdd->getLastName()
            );

        return "$recordsAffected record(s) updated succesfully!";
    }
}

?>

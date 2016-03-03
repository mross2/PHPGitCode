<?php

require_once '../model/data/iActorDataModel.php';
class MySQLiActorDataModel implements iActorDataModel
{

    private $dbConnection;
    private $result;

    // iActorDataAccess methods
    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Sakila Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    public function selectActors()
    {
       $selectStatement = "SELECT * FROM actor";
       $selectStatement .= " ORDER BY actor_id DESC LIMIT 0,10;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }

    }

    public function searchedActors($searchText)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " WHERE first_name LIKE '%$searchText%'";
        $selectStatement .= " OR last_name LIKE '%$searchText%'";
        $selectStatement .= " ORDER BY actor_id DESC";
        $selectStatement .= " LIMIT 0,10";
        $this->result = @$this->dbConnection->query($selectStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }

    public function selectActorById($ActorID)
    {
       $selectStatement = "SELECT * FROM actor";
       $selectStatement .= " WHERE actor.actor_id = $ActorID;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }
    }
    

    public function fetchActors()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }
    
    public function updateActor($ActorID,$first_name,$last_name)
    {
       $updateStatement = "UPDATE actor";
       $updateStatement .= " SET first_name = '$first_name',last_name='$last_name'";
       $updateStatement .= " WHERE actor_id = $ActorID;";
       $this->result = @$this->dbConnection->query($updateStatement);
       if(!$this->result)
       {
               die('Could not update records in the Sakila Database: ' .
                       $this->dbConnection->error);
       }
       
       return $this->dbConnection->affected_rows;
    }

    public function deleteActor($ActorID)
    {
        $deleteStatement = "DELETE FROM actor";
        $deleteStatement .= " WHERE actor_id = $ActorID;";
        $this->result = @$this->dbConnection->query($deleteStatement);
        if(!$this->result)
        {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function addActor($first_name,$last_name)
    {
        $addStatement = "INSERT INTO actor";
        $addStatement .= " (first_name, last_name) VALUES('$first_name', '$last_name')";
        $this->result = @$this->dbConnection->query($addStatement);
        if(!$this->result)
        {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }
    
    public function fetchActorID($row)
    {
       return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
       return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
       return $row['last_name'];
    }
}

?>

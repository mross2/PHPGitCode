<?php

require_once('../model/Actor.php');

class Actor
{
    private $m_ActorId;
    private $m_firstName;
    private $m_lastName;
    
    public function __construct($in_id,$in_fname,$in_lname)
    {
        $this->m_ActorId = $in_id;
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
    }
    
    public function getID()
    {
        return ($this->m_ActorId);
    }
    
    public function getFirstName()
    {
        return ($this->m_firstName);
    }
    
    public function setFirstName($in_firstName)
    {
        $this->m_firstName = $in_firstName;
    }

    public function getLastName()
    {
        return ($this->m_lastName);
    }
    
    public function setLastName($in_lastName)
    {
        $this->m_lastName = $in_lastName;
    }
}

?>

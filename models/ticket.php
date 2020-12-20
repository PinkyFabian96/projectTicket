<?php

class Ticket{
    private $id;
    private $code;
    private $date;
    private $recurrent;
    private $claim_description;
    private $claim_type_id;
    private $identification_card;
    
    private $db;
    public function __construct(){
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getDate() {
        return $this->date;
    }

    function getRecurrent() {
        return $this->recurrent;
    }

    function getClaim_description() {
        return $this->claim_description;
    }

    function getClaim_type_id() {
        return $this->claim_type_id;
    }   

    function getIdentification_card() {
        return $this->identification_card;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setCode($code): void {
        $this->code = $this->db->real_escape_string($code);
    }

    function setDate($date): void {
        $this->date = $date;
    }

    function setRecurrent($recurrent): void {
        $this->recurrent = $this->db->real_escape_string($recurrent);
    }

    function setClaim_description($claim_description): void {
        $this->claim_description = $this->db->real_escape_string($claim_description);
    }

    function setClaim_type_id($claim_type_id): void {
        $this->claim_type_id = $claim_type_id;
    }

    function setIdentification_card($identification_card): void {
        $this->identification_card = $this->db->real_escape_string($identification_card);
    }
    
    
    public function getAll(){
        try {
            $connectionDB = $this->db;
            $sql = "SELECT t.*, ct.claim_type_description as 'claim_type_description' "
                    . "FROM ticket t JOIN claim_type ct ON t.claim_type_id = ct.id";
                    
            $tickets = $connectionDB->query($sql);
        } catch (Exception $ex) {
            echo 'Error in getAll '+$ex;
        }
        return $tickets;
    }
    
        public function getTicket(){
         try{
            $connectionDB = $this->db;
            $sql = "SELECT t.*, ct.claim_type_description FROM ticket t JOIN claim_type ct ON t.claim_type_id= ct.id WHERE t.id = {$this->getId()}";
            $ticket = $connectionDB->query($sql);
            return $ticket->fetch_object();          
        } catch (Exception $ex) {

        } finally {
            $connectionDB->close();
        }
    }
    
     public function save(){
        try {
            $connectionDB = $this->db;
            $connectionDB->autocommit(FALSE);
            $sql = "INSERT INTO ticket(code ,date, recurrent, claim_description, claim_type_id, identification_card) VALUES('{$this->getCode()}','{$this->getDate()}', '{$this->getRecurrent()}',".
                    " '{$this->getClaim_description()}', {$this->getClaim_type_id()}, '{$this->getIdentification_card()}')";
            $result = false;
            if($connectionDB->query($sql)){
               $connectionDB->commit();
               $result = true;
            }
            
        } catch (Exception $ex) {
            error_log($ex);
        } finally {
            $connectionDB->close();
        }
        return $result;     
    }
    
    

    
}


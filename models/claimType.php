<?php

class ClaimType{
    private $id;
    private $claim_type_description;
    
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getClaim_type_description() {
        return $this->claim_type_description;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setClaim_type_description($claim_type_description): void {
        $this->claim_type_description = $this->db->real_escape_string($this->claim_type_description);
    }
    
    public function getAll(){
        try {
            $connectionDB = $this->db;
            $sql = "SELECT ct.* FROM claim_type ct";

            $claimTypes = $connectionDB->query($sql);
        } catch (Exception $ex) {
            echo $ex;
        }
        return $claimTypes;
    }


    
}


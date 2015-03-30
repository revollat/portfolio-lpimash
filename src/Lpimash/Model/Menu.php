<?php
namespace Lpimash\Model;

class Menu {
    
    protected $db;

    public function __construct(\Doctrine\DBAL\Connection $db){
        $this->db = $db;
    }
    
    public function getItems(){
        return $this->db->fetchAll('SELECT * FROM menu');
    }
    
    
}
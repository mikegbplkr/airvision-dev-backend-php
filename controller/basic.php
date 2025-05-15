<?php
class Basic {
    protected $conn; 
    protected $table;

    public function __construct($db, $table) {
        $this->conn = $db;
        $this->table = $table;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM $this->table");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
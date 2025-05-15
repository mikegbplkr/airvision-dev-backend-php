<?php
trait BasicTrait {
    protected $conn;  
    abstract protected function getTable();
    public function setConnection($conn) {
        $this->conn = $conn;
    } 
    public function getAll() {
        $table = $this->getTable();
        $result = $this->conn->query("SELECT * FROM $table");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function show($id) {
        $table = $this->getTable();
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            if ($data) {
                echo json_encode($data);
            } else {
                echo json_encode(["error" => "Record not found"]);
            }
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }
}

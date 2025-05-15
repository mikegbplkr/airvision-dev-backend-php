<?php
require_once './trait/BasicTrait.php';

class CCTVController{
    //  extends Basic 
    use BasicTrait; 
    protected $table = 'cctv';
    public function __construct($db) {
        $this->setConnection($db); 
    }
    protected function getTable() {
        return $this->table;
    } 
    public function create($input) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (cctv_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $input['cctv_id'], $input['user_id']);
        if ($stmt->execute()) {
            echo json_encode(["message" => "CCTV added", "id" => $stmt->insert_id]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }

    public function update($id, $input) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET cctv_id = ?, user_id = ? WHERE id = ?");
        $stmt->bind_param("ssi", $input['cctv_id'], $input['user_id'], $id);
        if ($stmt->execute()) {
            echo json_encode(["message" => "CCTV updated"]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(["message" => "CCTV deleted"]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }
}

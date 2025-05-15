<?php 
require_once './trait/BasicTrait.php';
Class StreamerController{
    use BasicTrait;  
    protected $table = 'streamer';
    public function __construct($db) {
        $this->setConnection($db); 
    }
    protected function getTable() {
        return $this->table;
    }   

 
    public function create($input) { 
        $stmt = $this->conn->prepare("INSERT INTO $this->table (user_id, generated_stream, user_stream_id, stream, callId, isLive) VALUES (?, ?, ?, ?, ?, ?)");
 
        $stmt->bind_param(
            "sssssi", 
            $input['user_id'], 
            $input['generated_stream'], 
            $input['user_stream_id'], 
            $input['stream'], 
            $input['callId'], 
            $input['isLive'] 
        );
        if ($stmt->execute()) {
            echo json_encode(["message" => "stream added", "id" => $stmt->insert_id]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        } 

    } 
    public function update($id, $input) { 
        $stmt = $this->conn->prepare("UPDATE $this->table SET stream = ?, user_id = ?, isLive = ? WHERE id = ?");
        $stmt->bind_param("ssii", $input['stream'], $input['user_id'], $input['isLive'], $id);
         if ($stmt->execute()) {
            echo json_encode(["message" => "Stream updated", "id" => $id]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(["message" => "streamer deleted"]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
    }
}

?>
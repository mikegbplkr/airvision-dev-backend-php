<?php
// CORS & JSON Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require_once 'db/connect.php';
require_once 'controller/cctvController.php'; 
require_once 'controller/streamerController.php'; 
// Handle preflight requests 

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'OPTIONS') {
    http_response_code(200);
    exit();
} 
function getRequestData() {
    return json_decode(file_get_contents("php://input"), true);
} 

$db = new Database();
$conn = $db->connect(); 
$cctv = new CCTVController($conn);   
$streamer = new StreamerController($conn);   

$uri = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/')); 
  
if ($uri[1] !== 'api') {
    echo json_encode(["error" => "Invalid API path"]);
    exit;
} 
if ($method === 'GET' && count($uri) === 1) {
    echo json_encode("From backend side");
    exit;
}

// /api/cctv
if ($uri[2] === 'cctv') {
    switch ($method) {
        case 'GET':
            if (isset($uri[3])) {
                $cctv->show((int)$uri[3]);  
            } else {
                $cctv->getAll();
            }
            break;
        case 'POST':
            $cctv->create(getRequestData());
            break;
        case 'PUT':
            $id = $uri[3] ?? null;
            if ($id) {
                $cctv->update($id, getRequestData());
            } else {
                echo json_encode(["error" => "ID is required"]);
            }
            break;
        case 'DELETE':
            $id = $uri[3] ?? null;
            if ($id) {
                $cctv->delete($id);
            } else {
                echo json_encode(["error" => "ID is required"]);
            }
            break;
        default:
            echo json_encode(["error" => "Method not allowed"]);
    }
    exit;
}

// /api/streamer
if ($uri[2] === 'stream') {
    switch ($method) {
        case 'GET': 
            if (isset($uri[3])) {
                $streamer->show((int)$uri[3]);  
            } else {
                $streamer->getAll();
            }
            break;
        case 'POST': 
        //    file_put_contents('php://stderr', print_r(getRequestData(), true)); 
            $streamer->create(getRequestData()); 
            break;
        case 'PUT':
            $id = $uri[3] ?? null; 
            if ($id) {
                $streamer->update($id, getRequestData());
            } else {
                echo json_encode(["error" => "ID is required"]);
            }
            break;
        case 'DELETE':
            $id = $uri[2] ?? null;
            if ($id) {
                $streamer->delete($id);
            } else {
                echo json_encode(["error" => "ID is required"]);
            }
            break;
        default:
            echo json_encode(["error" => "Method not allowed"]);
    }
    exit;
}
echo json_encode(["error" => "Unknown endpoint"]);

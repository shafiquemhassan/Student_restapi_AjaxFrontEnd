<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['student_id'] ?? null;

try {
    
    $dsn = "mysql:host=localhost;dbname=login;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

   
    $sql = "DELETE FROM students WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Student record deleted successfully.', 'status' => true]);
        } else {
            echo json_encode(['message' => 'No record found with that ID.', 'status' => false]);
        }
    } else {
        echo json_encode(['message' => 'Failed to delete record.', 'status' => false]);
    }

} catch (PDOException $e) {
    echo json_encode(['message' => 'Database error: ' . $e->getMessage(), 'status' => false]);
}
?>

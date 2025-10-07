<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$student_id      = $data['student_id'] ?? null;
$student_name    = $data['student_name'] ?? '';
$student_fname   = $data['student_fname'] ?? '';
$student_address = $data['student_address'] ?? '';
$student_city    = $data['student_city'] ?? '';
$student_state   = $data['student_state'] ?? '';
$student_contact = $data['student_contact'] ?? '';

try {
    
    $dsn = "mysql:host=localhost;dbname=login;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    
    $sql = "UPDATE students 
            SET name = :name,
                fname = :fname,
                address = :address,
                city = :city,
                state = :state,
                contact = :contact
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    
    $stmt->bindParam(':name', $student_name);
    $stmt->bindParam(':fname', $student_fname);
    $stmt->bindParam(':address', $student_address);
    $stmt->bindParam(':city', $student_city);
    $stmt->bindParam(':state', $student_state);
    $stmt->bindParam(':contact', $student_contact);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Student record updated successfully.', 'status' => true]);
    } else {
        echo json_encode(['message' => 'Failed to update student record.', 'status' => false]);
    }

} catch (PDOException $e) {
    echo json_encode(['message' => 'Database error: ' . $e->getMessage(), 'status' => false]);
}
?>

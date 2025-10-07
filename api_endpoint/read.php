<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    
    $dsn = "mysql:host=localhost;dbname=login;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enables exception handling
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  // Fetch as associative array
    ]);

    
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql);

    $result = $stmt->fetchAll();

    if ($result && count($result) > 0) {
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'No Record Found']);
    }

} catch (PDOException $e) {
    echo json_encode(['message' => 'Database error: ' . $e->getMessage()]);
}
?>

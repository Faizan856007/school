<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method not allowed."
    ]);
    exit;
}

$name = $_POST['fullName'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$position = $_POST['position'] ?? '';
$experience = $_POST['experience'] ?? '';
$coverLetter = $_POST['coverLetter'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($position) || empty($experience) || empty($coverLetter)) {
    echo json_encode([
        "success" => false,
        "message" => "Please fill all required fields."
    ]);
    exit;
}

// Resume upload
if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {

    $uploadDir = "../uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = time() . "_" . basename($_FILES["resume"]["name"]);
    $targetFile = $uploadDir . $fileName;

    move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile);
}

echo json_encode([
    "success" => true,
    "message" => "Application submitted successfully!"
]);

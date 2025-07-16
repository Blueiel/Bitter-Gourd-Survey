<?php
// Database connection
$host = 'localhost';
$db = 'bitter_gourd_survey';
$user = 'root';
$pass = ''; // change to your MySQL password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Helper to sanitize and get POST data
function clean_input($data) {
    $data = trim($data);
    $data = strip_tags($data); // Remove HTML tags
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
function getPost($name) {
    return isset($_POST[$name]) ? clean_input($_POST[$name]) : '';
}
function getArrayPost($name) {
    if (!isset($_POST[$name])) return '';
    $arr = is_array($_POST[$name]) ? $_POST[$name] : [$_POST[$name]];
    $arr = array_map('clean_input', $arr);
    return implode(', ', $arr);
}

$age = intval(getPost('age'));
$occupation = getPost('occupation');
$income = getPost('income');
$enjoy = getPost('enjoy');
$frequency = getPost('frequency');
$interested = getPost('interested');
$product_type = getArrayPost('product_type') . ' ' . getPost('product_type_other');
$buy_factors = getArrayPost('buy_factors') . ' ' . getPost('buy_factors_other');
$price_powder = getPost('price_powder');
$price_fresh = getPost('price_fresh');
$price_chips = getPost('price_chips');
$price_pickles = getPost('price_pickles');
$price_tea = getPost('price_tea');
$packaging = getPost('packaging') . ' ' . getPost('packaging_other');
$marketing = getArrayPost('marketing') . ' ' . getPost('marketing_other');
$discover = getArrayPost('discover') . ' ' . getPost('discover_other');
$buy_place = getArrayPost('buy_place') . ' ' . getPost('buy_place_other');
$aware = getPost('aware');
$health = getArrayPost('health') . ' ' . getPost('health_other');

// Insert into database
$sql = "INSERT INTO responses (
    age, occupation, income, enjoy, frequency, interested, product_type,
    buy_factors, price_powder, price_fresh, price_chips, price_pickles, price_tea,
    packaging, marketing, discover, buy_place, aware, health
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("issssssssssssssssss",
    $age, $occupation, $income, $enjoy, $frequency, $interested, $product_type,
    $buy_factors, $price_powder, $price_fresh, $price_chips, $price_pickles, $price_tea,
    $packaging, $marketing, $discover, $buy_place, $aware, $health
);

if ($stmt->execute()) {
    header("Location: index.html?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
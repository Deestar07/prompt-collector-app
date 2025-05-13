<?php
$conn = new mysqli('localhost', 'root', '', 'prompt_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$prompt = $_POST['prompt'];
$category = $_POST['category'];
$note = $_POST['note'];

$stmt = $conn->prepare("INSERT INTO prompts (prompt, category, note) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $prompt, $category, $note);
$stmt->execute();

echo "Prompt saved successfully!<br><a href='index.html'>Back</a> | <a href='view.php'>View Prompts</a>";

$stmt->close();
$conn->close();
?>

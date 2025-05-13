<?php
$conn = new mysqli('localhost', 'root', '', 'prompt_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM prompts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saved Prompts</title>
  <style>
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ddd; }
    h2 { margin-bottom: 10px; }
  </style>
</head>
<body>
  <h2>All Saved Prompts</h2>
  <table>
    <tr>
      <th>Prompt</th>
      <th>Category</th>
      <th>Note</th>
      <th>Date</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo nl2br(htmlspecialchars($row['prompt'])); ?></td>
      <td><?php echo htmlspecialchars($row['category']); ?></td>
      <td><?php echo nl2br(htmlspecialchars($row['note'])); ?></td>
      <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <br>
  <a href="index.html">Back to Form</a>
</body>
</html>

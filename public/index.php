<?php
session_start();

require __DIR__ . '/../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$sql = "SELECT * FROM lists WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':user_id' => $_SESSION['user_id']]);

$lists = $stmt->fetchAll();
?>

<h2>Mijn lijsten</h2>

<a href="create_list.php">+ Nieuwe lijst</a>

<ul>
<?php foreach ($lists as $list): ?>
    <li>
        <?= htmlspecialchars($list['title']) ?>
    </li>
<?php endforeach; ?>
</ul>
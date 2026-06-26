<?php
session_start();
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../classes/List.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $list = new TodoList();

    try {
        $list->setTitle($_POST['title']);

        $sql = "INSERT INTO lists (user_id, title)
                VALUES (:user_id, :title)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':user_id' => $_SESSION['user_id'],
            ':title' => $list->getTitle()
        ]);

        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<h2>Nieuwe lijst</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Naam lijst" required>
    <button type="submit">Toevoegen</button>
</form>
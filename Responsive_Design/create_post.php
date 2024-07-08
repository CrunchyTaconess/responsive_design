<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    try {
        $sql = "INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $title, $body]);

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<?php include 'templates/header.php'; ?>
<div class="container">
    <h2>Create Post</h2>
    <form method="POST" action="create_post.php">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<?php include 'templates/footer.php'; ?>
<?php
include 'includes/db.php';
session_start();

$sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, users.username FROM posts JOIN users ON posts.user_id = users.id";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
?>

<?php include 'templates/header.php'; ?>
<div class="container">
    <h2>Posts</h2>
    <?php foreach ($posts as $post): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
                <p class="card-text"><small class="text-muted">By <?php echo htmlspecialchars($post['username']); ?> on <?php echo $post['created_at']; ?></small></p>
                <a href="view_post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">View Post</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'templates/footer.php'; ?>
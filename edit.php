<?php
include 'db.php';
include 'header.php';
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }

$id = (int)($_GET['id'] ?? 0);
if($id <= 0) { echo '<div class="alert alert-danger">Invalid ID</div>'; include 'footer.php'; exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim($_POST['title']); $content = trim($_POST['content']);
  $stmt = $conn->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
  $stmt->bind_param('ssi', $title, $content, $id);
  $stmt->execute();
  header('Location: index.php'); exit;
}

$stmt = $conn->prepare('SELECT * FROM posts WHERE id=?');
$stmt->bind_param('i', $id); $stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
if (!$row) { echo '<div class="alert alert-danger">Post not found</div>'; include 'footer.php'; exit; }
?>
<h2>Edit Post</h2>
<form method="post">
  <div class="mb-3"><label>Title</label><input name="title" class="form-control" value="<?=htmlspecialchars($row['title'])?>"></div>
  <div class="mb-3"><label>Content</label><textarea name="content" class="form-control" rows="6"><?=htmlspecialchars($row['content'])?></textarea></div>
  <button class="btn btn-primary">Update</button>
</form>
<?php include 'footer.php'; ?>

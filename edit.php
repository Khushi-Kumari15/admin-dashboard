<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id=?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $book_name = trim($_POST['book_name']);
    $author_name = trim($_POST['author_name']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);

    $stmt = $pdo->prepare("UPDATE books SET book_name=?, author_name=?, category=?, price=? WHERE id=?");
    $stmt->execute([$book_name,$author_name,$category,$price,$id]);

    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Edit Book</h1>

<form method="POST">

<input type="text" name="book_name"
value="<?php echo htmlspecialchars($book['book_name']); ?>" required>

<input type="text" name="author_name"
value="<?php echo htmlspecialchars($book['author_name']); ?>" required>

<input type="text" name="category"
value="<?php echo htmlspecialchars($book['category']); ?>" required>

<input type="number" step="0.01" name="price"
value="<?php echo htmlspecialchars($book['price']); ?>" required>

<button type="submit" name="update">Update Book</button>

<a href="index.php" class="back">← Back to Dashboard</a>

</form>

</div>

</body>
</html>
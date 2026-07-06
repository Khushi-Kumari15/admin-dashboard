<?php
include 'db.php';

if(isset($_POST['submit'])){

    $book_name = trim($_POST['book_name']);
    $author_name = trim($_POST['author_name']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);

    $stmt = $pdo->prepare("INSERT INTO books(book_name,author_name,category,price) VALUES(?,?,?,?)");
    $stmt->execute([$book_name,$author_name,$category,$price]);

    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Add New Book</h1>

<form method="POST">

<input type="text" name="book_name" placeholder="Book Name" required>

<input type="text" name="author_name" placeholder="Author Name" required>

<input type="text" name="category" placeholder="Category" required>

<input type="number" step="0.01" name="price" placeholder="Price" required>

<button type="submit" name="submit">Add Book</button>

<a href="index.php" class="back">← Back to Dashboard</a>

</form>

</div>

</body>
</html>
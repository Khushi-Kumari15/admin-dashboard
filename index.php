<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM books");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalBooks = count($books);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Management Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>📚 Book Management Dashboard</h1>

<div class="stats">

<div class="stat-box">
<h2><?php echo $totalBooks; ?></h2>
<p>Total Books</p>
</div>

</div>

<div class="top-bar">
<a href="add.php" class="btn add-btn">+ Add Book</a>
</div>

<table>

<tr>
<th>ID</th>
<th>Book Name</th>
<th>Author</th>
<th>Category</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php foreach($books as $book){ ?>

<tr>

<td><?php echo htmlspecialchars($book['id']); ?></td>

<td><?php echo htmlspecialchars($book['book_name']); ?></td>

<td><?php echo htmlspecialchars($book['author_name']); ?></td>

<td><?php echo htmlspecialchars($book['category']); ?></td>

<td>₹<?php echo htmlspecialchars($book['price']); ?></td>

<td>

<a class="edit" href="edit.php?id=<?php echo $book['id']; ?>">Edit</a>

<a class="delete"
onclick="return confirm('Delete this book?')"
href="delete.php?id=<?php echo $book['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
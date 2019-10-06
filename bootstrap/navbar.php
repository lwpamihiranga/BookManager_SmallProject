<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  		<div class="navbar-nav">
  			<a class="nav-item nav-link active" href="index.php">Home</a>
  			<a class="nav-item nav-link" href="book_list.php">Book List</a>
  			<a class="nav-item nav-link" href="requested_books.php">Reqested Books</a>
  			<a class="nav-item nav-link" href="my_books.php" <?php if($_SESSION['username'] == 'admin') { echo "hidden"; } ?> >My Books</a>
  			<a class="nav-item nav-link" href="add_book.php" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Add Books</a>
<!--   			<a class="btn btn-secondary nav-item nav-link" href="login.php">Login</a>
  			<a class="btn btn-secondary nav-item nav-link" href="register.php">Register</a> -->
  			<a class="btn btn-secondary nav-item nav-link" href="logout.php">Logout</a>
  		</div>
  	</nav>
<!--
Emily Morton 
Carrie Hert
CSC 320
Database Project
-->

<?php
	session_start();
	require_once('disneySQL.php');
	$disneySQL = new disneySQL();
	$title = $_SESSION['title'];
	$date = $_SESSION['date'];
	
	
	
    include_once 'header.php';

?>

<h1>
        Walt Disney Movies
    </h1>
	<div>
		<?php $disneySQL->returnAllMovieInfo($title, $date) ?>
	</div>
</html>
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
	//MButton
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!empty($_POST['MButton']))
		{
			$_SESSION['title'] = $_POST['titleInfo']; //take title info when clicked
			$_SESSION['date'] = $_POST['releaseInfo']; //take release_date info when clicked
			header('Location: admininfo.php');
		}
		else if(!empty($_POST['remove']))
		{
			$disneySQL->deleteMovie($_POST['titleInfo'], $_POST['releaseInfo']);
		}
	}
	
	
    include_once 'header.php';
?>

<body>
    <h1>
        Walt Disney Movies
    </h1>
    <hr>
	<div>
		<?php $disneySQL->returnMovieTitlesAdmin()?> <!-- lists out movie titles and date released -->
	</div>


</body>
</html>
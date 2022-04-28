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
	
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!empty($_POST['DeleteCast']))
		{
			$disneySQL->deleteCast($_POST['castID']);
		}
		else if(!empty($_POST['DeleteChar']))
		{
			$disneySQL->deleteCharacter($_POST['charID']);
		}
        else if(!empty($_POST['Update_Age_DOWN']))
        {
            $disneySQL->decreaseCastAge($_POST['castID']);
        }
        else if(!empty($_POST['Update_Age_UP']))
        {
            $disneySQL->increaseCastAge($_POST['castID']);
        }
        else
        {
            echo 'Submit Error';
        }
	}
	
	
    include_once 'header.php';

?>

<h1>
        Walt Disney Movies
    </h1>
	<div>
		<?php 
		$disneySQL->returnAllMovieInfo($title, $date);
		$disneySQL->returnGenres($title, $date);
		$disneySQL->returnStatistics($title, $date);
		$disneySQL->returnRatings($title, $date);
		$disneySQL->returnCharactersAdmin($title, $date);
		$disneySQL->returnCastAdmin($title, $date);
		?>
	</div>
</html>
<!--    Carrie Hert, Emily Morton
	4/18/2022
	CYB-320-001 SP
	Project
	Contains every function to deal with SQL.
	-->
<?php
class disneySQL{
	#==============================
	#       Create Fucntions
	#==============================
	function newMovie($title, $date, $time, $production, $story, $rating)
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('INSERT INTO movie (Title, Release_Date, Running_Time, Production_Company, Storyline, MPAA) VALUES (:title, :date, :time, :production, :story, :rating)');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->bindParam(':time', $time, PDO::PARAM_STR);
			$sth->bindParam(':production', $production, PDO::PARAM_STR);
			$sth->bindParam(':story', $story, PDO::PARAM_STR);
			$sth->bindParam(':rating', $rating, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "newMovie Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function newStats($title, $date, $boxOffice, $budget)
		{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('INSERT INTO statistics (Title, Release_Date, Box_Office, Budget) VALUES (:title, :date, :box, :budget)');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->bindParam(':box', $boxOffice, PDO::PARAM_STR);
			$sth->bindParam(':budget', $budget, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "newStats Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function newRatings($title, $date, $IMDB, $rotten, $meta)
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('INSERT INTO ratings (Title, Release_Date, IMDB, Rotten_Tomatoes, Metacritic) VALUES (:title, :date, :IMDB, :rotten, :meta)');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->bindParam(':IMDB', $IMDB, PDO::PARAM_INT);
			$sth->bindParam(':rotten', $rotten, PDO::PARAM_STR);
			$sth->bindParam(':meta', $meta, PDO::PARAM_INT);
			$sth->execute();
		} catch(PDOException $e){
			echo "newRatings Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function newGenre($title, $date, $genreType)
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('INSERT INTO genre (Title, Release_Date, Genre_Type) VALUES (:title, :date, :genreType)');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->bindParam(':genreType', $genreType, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "newGenre Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	#******************************
	#==============================
	#       Return Fucntions
	#==============================
	function returnAllMovieInfo($title, $date) //prints all info on a given movie. //NOT DONE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('SELECT * FROM movie WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();

			$rows = $sth;
			foreach($rows as $row) //returns movie features
			{ 
				$t = $row['Running_Time'];
				$pc = $row['Production_Company'];
				$story = $row['Storyline'];
				$mpaa = $row['MPAA'];
				echo '<br />';
				echo '<div>';
				echo '<h2>'.$title.'</h2><br />';
				echo '<h3>'.$date. '</h3><br />';
				echo '<p>Running Time: '.$t. '&emsp;Production Company: ' .$pc. '&emsp;MPAA: ' .$mpaa. '</p><br />';
				echo '<p>Storyline: '.$story.'</p><br />';
				echo '</div>';
			}
			echo "<br />";
			//return rating features
			//return stat features
			//return character features
			//return cast features

		} catch(PDOException $e){
			echo "returnAllMovie Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnMovieTitles()
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{
			$sth = $conn->prepare('SELECT * FROM movie');
			$sth->execute();

			$rows = $sth;
			foreach($rows as $row) //returns movie features
			{ 
				$t = $row['Title'];
				$d = $row['Release_Date'];
				echo '<br />';
				echo '<form method="POST">';
				echo '<input type="hidden" name="titleInfo" value="'.$t.'">';
				echo '<input type="hidden" name="releaseInfo" value="'.$d.'">';
				echo '<input type="submit" name="MButton" value="'.$t. '&emsp;' .$d. '">';
				echo '<input type="submit" name="remove" value="X"><br /><hr>';
				echo '</form>';
			}
			echo "<br />";
			//return rating features
			//return stat features
			//return character features
			//return cast features

		} catch(PDOException $e){
			echo "returnMovieTitles Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	#******************************
	#==============================
	#       Delete Functions
	#==============================
	function deleteMovie($title, $date) #also delete Stats & ratings & Genre as well as connections in the character_in and cast_in databases. 
	{
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$dbName = "disney";
		try{
			$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		//------------------------------------
		try{ //Delete Movie Component
			$sth = $conn->prepare('DELETE FROM movie WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie Movie Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Stats Component
			$sth = $conn->prepare('DELETE FROM statistics WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie Statistics Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Ratings Component
			$sth = $conn->prepare('DELETE FROM ratings WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie Ratings Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Genre Component
			$sth = $conn->prepare('DELETE FROM genre WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie Genre Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Character_In Component
			$sth = $conn->prepare('DELETE FROM character_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie character_in Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Works_in Component
			$sth = $conn->prepare('DELETE FROM works_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_INT);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteMovie works_in Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}

		$conn = null;
	}
	function deleteCharacter() #does NOT delete associated Movie, just removes character and character_in feature.
	{

	}
	function deleteCast() #does NOT delete associated Movie, just removes cast and cast_in feature
	{

	}
	#******************************
	#==============================
	#       Join Functions
	#==============================
	//These functions will create temporary databases for entering characters and cast. When a movie is submitted, it will then join those tables with the official tables
	function addTempCharacter()
	{

	}
	function addTempCast()
	{

	}
	function joinTempCharactersAndCast() //takes temp character and cast databases, fuses each with its respective, and then adds them to character_in and cast_in features
	{

	}
}
?>
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
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
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
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
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
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
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
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
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
				echo '<p>Running Time: '.$t. '<br />&emsp;Production Company: ' .$pc. '<br />&emsp;MPAA: ' .$mpaa. '<br /></p><br />';
				echo '<p>Storyline: '.$story.'</p><br />';
				echo '</div>';
			}
			echo "<br />";

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
				echo '<input type="submit" class="listInfo" name="MButton" value="'.$t. '&emsp;' .$d. '">';
				echo '<br /><hr>';
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
	function returnMovieTitlesAdmin()
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
				echo '<input type="submit" class="listInfo" name="MButton" value="'.$t. '&emsp;' .$d. '">';
				echo '<input type="submit" class="listInfo" name="remove" value="X"><br /><hr>';
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
	function returnStatistics($title, $date)//return rating features
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
			$sth = $conn->prepare('SELECT * FROM statistics WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			foreach($rows as $row) //returns movie features
			{ 
				$box = $row['Box_Office'];
				$bud = $row['Budget'];
				echo '<br />';
				echo '<div><p>';
				if($bud!=NULL)
				{
					echo 'Budget: '.$bud; 
				}
				if($box!=NULL)
				{
					echo '&emsp;Box Office: ' .$box;
				}
				echo '</p></div>';
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "returnStatistics Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnRatings($title, $date)//return stat features
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
			$sth = $conn->prepare('SELECT * FROM ratings WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			foreach($rows as $row) //returns movie features
			{ 
				$imdb = $row['IMDB'];
				$rt = $row['Rotten_Tomatoes'];
				$m = $row['Metacritic'];
				echo '<br />';
				echo '<div>';
				echo '<p>';
				if($imdb!=NULL)
				{
					echo 'IMDB: '.$imdb;
				}
				if($rt!=NULL)
				{
					echo '&emsp;Rotten Tomatoes: ' .$rt;
				}
				if($m!=NULL)
				{
					echo '&emsp;Metacritic: ' .$m;
				}
				echo '</p></div>';
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "return Ratings Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnCharacters($title, $date)//return character features
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
			$sth = $conn->prepare('SELECT * FROM character_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			echo '<h4>Characters</h4><br />';
			foreach($rows as $row) //returns movie features
			{ 
				$charID_in_movie = $row['Character_ID'];
				
				$sth2 = $conn->prepare('SELECT * FROM characters WHERE Character_ID=:charID');
				$sth2->bindParam(':charID', $charID_in_movie, PDO::PARAM_INT);
				$sth2->execute();
				$rows2 = $sth2;
				foreach($rows2 as $row2)
				{
					$charname = $row2['Name'];
					echo '<div>';
					echo '<p>'.$charname;
					echo '</p></div><br />';
				}
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "returnAllCharacters Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnCharactersAdmin($title, $date)//return character features
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
			$sth = $conn->prepare('SELECT * FROM character_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			echo '<h4>Characters</h4><br />';
			foreach($rows as $row) //returns movie features
			{ 
				$charID_in_movie = $row['Character_ID'];
				
				$sth2 = $conn->prepare('SELECT * FROM characters WHERE Character_ID=:charID');
				$sth2->bindParam(':charID', $charID_in_movie, PDO::PARAM_INT);
				$sth2->execute();
				$rows2 = $sth2;
				foreach($rows2 as $row2)
				{
					$charname = $row2['Name'];
					echo '<div>';
					echo '<p>'.$charname;
					echo '<form method="POST">';
					echo '<input type="submit" name="DeleteChar" value= "X">';
					echo '<input type="hidden" name="charID" value="'.$charID_in_movie.'"></form>';
					echo '</p></div><br />';
				}
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "returnAllCharacters Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnCastAdmin($title, $date)//return cast features
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
			$sth = $conn->prepare('SELECT * FROM works_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			echo '<h4>Cast</h4><br />';
			foreach($rows as $row) //returns movie features
			{ 
				$castID_in_movie = $row['Cast_ID'];
				$sth2 = $conn->prepare('SELECT * FROM cast WHERE Cast_ID=:castID');
				$sth2->bindParam(':castID', $castID_in_movie, PDO::PARAM_INT);
				$sth2->execute();
				$rows2 = $sth2;
				foreach($rows2 as $row2)
				{
					
					$Fname = $row2['FirstName'];
					$Lname = $row2['LastName'];
					$age = $row2['Age'];
					$gen = $row2['Sex'];
					echo '<div>';
					echo '<p> Name:'.$Fname.'&nbsp;'.$Lname.'&emsp;Age: '.$age.'&emsp;Sex: '.$gen.'&emsp;';
					echo '<form method="POST">';
					echo '<input type="submit" name="Update_Age_UP" value="Age Increase">';
					echo '<input type="submit" name="Update_Age_DOWN" value="Age Decrease">';
					echo '<input type="submit" name="DeleteCast" value= "X">';
					echo '<input type="hidden" name="castID" value="'.$castID_in_movie.'"></form>';
					echo '</p></div>';
				}
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "returnAllCast Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnCast($title, $date)//return cast features
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
			$sth = $conn->prepare('SELECT * FROM works_in WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			echo '<h4>Cast</h4><br />';
			foreach($rows as $row) //returns movie features
			{ 
				$castID_in_movie = $row['Cast_ID'];
				$sth2 = $conn->prepare('SELECT * FROM cast WHERE Cast_ID=:castID');
				$sth2->bindParam(':castID', $castID_in_movie, PDO::PARAM_INT);
				$sth2->execute();
				$rows2 = $sth2;
				foreach($rows2 as $row2)
				{
					
					$Fname = $row2['FirstName'];
					$Lname = $row2['LastName'];
					$age = $row2['Age'];
					$gen = $row2['Sex'];
					echo '<div>';
					echo '<p> Name:'.$Fname.'&nbsp;'.$Lname.'&emsp;Age: '.$age.'&emsp;Sex: '.$gen.'&emsp;';
					echo '</p></div>';
				}
			}
			echo "<br />";

		} catch(PDOException $e){
			echo "returnAllCast Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function returnGenres($title, $date)
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
			$sth = $conn->prepare('SELECT * FROM genre WHERE Title=:title AND Release_Date=:date');
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':date', $date, PDO::PARAM_STR);
			$sth->execute();
			$rows = $sth;
			echo '<div><p>Genres: ';
			foreach($rows as $row) //returns movie features
			{ 
				$g = $row['Genre_Type'];
				echo $g.'&nbsp;';
	
			}
			echo "</p></div><br />";

		} catch(PDOException $e){
			echo "returnGenre Error: ";
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
		$conn = null;
	}
	function deleteCharacter($charID) #does NOT delete associated Movie, just removes character and character_in feature.
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
		try{ //Delete Character_in component
			$sth = $conn->prepare('DELETE FROM character_in WHERE Character_ID=:charID');
			$sth->bindParam(':charID', $charID, PDO::PARAM_INT);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteCharacter Character_in Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Characters component
			$sth = $conn->prepare('DELETE FROM characters WHERE Character_ID=:charID');
			$sth->bindParam(':charID', $charID, PDO::PARAM_INT);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteCharacter Character Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
	}
	function deleteCast($castID) #does NOT delete associated Movie, just removes cast and cast_in feature
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
		try{ //Delete works_in component
			$sth = $conn->prepare('DELETE FROM works_in WHERE Cast_ID=:castID');
			$sth->bindParam(':castID', $castID, PDO::PARAM_INT);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteCast Works_in Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		try{ //Delete Cast component
			$sth = $conn->prepare('DELETE FROM cast WHERE Cast_ID=:castID');
			$sth->bindParam(':castID', $castID, PDO::PARAM_INT);
			$sth->execute();
		} catch(PDOException $e){
			echo "deleteCast Cast Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
	}
	#******************************
	#==============================
	#       Join Functions
	#==============================
	//These functions will create temporary databases for entering characters and cast. When a movie is submitted, it will then join those tables with the official tables
	function addTempCharacter($name)
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
		//'INSERT INTO characters ("Name") VALUES (:name)'
		try{
			try{
				$sh = $conn->prepare("SELECT 1 FROM tempchars LIMIT 1");
				$sh->execute();
			}catch(Exception $e){
				$sth = $conn->prepare('CREATE TABLE tempchars(name VARCHAR(256) NOT NULL)');
				$sth->execute();
			}
			$sth = $conn->prepare('INSERT INTO tempchars(Name) VALUES (:name)');
			$sth->bindParam(':name', $name, PDO::PARAM_STR);
			$sth->execute();

		} catch(PDOException $e){
			echo "addTempCharacter Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function addTempCast($Fname, $Lname, $Age, $sex)
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
			try{
				$sh = $conn->prepare("SELECT 1 FROM tempcast LIMIT 1");
				$sh->execute();
			}catch(Exception $e){
				$sth = $conn->prepare('CREATE TABLE tempcast(FirstName VARCHAR(64) NOT NULL, LastName VARCHAR(64) NOT NULL, Age INT(32) NOT NULL, Sex VARCHAR(32) NOT NULL)');
				$sth->execute();
			}
			$sth = $conn->prepare('INSERT INTO tempcast(FirstName, LastName, Age, Sex) VALUES (:fname, :lname, :age, :sex)');
			$sth->bindParam(':fname', $Fname, PDO::PARAM_STR);
			$sth->bindParam(':lname', $Lname, PDO::PARAM_STR);
			$sth->bindParam(':age', $Age, PDO::PARAM_INT);
			$sth->bindParam(':sex', $sex, PDO::PARAM_STR);
			$sth->execute();

		} catch(PDOException $e){
			echo "addTempCast Error: ";
			echo "<br />" . $e->getMessage();
			echo "<br />";
		}
		//------------------------------------
		$conn = null;
	}
	function joinTempCharactersAndCast($title, $date) //takes temp character and cast databases, fuses each with its respective, and then adds them to character_in and cast_in features
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
		try
		{
			try{
				$sh = $conn->prepare("SELECT * FROM tempchars");
				$sh->execute();

				$rows = $sh;
				foreach ($rows as $row)
				{
					//join for temp character
					$name = $row['name'];
					$sth = $conn->prepare("INSERT INTO characters(Name) VALUE (:name)");
					$sth->bindParam(':name', $name, PDO::PARAM_STR);
					$sth->execute();
					//Find the latest added character
					$charID = $conn->lastInsertId();
					//insert that character into char_in
					$sth = $conn->prepare("INSERT INTO `character_in`(`Title`, `Release_Date`, `Character_ID`) VALUE (:title, :date, :id) ");
					$sth->bindParam(':title', $title, PDO::PARAM_STR);
					$sth->bindParam(':date', $date, PDO::PARAM_STR);
					$sth->bindParam(':id', $charID, PDO::PARAM_INT);
					$sth->execute();
				}
				//deleting tempchars
				$sth = $conn->prepare("DROP TABLE tempchars");
				$sth->execute();
			}catch(PDOException $e){
				echo "No chars added.<br />";
			}
			//============================================================
			//============================================================
			//join for temp cast
			$sh = $conn->prepare("SELECT * FROM tempcast");
			$sh->execute();

			$rows = $sh;
			foreach ($rows as $row)
			{
				//join for temp character
				$Fname = $row['FirstName'];
				$Lname = $row['LastName'];
				$age = $row['Age'];
				$sex = $row['Sex'];
				$sth = $conn->prepare("INSERT INTO `cast`(`FirstName`, `LastName`, `Age`, `Sex`) VALUES (:Fname, :Lname, :age, :sex)");
				$sth->bindParam(':Fname', $Fname, PDO::PARAM_STR);
				$sth->bindParam(':Lname', $Lname, PDO::PARAM_STR);
				$sth->bindParam(':age', $age, PDO::PARAM_INT);
				$sth->bindParam(':sex', $sex, PDO::PARAM_STR);
				$sth->execute();
				//Find the latest added character
				$charID = $conn->lastInsertId();
				//insert cast into works_in
				$sth = $conn->prepare("INSERT INTO `works_in`(`Title`, `Release_Date`, `Cast_ID`) VALUE (:title, :date, :id) ");
				$sth->bindParam(':title', $title, PDO::PARAM_STR);
				$sth->bindParam(':date', $date, PDO::PARAM_STR);
				$sth->bindParam(':id', $charID, PDO::PARAM_INT);
				$sth->execute();
			}
			//deleting tempcast
			$sth = $conn->prepare("DROP TABLE tempcast");
			$sth->execute();

		}catch(PDOException $e){
			echo "joinTempCharactersAndCast Failure: " .$e->getMessage(). "<br />";
		}
		//------------------------------------
	}


	//help
	function increaseCastAge($cast_ID)
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
		try
		{
			
			$sh = $conn->prepare("SELECT Age FROM cast WHERE Cast_ID=:castID");
			
			$sh->bindParam(':castID', $cast_ID, PDO::PARAM_INT);
			$sh->execute();

			$newAge =0;
			$result = $sh->fetchColumn();
			$newAge = $result;
			$newAge = $newAge + 1;
			$sth = $conn->prepare("UPDATE cast SET Age=:age where Cast_ID=:castID");
			$sth->bindParam(':age',$newAge, PDO::PARAM_INT);
			$sth->bindParam(':castID', $cast_ID, PDO::PARAM_INT);
			$sth->execute();
		}catch(PDOException $e){
			echo "increaseCastAge error: " . $e->getMessage();
		}
	}
	function decreaseCastAge($cast_ID)
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
		try
		{
			$sh = $conn->prepare("SELECT Age FROM cast WHERE Cast_ID=:castID");
			$sh->bindParam(':castID', $cast_ID, PDO::PARAM_STR);
			$sh->execute();

			$newAge =0;
			$result = $sh->fetchColumn();
			$newAge = $result;
			$newAge = $newAge - 1;
			$sh = $conn->prepare("UPDATE cast SET Age=:age where Cast_ID=:castID");
			$sh->bindParam(':age',$newAge, PDO::PARAM_INT);
			$sh->bindParam(':castID', $cast_ID, PDO::PARAM_STR);
			$sh->execute();
		}catch(PDOException $e){
			echo "decreaseCastAge error: " . $e->getMessage();
		}
	}
}
?>
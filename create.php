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
    $titleError="";
    $ReleaseError="";
    if($_SERVER["REQUEST_METHOD"] == "POST") //FinalSubmit, CastSubmit, CharacterSubmit
	{
        if(!empty($_POST['CastSubmit']))
		{
            $disneySQL->addTempCast($_POST["Fname"], $_POST["Lname"], $_POST["age"], $_POST["sex"]);
        }
        else if(!empty($_POST['CharacterSubmit']))
		{
            $disneySQL->addTempCharacter($_POST["Charname"]);
        }
        else if(!empty($_POST['FinalSubmit']))
		{
            if(empty($_POST["title"]))
			{
				$titleError = "Title required!";
			}
            else if(empty($_POST["date"]))
			{
				$ReleaseError = "Release Date required!";
			}
            else
            {
                $rating = $_POST["rate"]; //set rating from radio Buttons
                
                $disneySQL->newMovie($_POST["title"], $_POST["date"], $_POST["time"], $_POST["company"], $_POST["sline"], $rating);
                $disneySQL->joinTempCharactersAndCast($_POST["title"], $_POST["date"]);
                if(!empty($_POST["budget"]))
                {
                    $disneySQL->newStats($_POST["title"], $_POST["date"], $_POST["bo"], $_POST["budget"]);
                }
                if(!empty($_POST["IMDB"]))
                {
                    $disneySQL->newRatings($_POST["title"], $_POST["date"], $_POST["IMDB"], $_POST["rotten"], $_POST["meta"]);
                }
                //=========================
                //Set each genre seperately
                //=========================
                if(isset($_POST["Action"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Action");
                }
                if(isset($_POST["Adventure"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Adventure");
                }
                if(isset($_POST["Comedy"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Comedy");
                }
                if(isset($_POST["Musical"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Musical");
                }
                if(isset($_POST["Romance"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Romance");
                }
                if(isset($_POST["ScienceFiction"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Science Fiction");
                }
                if(isset($_POST["Fantasy"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Fantasy");
                }
                if(isset($_POST["LiveAction"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Live Action");
                }
                if(isset($_POST["Documentary"]))
                {
                    $disneySQL->newGenre($_POST["title"], $_POST["date"], "Documentary");
                }
            }
        }
        else
		{
			echo "Submit Error";
		}
    }


    include_once 'header.php';
?>
<body>

    <h1> Walt Disney Movies</h1>
    <hr>
    <h2> Want to add a new movie to our list? </h2>

    <div class = "createform">
        <!-- Characters Table -->
        <form action="Create.php" method="POST">
            <ul class = "second">
            <h3 class = "headform"> Characters in Movie </h3>
            <li>
                <label for = "Char_Name">Character's Name:</label>
                <input type="text" id = "Char_Name" name="Charname" placeholder="Enter a Character's Name"/><br><br>
            </li>
            <br>
            <input class = "submit" type="submit" name="CharacterSubmit" value="Add character to list" onclick = "createList()" />
            </ul>
        </form>

            <!-- Cast Table -->
        <form action="Create.php" method="POST">
            <ul class = "third">
            <h3 class = headform> Cast Members in Movie </h3>
            <li>
                <label for = "Cast_FN">Cast Members First Name:</label>
                <input type="text" id = "Cast_FN" name="Fname" placeholder="Enter Cast's First Name"/><br><br>
            </li>
            <li>
                <label for = "Cast_LN">Cast Members Last Name:</label>
                <input type="text" id = "Cast_LN" name="Lname" placeholder="Enter Cast's Last Name"/><br><br>
            </li>
            <li>    
                <label for = "Cast_Age">Cast Members Age:</label>
                <input type="text" id = "Cast_Age" name="age" placeholder="Enter Cast's Age"/><br><br>
            </li>
            <li> 
                <label for = "Cast_Sex">Cast Members Sex:</label>
                <input type="text" id = "Cast_Sex" name="sex" placeholder="Enter Cast's Sex"/><br><br>
            </li>
            <br>
            <input class = "submit" name="CastSubmit" type="submit" value="Add cast to list" />
            </ul>
        </form>
        <form action="Create.php" method="POST">
            <br>

            <ul class = "first">
            <h3 class = "headform"> Please Fill Out All Information Below </h3>
                <li>
                    <label for = "title">Title:</label>
                    <input type="text" id = "title" name="title" placeholder="Enter Movie Title"/><?php echo $titleError; ?><br><br>
                </li>
                <li>
                    <label for = "RDate">Release Date:</label>
                    <input type="date" id = "RDate" name="date" /><?php echo $ReleaseError; ?><br><br>
                </li>
                <li>
                    <label for = "RTime">Running Time:</label>
                    <input type="text" name="time" id = "RTime"/><br><br>
                </li>
                <li>
                    <label for = "PCompany">Production Company:</label>
                    <input type="text" name="company" id = "PCompany" placeholder="Enter the Production Company"/><br><br>
                </li>
                <li>
                    <label for = "SLine">Storyline:</label>
                    <textarea rows = "2" name="sline" id = "SLine" placeholder="Enter the Storyline"></textarea><br><br>
                </li>
                <li>
                    <p> MPAA: </p>
                        <input type = "radio" name="rate" value="G" id = "g">
                        <label for = "MPAA-g"> G </label>

                        <input type = "radio" name="rate" value="PG" id = "pg">
                        <label for = "MPAA-pg"> PG </label>

                        <input type = "radio" name="rate" value="PG-13" id = "pg-13">
                        <label for = "MPAA-pg-13"> PG-13 </label>

                        <input type = "radio" name="rate" value="R" id = "r">
                        <label for = "MPAA-r"> R </label>

                        <input type = "radio" name="rate" value="NC-17" id = "nc-17">
                        <label for = "MPAA-nc-17"> NC-17 </label>
                    <br><br>
                </li>
                <li>
                    <!-- Genre Table -->
                    <p> Genre: </p>
                        <input type = "checkbox" name="Action" id = "Action">
                        <label for = "Genre-Action">Action&emsp;</label>
                        <input type = "checkbox" name="Adventure" id = "Adventure">
                        <label for = "Genre-Adventure">Adventure&emsp;</label>
                        <input type = "checkbox" name="Comedy" id = "Comedy">
                        <label for = "Genre-Comedy">Comedy&emsp;</label>
                        <input type = "checkbox" name="Musical" id = "Musical">
                        <label for = "Genre-Musical">Musical&emsp;</label>
                        <input type = "checkbox" name="Romance" id = "Romance">
                        <label for = "Genre-Romance">Romance&emsp;</label>
                        <input type = "checkbox" name="ScienceFiction" id = "ScienceFiction">
                        <label for = "Genre-ScienceFiction">Science Fiction&emsp;</label>
                        <input type = "checkbox" name="Fantasy" id = "Fantasy">
                        <label for = "Genre-Fantasy">Fantasy&emsp;</label>
                        <input type = "checkbox" name="LiveAction" id = "LiveAction">
                        <label for = "Genre-LiveAction">Live Action&emsp;</label>
                        <input type = "checkbox" name="Documentary" id = "Documentary">
                        <label for = "Genre-Documentary">Documentary&emsp;</label>

                    <br><br>
                </li>
                <li>
                    <!-- Ratings Table -->
                    <label for = "IMDB">IMDB Rating:</label>
                    <input type="text" id = "IMDB" name="IMDB"placeholder="Enter the IMDB"/><br><br>
                </li>
                <li>
                    <label for = "RTom">Rotten Tomatoes Rating:</label>
                    <input type="text" id = "RTom" name="rotten" placeholder="Enter the Rotten Tomatoes Rating"/><br><br>
                </li>
                <li>
                    <label for = "Met">Metacritic Rating:</label>
                    <input type="text" id = "Met" name="meta" placeholder="Enter the MetaCritic Rating"/><br><br>
                </li>
                <li>
                    <!-- Statistics Table -->
                    <label for = "BoxOff">Box Office:</label>
                    <input type="text" id = "BoxOff" name="bo" placeholder="Enter the Box Office "/><br><br>
                </li>
                <li>
                    <label for = "Budg">Budget for Movie:</label>
                    <input type="text" id = "Budg" name="budget" placeholder="Enter the Budget"/><br><br>
                </li>
            </ul>
            <!-- <label for = "title">Title:</label>
            <input type="text" id = "title" name='title'/><br><br> -->
            <br><br>
            <input class = "finalsubmit" name="FinalSubmit" type="submit" value="Submit your Movie" />

        </form>
    </div>
    
</body>

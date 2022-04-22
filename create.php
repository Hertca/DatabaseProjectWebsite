<!--
Emily Morton 
Carrie Hert
CSC 320
Database Project
-->

<?php

    include_once 'template/header.php';

?>
<body>

    <h1> Walt Disney Movies</h1>
    <hr>
    <h2> Want to add a new movie to our list? </h2>

    <div class = "createform">
        <form action="Create.php" method="POST">
            <br>

            <ul class = "first">
            <h3 class = "headform"> Please Fill Out All Information Below </h3>
                <li>
                    <label for = "title">Title:</label>
                    <input type="text" id = "title" placeholder="Enter Movie Title"/><br><br>
                </li>
                <li>
                    <label for = "RDate">Release Date:</label>
                    <input type="date" id = "RDate" /><br><br>
                </li>
                <li>
                    <label for = "RTime">Running Time:</label>
                    <input type="text" id = "RTime" placeholder="Enter the Running Time"/><br><br>
                </li>
                <li>
                    <label for = "PCompany">Production Company:</label>
                    <input type="text" id = "PCompany" placeholder="Enter the Production Company"/><br><br>
                </li>
                <li>
                    <label for = "SLine">Storyline:</label>
                    <textarea rows = "2" id = "SLine" placeholder="Enter the Storyline"></textarea><br><br>
                </li>
                <li>
                    <p> MPAA: </p>
                        <input type = "radio" id = "g">
                        <label for = "MPAA-g"> G </label>

                        <input type = "radio" id = "pg">
                        <label for = "MPAA-pg"> PG </label>

                        <input type = "radio" id = "pg-13">
                        <label for = "MPAA-pg-13"> PG-13 </label>

                        <input type = "radio" id = "r">
                        <label for = "MPAA-r"> R </label>

                        <input type = "radio" id = "nc-17">
                        <label for = "MPAA-nc-17"> NC-17 </label>
                    <br><br>
                </li>
                <li>
                    <!-- Genre Table -->
                    <label for = "GType">Genre Type:</label>
                    <input type="text" id = "GType" placeholder="Enter the Genre Type"/><br><br>
                </li>
                <li>
                    <!-- Ratings Table -->
                    <label for = "IMDB">IMDB Rating:</label>
                    <input type="text" id = "IMDB" placeholder="Enter the IMDB"/><br><br>
                </li>
                <li>
                    <label for = "RTom">Rotten Tomatoes Rating:</label>
                    <input type="text" id = "RTom" placeholder="Enter the Rotten Tomatoes Rating"/><br><br>
                </li>
                <li>
                    <label for = "Met">Metacritic Rating:</label>
                    <input type="text" id = "Met" placeholder="Enter the MetaCritic Rating"/><br><br>
                </li>
                <li>
                    <!-- Statistics Table -->
                    <label for = "BoxOff">Box Office:</label>
                    <input type="text" id = "BoxOff" placeholder="Enter the Box Office "/><br><br>
                </li>
                <li>
                    <label for = "Budg">Budget for Movie:</label>
                    <input type="text" id = "Budg" placeholder="Enter the Budget"/><br><br>
                </li>
            </ul>
            
            <!-- Characters Table -->
            <form action="Create.php" method="POST">
                <ul class = "second">
                <h3 class = "headform"> Characters in Movie </h3>
                    <li>
                        <label for = "Char_Name">Character's Name:</label>
                        <input type="text" id = "Char_Name" placeholder="Enter a Character's Name"/><br><br>
                    </li>
                    <br>
                        <input class = "submit" type="submit" value="Add character to list" onclick = "createList()" />
                </ul>
            </form>

            <!-- Cast Table -->
            <form action="Create.php" method="POST">
                <ul class = "third">
                <h3 class = headform> Cast Members in Movie </h3>
                    <li>
                        <label for = "Cast_FN">Cast Members First Name:</label>
                        <input type="text" id = "Cast_FN" placeholder="Enter Cast's First Name"/><br><br>
                    </li>
                    <li>
                        <label for = "Cast_LN">Cast Members Last Name:</label>
                        <input type="text" id = "Cast_LN" placeholder="Enter Cast's Last Name"/><br><br>
                    </li>
                    <li>    
                        <label for = "Cast_Age">Cast Members Age:</label>
                        <input type="text" id = "Cast_Age" placeholder="Enter Cast's Age"/><br><br>
                    </li>
                    <li> 
                        <label for = "Cast_Sex">Cast Members Sex:</label>
                        <input type="text" id = "Cast_Sex" placeholder="Enter Cast's Sex"/><br><br>
                    </li>
                    <br>
                        <input class = "submit" type="submit" value="Add cast to list" onclick = "createList()" />
                </ul>
            </form>
        
            <!-- <label for = "title">Title:</label>
            <input type="text" id = "title" name='title'/><br><br> -->
            <br><br>
            <input class = "finalsubmit" type="submit" value="Sumbit your Movie" onclick = "createList()" />

        </form>
    </div>
    
</body>

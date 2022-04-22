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
    <h2> Want to add a new movie to our list? </h2>

    <form action="Create.php" method="POST">
        <br>

        <!-- Movie Table -->
        <label for = "title">Title:</label>
        <input type="text" id = "title" name='title'/><br><br>
        <label for = "RDate">Release Date:</label>
        <input type="text" id = "RDate" name='RDate'/><br><br>
        <label for = "RTime">Running Time:</label>
        <input type="text" id = "RTime" name='RTime'/><br><br>
        <label for = "PCompany">Production Company:</label>
        <input type="text" id = "PCompany" name='PCompany'/><br><br>
        <label for = "SLine">Storyline:</label>
        <input type="text" id = "SLine" name='SLine'/><br><br>
        <label for = "MPAA">MPAA:</label>
        <input type="text" id = "MPAA" name='MPAA'/><br><br>
        <!-- Genre Table -->
        <label for = "GType">Genre Type:</label>
        <input type="text" id = "GType" name='GType'/><br><br>
        <!-- Ratings Table -->
        <label for = "IMDB">IMDB Rating:</label>
        <input type="text" id = "IMDB" name='IMDB'/><br><br>
        <label for = "RTom">Rotten Tomatoes Rating:</label>
        <input type="text" id = "RTom" name='RTom'/><br><br>
        <label for = "Met">Metacritic Rating:</label>
        <input type="text" id = "Met" name='Met'/><br><br>
        <!-- Statistics Table -->
        <label for = "BoxOff">Box Office:</label>
        <input type="text" id = "BoxOff" name='BoxOff'/><br><br>
        <label for = "Budg">Budget for Movie:</label>
        <input type="text" id = "Budg" name='Budg'/><br><br>
        
        
        <!-- Characters Table -->
        <form action="Create.php" method="POST">

            <label for = "Char_Name">Character's Name:</label>
            <input type="text" id = "Char_Name" name='Char_Name'/><br><br>

            <input class = "submit" type="submit" value="Sumbit your Movie" onclick = "createList()" />

        </form>

        <!-- Cast Table -->
        <form action="Create.php" method="POST">

            <label for = "Cast_FN">Cast Members First Name:</label>
            <input type="text" id = "Cast_FN" name='Cast_FN'/><br><br>
            <label for = "Cast_LN">Cast Members Last Name:</label>
            <input type="text" id = "Cast_LN" name='Cast_LN'/><br><br>
            <label for = "Cast_Age">Cast Members Age:</label>
            <input type="text" id = "Cast_Age" name='Cast_Age'/><br><br>
            <label for = "Cast_Sex">Cast Members Sex:</label>
            <input type="text" id = "Cast_Sex" name='Cast_Sex'/><br><br><br>
            
            <input class = "submit" type="submit" value="Sumbit your Movie" onclick = "createList()" />

        </form>
        
        <!-- <label for = "title">Title:</label>
        <input type="text" id = "title" name='title'/><br><br> -->

        <input class = "submit" type="submit" value="Sumbit your Movie" onclick = "createList()" />

    </form>
</body>
<?php session_start(); ?>
<html>
<body>
<?php

$db = new PDO("sqlite:" . "db/" . $_SESSION["uname"] . ".db");

# check if newly edited
if (isset($_POST["title"])){
    # if so, save it
    $qry = $db->prepare(
        'INSERT INTO recipes (title, ingredients, instructions) VALUES (?, ?, ?)');
    $qry->execute(array($_POST["title"], $_POST["ingredients"], $_POST["instructions"]));

}
# if not, load the recipe
Title: echo title;
echo "<br>";
echo ingredients;
echo "<br>";
echo instructions;
?>
<br>
Edit link
<br>
<a href="main.php">Main page</a>
</body>
</html>

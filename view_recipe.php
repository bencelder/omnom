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
    echo $_POST["title"];
    echo "<br>";
    echo $_POST["ingredients"];
    echo "<br>";
    echo $_POST["instructions"];
    echo "<br>";

}
$result = $db->query("SELECT * FROM recipes");
foreach($result as $row){
    if ($row["title"] == $_GET["rec"]){
        echo $row["title"];
        echo "<br>";
        echo $row["ingredients"];
        echo "<br>";
        echo $row["instructions"];
        echo "<br>";
    }
}

?>
<br>
<?php
echo '<a href="edit_recipe.php?rec=';
if (isset($_GET["rec"])){
    echo $_GET["rec"];
}
else{
    echo $_POST["title"];
}
echo '">';
echo "Edit</a>"
?>

<br>
<a href="main.php">Main page</a>
</body>
</html>

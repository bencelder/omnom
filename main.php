<?php session_start() ?>
<html>
<body>

<?php
# to run, type
# php -S localhost:8000
# in the root directory
#

# runs the first time
if (isset($_POST["uname"])){
    $uname = $_POST["uname"];


    # store it in a session
    $_SESSION["uname"] = $uname;

    # save username to file
    $unamefile = fopen("usernames.txt", "w");
    fwrite($unamefile, $uname . "\n");
    fclose($unamefile);

    $db = new PDO("sqlite:" . "db/" . $_POST["uname"] . ".db");
    $sql = <<<EOD
        CREATE TABLE IF NOT EXISTS recipes (
        title           STRING PRIMARY KEY,
        ingredients     STRING,
        instructions    STRING)
EOD;

    $db->exec($sql);
}
echo "Welcome " . $_SESSION["uname"];
?>


<br>

<form action="edit_recipe.php" method="post">
    <input type="submit" value="Add recipe">
</form>

Recipes:
<br>

<?php
$db = new PDO("sqlite:" . "db/" . $_SESSION["uname"] . ".db");
$result = $db->query("SELECT * FROM recipes");
foreach($result as $row){
    echo "<a href=view_recipe.php?rec=" . $row["title"] . ">";
    echo $row["title"] . "</a>";
    echo "<br>";
}
?>

</body>
</html>

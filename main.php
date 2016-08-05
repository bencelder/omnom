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

    # make a new folder if it's a new name
    #if (file_exists($uname) == FALSE){
        #mkdir( $uname );
    #}

    # make a database
    #class RecDB extends SQLite3{
        #function __construct(){
            #$this->open("test.db");
        #}
    #}
    #$db = new RecDB($uname);
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

</body>
</html>

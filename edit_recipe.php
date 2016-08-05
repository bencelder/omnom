<?php session_start(); ?>
<html>
<body>

<form action="view_recipe.php" method="post">
    Title: <input type="text" name="title"><br>
    Ingredients: <input type="text" name="ingredients"><br>
    Instructions: <input type="text" name="instructions"><br>
    <input type="submit" value="Save">
</form>

</body>
</html>

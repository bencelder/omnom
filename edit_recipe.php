<?php session_start(); ?>
<html>
<body>

<form action="recipe_view.php" method="post">
    Title: <input type="text" name="title"><br>
    Ingredients: <input type="text" name="ingredients"><br>
    Instructions: <input type="text" name="instructions"><br>
    <input type="submit" value="Save">
</form>

</body>
</html>

<?php 
// require_once "../../BaseController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <div>
        <label for="input">Input:</label>
        <input type="input" id="input" name="input"/>
    </div>
    <button type="submit">Get Data</button>
</form>
<?php 
// echo $url = $_POST["input"]; 
?>
<h2>Title:</h2>
<h3><?php 
echo $title;
?></h3>
<h2>Content:</h2>
<article><?php 
echo $date;
 ?></article>
</body>
</html>



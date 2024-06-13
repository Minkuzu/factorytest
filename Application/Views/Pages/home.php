<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?controller=DantriParser&action=home">Dantri</a>
    <a href="?controller=VnexpressParser&action=home">Vnexpress</a>

<form action="" method="post">
    <div>
        <label for="input">Input:</label>
        <input type="input" id="input" name="input"/>
    </div>
    <button type="submit">Get Data</button>
</form>  
<?php 
echo getcwd()
?>
</body>
</html>
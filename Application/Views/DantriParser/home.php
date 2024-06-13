<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="/factory">home page</a>
        <a href="?controller=VnexpressParser&action=home">Vnexpress</a>
    </header>
    <h1>This is Dantri</h1>
<h2>Title: <?php 
    echo $title;
?></h2>
<h3>
</h3>
<h2>Date: </h2>
<p><?php 
echo $date;
?></p>
<h2>Content:</h2>
<article>
<?php
echo $article;
?>
 </article>
</body>
</html>



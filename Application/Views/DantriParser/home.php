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
        <a href="/factorytest">home page</a>
        <a href="?controller=VnexpressParser&action=home">Vnexpress</a>
    </header>
    <h1>You are crawling data from Dantri news</h1>
<h2>Title: <?php echo $title; ?></h2>
<h2>Content:</h2>
<article><?php echo $article; ?></article>
<h2>Date: </h2><?php echo $date; ?>
</body>
</html>



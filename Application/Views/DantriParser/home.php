<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php @$view ?>
<form action="/factorytest/public" method="post">
    <div>
        <label for="input">Input:</label>
        <input type="input" id="input" name="input"/>
    </div>
    <button type="submit">Get Data</button>
</form>
<h2>Title:</h2>
<title><?php $title ?></title>
<h2>Content:</h2>
<article><?php $content ?></article>
</body>
</html>



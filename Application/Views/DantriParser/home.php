
<?php
require_once '../../Controllers/DantriParserController.php';
?>
    <form action="../../Views/DantriParser/home.php" method="post">
        <div>
            <label for="input">Input:</label>
            <input type="input" id="input" name="input"/>
        </div>
        <button type="submit">Get Data</button>
    </form>
    <?php $url = $_POST['input']; ?>
    <h2>Title:</h2>
    <title><?php $title ?></title>
    <h2>Date: <?php echo $url ?></h2>
    <h2>Content:</h2>
    <article><?php $content ?></article>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/" method="post">
        String 1: <input type="text" name="a"><br>
        String 2: <input type="text" name="b"><br>
        <input type="submit">
    </form>
    <div>
        <?php
            require 'task.php';
            if(isset($_POST['a']) && isset($_POST['b'])){
                echo '<br>Levenshtein distance: ' . Levenshtein::levenshtein_dis($_POST['a'],$_POST['b']);
            }
        ?>
    </div>
</body>
</html>

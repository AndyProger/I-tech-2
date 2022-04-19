<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

try {

    require_once('connecting.php');
    $dbh = connect();
    $item = $_POST['selectedsoft'];
    
    $collection = $dbh->dbforlab->computers;

    $result = $collection->find(['software' => $item]);
    
    echo '<h4 id = "header">', 'List of computers with ' , $item, '</h4>';
    echo '<ol>';
        foreach ($result as $entry)
            echo '<li class = "listItem">', $entry['inventory_number'], '</li>';
    echo '</ol>';
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>

    <script>
        let items = document.getElementsByClassName('listItem');
        let header = document.getElementById('header').innerHTML;
        let array = new Array();

        for (var i = 0; i < items.length; ++i)
            array.push(items[i].innerHTML);

        localStorage.setItem("select2", JSON.stringify(array));
        localStorage.setItem("select2_header", header);
    </script>

</body>
</html>



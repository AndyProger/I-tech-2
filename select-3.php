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
    
        $collection = $dbh->dbforlab->computers;
        $result = $collection->find(['guarantee_until' => ['$lte' => new MongoDB\BSON\UTCDateTime(time() * 1000)]]);
    
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
        let array = new Array();

        for (var i = 0; i < items.length; ++i)
            array.push(items[i].innerHTML);

        localStorage.setItem("select3", JSON.stringify(array));
    </script>

</body>
</html>

        
    

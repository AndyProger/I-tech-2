<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- список компьютеров с заданным типом центрального процессора -->

    <form action="select-1.php" method="POST">
        <select name="selectedproc">
            <?php
            require_once('connecting.php');
            $dbh = connect();
            
            $collection = $dbh->dbforlab->computers;
            $result = $collection->distinct('processor');
                    
            foreach($result as $item)
                echo "<option value='$item'>" . $item . '</option>';
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>

    <br><br>

    <!-- список компьютеров с установленным ПО (название ПО выбирается из перечня) -->

    <form action="select-2.php" method="POST">
        <select name="selectedsoft">
            <?php
            require_once('connecting.php');
            $dbh = connect();
            
            $collection = $dbh->dbforlab->computers;
            $result = $collection->find([], ["software" => 1]);
            $array = array();
            
            foreach($result as $item)
                foreach($item['software'] as $tmp)
                    $array[] = $tmp;

            $uniqueArray = array_unique($array);

            foreach($uniqueArray as $item)
                echo "<option value='$item'>" . $item . '</option>';
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>

    <br><br>

    <!-- список компьютеров с истекшим гарантийным сроком -->

    <form action="select-3.php" method="POST">
        <input name="expiredGuaranteeBtn" type="submit" value="Get a list of computers with expired guarantee"/>
    </form>
    <br><br>

    <!-- Local Storage -->
    <button onClick="localStorage.clear(); window.location.reload();">Clear history</button>

    <div id="out_proc"><br></div>
    <div id="out_soft"><br></div>
    <div id="out_guarantee"><br></div>

    <script src="script.js"></script>
</body>
</html>
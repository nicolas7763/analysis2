<?php
$pdo = new PDO("mysql:host=localhost;dbname=zhukov", "zhukov", "neto0626");
$pdo->query("SET NAMES UTF8");

if (isset($_POST['bd_name'])){
    $d = $_POST['bd_name']; 
    //var_dump($d);
    $stmt = $pdo->query("SHOW COLUMNS FROM  $d");
    //var_dump($stmt);
    $result = $stmt->fetchAll();
    //var_dump($result);
    echo '<table cellpadding="5" cellspacing="0" border="1">';
echo "<tr>";
foreach ($result as $row) {
    echo "<td>".$row['Field']."</td>";
    echo "<td>".$row['Type']."</td>";

     echo "</tr>";  
}
echo "</table>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SQL</title>

</head>
<body>
<form method='POST'>  
    <select name='bd_name'>
        <option value="0">посмотрим таблицы?</option>
        <?php $stmt = $pdo->query('SHOW TABLES');?>
        
        <?php $result = $stmt->fetchAll(); ?>
        <?php var_dump($result); ?>
        <?php foreach($result as $row) { ?>
        <option value="<?php echo $row['Tables_in_zhukov']; ?>"><?php echo $row['Tables_in_zhukov']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="send" value="Показать таблицу">
</form>

</body>
</html>




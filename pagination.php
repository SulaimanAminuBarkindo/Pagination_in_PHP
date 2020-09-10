<?php
// require your connection file to DB or just write the connection code here
require "connection.php";

$pagenum = $_GET['page'];
if($pagenum== "" || $pagenum == 1){
	$pagenum =0;
}else
$pagenum = ($pagenum*5)-5;

$sql = "SELECT * FROM photos LIMIT $pagenum,5";
$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($query)){
echo $row['id'] ." ". $row['photo_name']. " " .$row['title'].'<br/>' ;
}

$sql = "SELECT * FROM photos";
$query = mysqli_query($conn,$sql);

$numr = mysqli_num_rows($query);
$pages = $numr/5;
$pages = ceil($pages);
echo '<br/>.<br/>';
for($i=1;$i<=$pages;$i++){

?><a href='pagination.php?page=<?php echo $i?>'><?php echo $i." " ?></a><?php

}




?>
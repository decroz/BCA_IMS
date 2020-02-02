<?php 
 $semester = $_POST['semester'];
require_once "../connection.php";
 $sql = "select * from subject where sem_id='$semester'";
$result = $connect->query($sql);
$data = "";
if ($result->num_rows > 0) {
	while ($sub = $result->fetch_assoc()) {
	$data .= "<div class='inline-block col-4 '><input class='p-2 m-2' name='subject_list' type='checkbox' value=$sub[id]>$sub[subject_name]</div>";
	}
}

echo $data;
?>

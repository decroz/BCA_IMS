<?php
require_once "../connection.php";
$district=$_GET['district'];
if ($district!='')
{
	$sql = "select * from vdc where district_id = $district ";
	//execute
    $res = $connect->query($sql);
    $option =  "<select name='vdc'><option  >Select VDC/Municipality</option>"; 

	while ($row = mysqli_fetch_assoc($res)) {
        $option .=  "<option value=$row[id]>$row[vname]</option>";
    }
    $option .=  "</select>";
    echo $option;
}
?>
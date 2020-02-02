<?php 
require_once "../connection.php";
$zone=$_GET['zone'];

if ($zone!='')
{
	$sql = "select * from districts where zone_id=$zone ";
	//execute
    $res = $connect->query($sql);
    echo "<select id='district_id' onChange='change_district()' style='display:block;width:200px; height:38px;' class='form-control'>";
    echo "<option>";  echo "Select District";    echo "</option>"; 
	while ($row = mysqli_fetch_assoc($res)) {
    echo "<option value='$row[id]'>"; 
    echo $row['dname']; 
    echo"</option>";
    }
    echo "</select>";
}
?>
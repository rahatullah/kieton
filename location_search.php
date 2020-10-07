<?php
require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if($_POST)
{
$q=$_POST['search'];
$sql="SELECT pin_id, pincode, officeName, taluk, city, state FROM location WHERE pincode LIKE '%$q%' OR officeName LIKE '%$q%' ORDER BY pincode LIMIT 10";
$result= mysqli_query($dbc,$sql);
while($row=mysqli_fetch_array($result))
{
$pin_id=$row['pin_id'];
$pincode=$row['pincode'];
$officeName=$row['officeName'];
$city=$row['city'];
$state=$row['state'];
$s_pincode='<strong>'.$q.'</strong>';
$s_officeName='<strong>'.$q.'</strong>';
$final_pincode = str_ireplace($q, $s_pincode, $pincode);
$final_officeName = str_ireplace($q, $s_officeName, $officeName);
?>
<div class="show" >
<span class="name"><?php echo $pin_id; ?>._ <?php echo $pincode; ?>, <?php echo $officeName; ?>, <?php echo $city; ?>.</span><br/><?php echo $pincode; ?>,<?php echo $officeName; ?>,<?php echo $city; ?>,<?php echo $state; ?>.
</div>
<?php
}
}
?>

















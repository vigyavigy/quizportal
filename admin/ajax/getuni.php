<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getunitoken", $_POST['token']))
{
	$check = $db->prepare('SELECT * FROM university');
	$data = array();
	$execute = $check->execute($data);
	?>
	<select name="university" id="university" style="width:100%;color:#000;" class="form-control">
		<option value="0">Select University:</option>
		<?php
		while($datarow=$check->fetch())
		{
			?>
			<option  value="<?php echo $datarow['uid'];?>"><?php echo $datarow['uniname'];?></option>
			<?php
		}
		?>
	</select>
	<?php
}
?>
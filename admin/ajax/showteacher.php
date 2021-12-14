<?php
    include("connection.php");
    session_start();

    if(isset($_POST['token']) && password_verify("showteacher", $_POST['token']))
    {
    	$check = $db->prepare('SELECT * FROM teacher JOIN class ON teacher.classid = class.id JOIN university ON class.uid = university.uid');
    	$data = array();
    	$execute = $check->execute($data);
    	?>
    	<table class="table-responsive" style="margin: 500px;">
    		<tr>
                <td>SR.NO.</td>
    			<td>NAME</td>
    			<td>CLASS</td>
    			<td>UNIVERSITY</td>
                <td>DELETE</td>
    		</tr>
    		<?php
            $srno=1;

    		while($datarow=$check->fetch())
    		{
    			?>
    			<tr>
                    <td><?php echo $srno?></td>
    				<td><?php echo $datarow['fname']?></td>
    				<td><?php echo $datarow['classname']?></td>
    				<td><?php echo $datarow['uniname']?></td>
                    <td><button onclick="deleted(this.value);" class="btn btn-danger" value="<?php echo $datarow['id']?>">Delete</button></td>
    			</tr>
    	<?php
        $srno++;
        	} ?>
    	</table>
    	<?php
    }

?>
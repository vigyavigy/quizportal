<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("showclass",$_POST['token']))
{
    $query=$db->prepare('SELECT * FROM university JOIN class ON class.uid=university.uid;');
    $data=array();
    $execute=$query->execute($data);
?>
<table class="table-responsive" style="margin: 500px;">
    <tr>
        <td>SR. NO.</td>
        <td>CLASS</td>
        <td>UNIVERSITY</td>
        <td>DELETE</td>
    </tr>
    <?php
    $srno=1;
        while($datarow=$query->fetch())
        {
    ?>
    <tr>
        <td><?php echo $srno ?></td>
        <td><?php echo $datarow['classname'] ?></td>
        <td><?php echo $datarow['uniname'] ?></td>
        <td><button onclick="deleted(this.value);" class="btn btn-danger" value="<?php echo $datarow['id']?>">Delete</button></td>
    </tr>
<?php
$srno++;
    } 
?>
    </table>
<?php
    }
?>

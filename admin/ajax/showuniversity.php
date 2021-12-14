<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("showuniversity",$_POST['token']))
{
       
        $query=$db->prepare('SELECT * FROM university;');

        $data=array();

        $execute=$query->execute($data);
?>
<table class="table-responsive" style="margin: 500px;">
    <tr>
        <td>SR. NO.</td>
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
        <td><?php echo $datarow['uniname'] ?></td>
        <td><button onclick="deleted(this.value);" class="btn btn-danger" value="<?php echo $datarow['uid']?>">Delete</button></td>
    </tr>
<?php
$srno++;
    } 
?>
    </table>
<?php
    }
?>

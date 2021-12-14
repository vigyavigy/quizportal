<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getclasstoken",$_POST['token']))
{
    $uid =$_POST['uid'];
    $check = $db->prepare("SELECT * FROM class where uid=?");
    $data = array($uid);
    $execute = $check->execute($data);
    ?>

    <select name="class" id="class" class="form-control">
        <?php
        while($datarow=$check->fetch())
        {
            ?>
            <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['classname']?></option>
            <?php
        }
        ?>
    </select>
    <?php

}

?>
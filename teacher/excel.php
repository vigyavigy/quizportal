<?php
include("Classes/PHPExcel.php");
include("connection.php");
if(!empty($_FILES["excel_file"]))
{
	$file_array = explode(".", $_FILES["excel_file"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		//upload
		$uploadFilePath = 'uploads/'.basename($_FILES['excel_file']['name']);
		move_uploaded_file($_FILES['excel_file']['tmp_name'], $uploadFilePath);
		$Filename = $_FILES["excel_file"]["name"];
		// echo $filename;
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet) 
		{
			$rowcount=$worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++)
			{
				$fname=$worksheet->getCellByColumnAndRow(0, $row)->getValue();
				$lname=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$query = $db->prepare('INSERT INTO data(fname,lname) Values (?,?)');
				$data = array($fname,$lname);
				$execute = $query->execute($data);
				if($execute)
				{
					echo 0;
				}
			}
		}
	}
	else
	{
		echo "something went wrong";
	}
}

?>
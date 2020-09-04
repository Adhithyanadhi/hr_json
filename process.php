<?php
$name = $_POST['name'];
$team = $_POST['team'];
$file = $_FILES['file']['name'];
$fileName = $_FILES['file']['name'];
$fileTemp = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

if(empty($name) || empty($team) || empty($file)){
	echo "Fields cannot be empty";
}else if($fileSize > (200 * 1024)){
	echo "File too large, please upload image less than 200 KB";
}else if($fileError){
	echo "Unknown error while uploading the image";
}else{
	$curr = file_get_contents($team.'.json');
	$arr = json_decode($curr, true);
	$xtra = array(
	    'name' => $name,
	     );
	
	$arr[] = $xtra;
	$final = json_encode($arr);
	
	if(!file_put_contents($team.'.json', $final))
	    echo "Json error";

	else{
		$fileExt = explode('.',$fileName);
		$fileName = 'img/'.$team.'/'.$name;
        $fileDestination = $fileName.".jpg";
        move_uploaded_file($fileTemp,$fileDestination);
        echo "success";
	}
}


?>
<?php
$name = $_POST['name'];
$team = $_POST['team'];
$file = $_FILES['file']['name'];

if(empty($name) || empty($team) || empty($file)){
	echo "Fields cannot be empty";
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
else
    echo "right";

$fileName = $_FILES['file']['name'];
$fileTemp = $_FILES['file']['tmp_name'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.',$fileName);

$fileName = 'img/'.$team.'/'.$name;

if ($fileError === 0) {
        $fileDestination = $fileName.".jpg";
        move_uploaded_file($fileTemp,$fileDestination);
}else{
    echo "error ";
}

}


?>
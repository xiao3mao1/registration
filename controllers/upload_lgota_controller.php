<?php
include "../functions_bd.php";

initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);


if (!file_exists('../uploads/'.translit($abi['fio']).'_'. $abi['idabiturient'])) {
    mkdir('../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'], 0777, true);
}


 $allowed_filetypes = array('jpg','jpeg','gif','png', 'pdf');

$uploaddir = '../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'].'/';
$dir="uploads/".translit($abi['fio']).'_'.$abi['idabiturient'].'/';
$error=0;

$str=strpos($abi['fio'], " "); //
$row=substr($abi['fio'], 0, $str); //обрезаем до пробела
//Документ1
if(is_uploaded_file($_FILES['lgota1']['tmp_name'])){
$name=translit($row).'_'.translit($_FILES['lgota1']['name']);
$ext=pathinfo($_FILES["lgota1"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{move_uploaded_file( $_FILES['lgota1']['tmp_name'], $uploaddir.$name);



add_doc($abi['idabiturient'],'льгота',$dir.$name,$_POST['lgota1_name']);}


}
 
/*//Документ2
if(is_uploaded_file($_FILES['lgota2']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota2']['name'];;
$ext=pathinfo($_FILES["lgota2"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['lgota2']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota2_name']);}
}



//Документ3
if(is_uploaded_file($_FILES['lgota3']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota3']['name'];;
$ext=pathinfo($_FILES["lgota3"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['lgota3']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota3_name']);}
}


//Документ4
if(is_uploaded_file($_FILES['lgota4']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota4']['name'];;
$ext=pathinfo($_FILES["lgota4"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['lgota4']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota4_name']);}
}



//Документ5
if(is_uploaded_file($_FILES['lgota5']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota5']['name'];;
$ext=pathinfo($_FILES["lgota5"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else {
move_uploaded_file( $_FILES['lgota5']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota5_name']);}
}

//Документ6
if(is_uploaded_file($_FILES['lgota6']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota6']['name'];;
$ext=pathinfo($_FILES["lgota6"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['lgota6']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota6_name']);}
}


//Документ7
if(is_uploaded_file($_FILES['lgota7']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota7']['name'];;
$ext=pathinfo($_FILES["lgota7"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['lgota7']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota7_name']);}
}

//Документ8
if(is_uploaded_file($_FILES['lgota8']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota8']['name'];;
$ext=pathinfo($_FILES["lgota8"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{ move_uploaded_file( $_FILES['lgota8']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota8_name']);}
}

//Документ9
if(is_uploaded_file($_FILES['lgota9']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota9']['name'];
$ext=pathinfo($_FILES["lgota9"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;
else{ move_uploaded_file( $_FILES['lgota9']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota9_name']);}
}

//Документ10
if(is_uploaded_file($_FILES['lgota10']['tmp_name'])){
$name=translit($abi['fio']).'_'.$_FILES['lgota10']['name'];
$ext=pathinfo($_FILES["lgota10"]["name"], PATHINFO_EXTENSION);


if(!in_array($ext,$allowed_filetypes)) $error=1;

else{move_uploaded_file( $_FILES['lgota10']['tmp_name'],  $uploaddir.$name);
add_doc($abi['idabiturient'],'льгота',$dir.$name, $_POST['lgota10_name']);}
}

*/

header("Location: ../mylgota.php?error=$error");
?>
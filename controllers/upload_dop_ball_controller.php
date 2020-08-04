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
if(is_uploaded_file($_FILES['dop_ball']['tmp_name'])){
$name=translit($row).'_'.translit($_FILES['dop_ball']['name']);
$ext=pathinfo($_FILES["dop_ball"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{move_uploaded_file( $_FILES['dop_ball']['tmp_name'], $uploaddir.$name);



add_doc($abi['idabiturient'],'доп.балл',$dir.$name,$_POST['dop_ball_name']);}


}
 


header("Location: ../mydocs.php?error=$error");
?>
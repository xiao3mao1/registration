<?php
include "../functions_bd.php";

initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);


if (!file_exists('../uploads/'.translit($abi['fio']).'_'. $abi['idabiturient'])) {
    mkdir('../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'], 0777, true);
}

$uploaddir = '../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'].'/';
$dir="uploads/".translit($abi['fio']).'_'.$abi['idabiturient'].'/';
$allowed_filetypes = array('jpg','jpeg','gif','png', 'pdf');
$error=0;

$str=strpos($abi['fio'], " "); //
$row=substr($abi['fio'], 0, $str); //обрезаем до пробела

//справка 1
if(is_uploaded_file($_FILES['spravka1']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_spravka1_.';

$ext=pathinfo($_FILES["spravka1"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['spravka1']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



 add_doc($abi['idabiturient'],'справка',$dir.date('j_m_y, h_i_s,').$name.$ext, null);
}}

//справка 2
if(is_uploaded_file($_FILES['spravka2']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_spravka2_.';

$ext=pathinfo($_FILES["spravka2"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['spravka2']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



 add_doc($abi['idabiturient'],'справка',$dir.date('j_m_y, h_i_s,').$name.$ext, null);
}}
header("Location: ../mydocs.php?error=$error");
?>
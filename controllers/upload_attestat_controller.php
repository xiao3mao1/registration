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


//аттестат1
if(is_uploaded_file($_FILES['attestat1']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_attestat1_.';
$ext=pathinfo($_FILES["attestat1"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['attestat1']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



add_doc($abi['idabiturient'],'аттестат',$dir.date('j_m_y, h_i_s,').$name.$ext, null);}}


//аттестат2
if(is_uploaded_file($_FILES['attestat2']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_attestat2_.';
$ext=pathinfo($_FILES["attestat2"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['attestat2']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



add_doc($abi['idabiturient'],'аттестат',$dir.date('j_m_y, h_i_s,').$name.$ext, null);}}


//аттестат3
if(is_uploaded_file($_FILES['attestat3']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_attestat3_.';
$ext=pathinfo($_FILES["attestat3"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['attestat3']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



add_doc($abi['idabiturient'],'аттестат',$dir.date('j_m_y, h_i_s,').$name.$ext, null);
}
}

//аттестат4
if(is_uploaded_file($_FILES['attestat4']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_attestat4_.';
$ext=pathinfo($_FILES["attestat4"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['attestat4']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);



add_doc($abi['idabiturient'],'аттестат',$dir.date('j_m_y, h_i_s,').$name.$ext, null);
}
}


header("Location: ../mydocs.php?error=$error");
?>
<?php
include "../functions_bd.php";

initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);


if (!file_exists('../uploads/'.translit($abi['fio']).'_'. $abi['idabiturient'])) {
    mkdir('../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'], 0777, true);
}

$uploaddir = '../uploads/'.translit($abi['fio']).'_'.$abi['idabiturient'].'/';
$dir="uploads/".translit($abi['fio']).'_'.$abi['idabiturient'].'/';

  $str=strpos($abi['fio'], " "); //
  $row=substr($abi['fio'], 0, $str); //обрезаем до пробела

$allowed_filetypes = array('jpg','jpeg','gif','png', 'pdf');
$error=0;

//Заявление 1 стр.
if(is_uploaded_file($_FILES['zayavl1']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_zayavl1_.';
$ext=pathinfo($_FILES["zayavl1"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['zayavl1']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);
 add_doc($abi['idabiturient'],'заявление',$dir.date('j_m_y, h_i_s,').$name.$ext,null);
}
}

//Заявление 2 стр.
if(is_uploaded_file($_FILES['zayavl2']['tmp_name'])){
$name=translit($row).'_'.$abi['idabiturient'].'_zayavl2_.';
$ext=pathinfo($_FILES["zayavl2"]["name"], PATHINFO_EXTENSION);

if(!in_array($ext,$allowed_filetypes)) $error=1;
else{
move_uploaded_file( $_FILES['zayavl2']['tmp_name'], $uploaddir.date('j_m_y, h_i_s,').$name.$ext);
 add_doc($abi['idabiturient'],'заявление',$dir.date('j_m_y, h_i_s,').$name.$ext,null);
}
}




header("Location: ../mydocs.php?error=$error");
?>
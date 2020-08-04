<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
$docs=get_all_lgota_docs_by_idabi($abi['idabiturient']);
$error=$_GET['error'];
?>
<html>
<head>



<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Мои льготы</title>
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='pravila'>

<div class='docs'>



  <a href="upload_lgota.php"><img src='images/upload.png' title='Загрузить документы'> <div>Загрузить документы, подтверждающие льготу</div></a>
  </div>

<?php if ($error==1) echo "<h3 style='color: red;'>Документ не загружен. Недопустимый формат документа</h3>";?>

  	<table>
  		<tr>
<th>Документ</th>
<th>Ссылка</th>
  		</tr>

<?php 
for($i=0;$i<count($docs);$i++){
$iddoc=$docs[$i]['iddoc'];
$doc_name=$docs[$i]['doc_name'];
$url=$docs[$i]['doc_path'];	

$doc_path="<a href='$url' download><img src='images/download.png'></a>";

$del="<a href='controllers/del_doc_controller.php?iddoc=$iddoc'><img src='images/del.png'></a>";


$template="<tr><td>[doc_name]</td><td>[doc_path]</td></tr>";
     
echo  str_replace(array('[doc_name]','[doc_path]','[del]'), array($doc_name, $doc_path,$del), $template);



}
?>
</table>



</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>
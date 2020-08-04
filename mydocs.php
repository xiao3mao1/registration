<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
$docs=get_all_docs_by_idabi($abi['idabiturient']);
$marks=get_all_marks_by_idabi($abi['idabiturient']);
$error=$_GET['error'];

echo $marks[0]['predmet'];
?>
<html>
<head>



<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">


<title>Мои документы</title>
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='table_docs'>

<div>
<div class='forms'>

<?php if ($abi['iduroven']==1) {$a='examples/zayavl_bach.pdf'; $b='examples/exampl_bach.pdf';}
        elseif ($abi['iduroven']==2) {$a='examples/zayavl_spo.pdf'; $b='examples/exampl_spo.pdf';}
        else {$a='examples/zayavl_mag.pdf'; $b='examples/exampl_mag.pdf';}
		
		
		
		?>

	Скачать:
 <a target="_blank" href='<?php echo $a;?>'><img src='images/word.png' title='Форма заявления'> <div>Форма заявления</div></a>
  <a target="_blank" href='<?php echo $b;?>'><img src='images/pdf.png' title='Образец заполнения'> <div>Образец заполнения</div></a>
</div>

<div class='docs'>

  <a href="marks.php"><img src='images/plus.png' title='Загрузить заявления'> <div>Добавить оценки</div></a>

  <table>
           <tr>
<th>Предмет</th>
<th>Оценка</th>
<th>Удалить</th>
      </tr>

<?php 
for($i=0;$i<count($marks);$i++){
$mark=$marks[$i]['mark'];
$predmet=$marks[$i]['predmet'];
$idabitur_predmet=$marks[$i]['idabitur_predmet'];



$del="<a href='controllers/del_mark_controller.php?idabitur_predmet=$idabitur_predmet'><img src='images/del.png'></a>";


$template="<tr><td>[predmet]</td><td>[mark]</td><td>[del]</td></tr>";
     
echo  str_replace(array('[predmet]','[mark]', '[del]'), array($predmet,$mark, $del), $template);



}
?>
</table>


  
  	 </div>

<div class='docs'>
	Загрузить:
  <a href="upload_zayavl.php"><img src='images/upload.png' title='Загрузить заявления'> <div>1. Заявлениe</div></a>
  <a href="upload_passport.php"><img src='images/upload.png' title='Загрузить паспорт'> <div>2.Паспорт</div></a>
    <a href="upload_inn.php"><img src='images/upload.png' title='Загрузить ИНН'> <div>3.ИНН</div></a>
      <a href="upload_attestat.php"><img src='images/upload.png' title='Загрузить документы'> <div>4.Документ о полученном ранее образовании</div></a>
        <a href="upload_spravka.php"><img src='images/upload.png' title='Загрузить справку'> <div>5.Медицинская справка</div></a>
        
        <a href="upload_gia.php"><img src='images/upload.png' title='Загрузить серификат'> <div>6.Сертификат ГИА</div></a>
        <a href="upload_dop_bally.php"><img src='images/upload.png' title='Загрузить доп. документы'> <div>7. Дополнительные документы (олимпиады, конкурсы)</div></a>
  	 </div>
  </div>

  <div>

  </div>

  
  
  

  	<table>
  		<caption> <?php if ($error==1) echo "<h3 style='color: red;'>Документ не загружен. Недопустимый формат документа</h3>";?>Мои загруженные документы</caption>
  		<tr>
<th>Документ</th>
<th>Ссылка</th>
  		</tr>

<?php 
for($i=0;$i<count($docs);$i++){
$iddoc=$docs[$i]['iddoc'];
$doc_type=$docs[$i]['doc_type'];
$url=$docs[$i]['doc_path'];	
$doc_time=$docs[$i]['doc_time'];	

$doc_path="<a href='$url' download><img src='images/download.png'></a>";

$del="<a href='controllers/del_doc_controller.php?iddoc=$iddoc'><img src='images/del.png'></a>";


$template="<tr><td>[doc_type] [doc_time]</td><td>[doc_path]</td></tr>";
     
echo  str_replace(array('[doc_type]','[doc_time]','[doc_path]','[del]'), array($doc_type,$doc_time, $doc_path,$del), $template);



}
?>
</table>



</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>
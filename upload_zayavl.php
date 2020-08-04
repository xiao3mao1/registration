<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Загрузка документов</title>
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='pravila'>

	<?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
?>

<h3>Допускается только загрузка форматов jpeg, jpg, gif, png, pdf.</h3>
<form method="POST" action="controllers/upload_zayavl_controller.php" enctype="multipart/form-data">
    <div>
     

      <div class="file_pole" > 
 <label > Загрузите 1-ю страницу заявления <span>*</span>:</label>
  <div > 
 <input name="zayavl1" type="file" class='add_file'><br>
  </div> 
  </div>
      
      <div class="file_pole" > 
 <label > Загрузите 2-ю страницу заявления <span>*</span>:</label>
  <div > 
 <input name="zayavl2" type="file" class='add_file'><br>
  </div> 
  </div>
    
    </div>
     <input  class="add_button" type="submit" name="uploadBtn" value="Загрузить" />
  </form>
 

</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>

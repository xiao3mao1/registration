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
<form method="POST" action="controllers/upload_lgota_controller.php" enctype="multipart/form-data">
    <div>
     

  <div class="file_pole" > 
 <label>Документ:</label>
  <div > 
     <input name="lgota1_name" type="text"  required placeholder="Название документа"><br>
 <input name="lgota1" type="file" required class='add_lgota'><br>
  </div> 
  </div>


<!--<div class="file_pole" > 
 <label>Документ 2:</label>
  <div > 
     <input name="lgota2_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota2" type="file" class='add_file'><br>
  </div> 
  </div>

  <div class="file_pole" > 
 <label>Документ 3:</label>
  <div > 
     <input name="lgota3_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota3" type="file" class='add_lgota'><br>
  </div> 
  </div>


<div class="file_pole" > 
 <label>Документ 4:</label>
  <div > 
     <input name="lgota4_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota4" type="file" class='add_file'><br>
  </div> 
  </div>

    <div class="file_pole" > 
 <label>Документ 5:</label>
  <div > 
     <input name="lgota5_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota5" type="file" class='add_lgota'><br>
  </div> 
  </div>


<div class="file_pole" > 
 <label>Документ 6:</label>
  <div > 
     <input name="lgota6_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota6" type="file" class='add_file'><br>
  </div> 
  </div>
    <div class="file_pole" > 
 <label>Документ 7:</label>
  <div > 
     <input name="lgota7_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota7" type="file" class='add_lgota'><br>
  </div> 
  </div>


<div class="file_pole" > 
 <label>Документ 8:</label>
  <div > 
     <input name="lgota8_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota8" type="file" class='add_file'><br>
  </div> 
  </div>

    <div class="file_pole" > 
 <label>Документ 9:</label>
  <div > 
     <input name="lgota9_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota9" type="file" class='add_lgota'><br>
  </div> 
  </div>


<div class="file_pole" > 
 <label>Документ 10:</label>
  <div > 
     <input name="lgota10_name" type="text"  placeholder="Название документа"><br>
 <input name="lgota10" type="file" class='add_file'><br>
  </div> 
  </div>
-->




     
    </div>




 
    <input  class="add_button" type="submit" name="uploadBtn" value="Загрузить" />
  </form>
 

</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>
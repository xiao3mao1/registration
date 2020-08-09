<?php
include "functions_bd.php";
$idform=$_GET['idform'];
$iduroven=$_GET['iduroven'];

$spec=get_specialization_by_form_uroven($idform, $iduroven);

?>
<html lang="ru">
<head>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  
  <main class='admin'>
   <table>
           <tr>
<th>Код</th>
<th>Направление/профиль</th>

      </tr>

<?php 
for($i=0;$i<count($spec);$i++){
$idspec=$spec[$i]['idspecialization'];
$spec_name=$spec[$i]['specialization'];



$to_zayavl="<a href='spisok_zayavl.php?idspec=$idspec'>$spec_name</a>";


$template="<tr><td>[idspec]</td><td>[spec]</td></tr>";
     
echo  str_replace(array('[idspec]','[spec]'), array($idspec,$to_zayavl), $template);



}
?>
</table>
</main>

</body>
</html>
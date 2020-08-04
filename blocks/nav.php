<?php 

$rasp=get_idrasp_by_idabiturient($abi['idabiturient']);
$uroven=$abi['iduroven'];

?>

<div class='nav'>
<ul>
 
  <li><a href="prof.php?error=0"> <img src='images/prof.png' title='Профиль'><div>Профиль</div></a></li>
  <li><a href="pravila.php"><img src='images/pravila.png' title='Правила приема'><div>Правила приема</div></a></li>
  
  <li><a href="zayavl.php"><img src='images/napr.png' title='Заявдения'> <div>Заявления</div></a></li>
 
   <!--<li><a href="https://docs.google.com/forms/d/1bTjUYlzPJt-Z0UYQFVQnywPvlzlFrOrRanN5zNaOgGk/edit"><img src='images/doc.png' title='Загрузить документы'> <div>Загрузить документы</div> </a> </li>-->

<li><a href="mydocs.php?error=0"><img src='images/doc.png' title='Мои документы'> <div>Мои документы</div> </a> </li>

<?php if ($uroven==1 || $uroven==2)  echo "<li><a href='mylgota.php?error=0'><img src='images/lgota.png' title='Подтверждение льготы'> <div>Подтверждение льготы</div> </a> </li>";  ?>


  <!-- <li><a href=" <?php if ($rasp==0)  echo 'welcome.php'; else echo 'ticket.php';   ?>"><img src='images/ochered.png' title='Электронная очередь'> <div>Электронная очередь</div></a></li>
  -->

</ul>

</div>
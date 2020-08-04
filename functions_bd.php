<?php

$mysqli=false;
//Подключиться к базе
 function connectdb()
 {
   global $mysqli;
//$mysqli =new mysqli('192.168.200.26', 'portfolio','t1S5rJTJtJAeupxh','portfolio');
$mysqli =new mysqli('localhost', 'root','','registration');
	 
	 if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 
	mysqli_query($mysqli,"SET NAMES 'utf8'"); 
	 
 }
 //закрыть полключение
 function closedb(){
	global $mysqli;
	$mysqli->close();
}

 
function get_all_napravleniya($iduroven, $idform)
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM napravleniya where iduroven=$iduroven and idForma=$idform");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }


function get_specialization_by_form_uroven($idform, $iduroven)
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM specialization join napravleniya on specialization.idnapr=napravleniya.idNapr where idUroven=$iduroven and idForma=$idform");
    
	//echo "SELECT * FROM specialization join napravleniya on specialization.idnapr=napravleniya.idNapr where idForma=$idform";
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }

function get_all_specialization()
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM specialization");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }


function get_all_status()
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM `status`");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }

function get_all_abi_on_date($date)
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT abiturient.idabiturient, abiturient.fio, abiturient.email, abiturient.tel, abiturient.iduroven, raspisanie.time_rasp FROM raspisanie join abiturient on raspisanie.idabiturient=abiturient.idabiturient where date_rasp='$date'");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }


 function get_abiturient_by_tel($tel)
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM abiturient where tel='$tel'");
    
	
	closedb();

     return mysqli_fetch_assoc($result);
 	 
 }

  function get_all_predmets($idabiturient)
 //получить 
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM predmet where idpredmet not in (SELECT idpredmet from abitur_predmet where idabiturient=$idabiturient) order by predmet");
    
	
	closedb();

     return mysqli_fetch_all($result, MYSQLI_ASSOC);
 	 
 }



 function get_all_urovni()
 //получить список уровней
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * FROM uroven");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }

 function get_all_zayavl_by_idabi($idabiturient)
 //получить список уровней
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT abiturient.fio, zayavlenie.idzayavl, zayavlenie.`comment`, `status`.name_status, specialization.specialization, zayavlenie.prioritet, napravleniya.idForma FROM zayavlenie join abiturient on zayavlenie.idabiturient=abiturient.idabiturient join specialization on zayavlenie.idspecialization=specialization.idspecialization join napravleniya on specialization.idnapr=napravleniya.idNapr join `status` on zayavlenie.idstatus=`status`.idstatus where zayavlenie.idabiturient=$idabiturient order by zayavlenie.prioritet");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }
 


 function get_zayavl_by_id($idzayavl)
 //получить заявление
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT zayavlenie.idzayavl, zayavlenie.idabiturient, specialization.specialization, zayavlenie.prioritet, zayavlenie.`comment`, zayavlenie.idstatus from zayavlenie join specialization on zayavlenie.idspecialization=specialization.idspecialization where idzayavl=$idzayavl");
    
	
	closedb();

     return mysqli_fetch_assoc($result);
 	 
 }
 

 function edit_zayavl_by_id($idzayavl, $comment, $idstatus)
 //получить заявление
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"UPDATE zayavlenie set comment='$comment', idstatus=$idstatus  where idzayavl=$idzayavl");
    
	
	closedb();

     return $result;
 	 
 }


 function count_all_zayavl_by_idabi($idabiturient, $idform)
 //получить список уровней
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT count(*) as n from zayavlenie join specialization on zayavlenie.idspecialization=specialization.idspecialization join napravleniya on specialization.idnapr=napravleniya.idNapr 	 where zayavlenie.idabiturient=$idabiturient and idForma=$idform");
    
	
	closedb();

     return mysqli_fetch_assoc($result);
 	 
 }
 

  function get_all_time_by_date($date_application,$iduroven)
 //получить список свободного времени
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"CALL get_time('$date_application', '$iduroven')");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }
 

  function get_all_prioritet_by_idabi($idabiturient)
 //получить список приоритет
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * from prioritet where prioritet.prioritet not in (SELECT prioritet from zayavlenie where idabiturient=$idabiturient)");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }




  function get_all_marks_by_idabi($idabiturient)
 //получить список приоритет
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT predmet.predmet, abitur_predmet.mark, abitur_predmet.idabitur_predmet  from abitur_predmet join predmet on abitur_predmet.idpredmet=predmet.idpredmet where abitur_predmet.idabiturient=$idabiturient");
  
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }

  function add_abiturient($fio, $tel, $pers, $uroven, $email, $pass)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"Insert into abiturient (fio, tel, soglasie, iduroven, email, pass) value ('$fio', '$tel', $pers,  $uroven, '$email', '$pass')");
    
		closedb();

     return $result;
 	 
 }



 function add_zayavl($idabiturient, $idspec, $prioritet)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"Insert into zayavlenie (idabiturient, idspecialization, prioritet, idstatus) value ($idabiturient, $idspec, $prioritet, 1)");
    
		closedb();

     return $result;
 	 
 }


function add_mark($idabiturient, $idpredmet, $mark)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"Insert into abitur_predmet (idabiturient, idpredmet, mark) value ($idabiturient, $idpredmet, $mark)");
    
		closedb();

     return $result;
 	 
 }



 function del_zayavl($idzayavl)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"Delete from zayavlenie where idzayavl=$idzayavl");
    
		closedb();

     return $result;
 	 
 }


function del_marks_by_id($idabitur_predmet)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"Delete from abitur_predmet where idabitur_predmet=$idabitur_predmet");
    
		closedb();

     return $result;
 	 
 }


 function get_abiturient_by_idabi($idabiturient)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * from abiturient where idabiturient=$idabiturient");
    
		closedb();

     return mysqli_fetch_assoc($result);
 	 
 }


 function edit_abiturient($id, $fio, $tel, $uroven, $email, $pass)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();




$strsql="update abiturient set fio='$fio', tel='$tel', iduroven= $uroven, email='$email', pass='$pass' where idabiturient=$id";
 
	$result = mysqli_query($mysqli, $strsql);
	
    
		closedb();

     return $result;
 	 
 }

function free_time($idraspisanie)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"UPDATE raspisanie SET idabiturient=null  where idraspisanie=$idraspisanie");
    
		closedb();

     return $result;
 	 
 }


function choose_time($idabiturient, $idraspisanie)
 //добавить абитуриента
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"UPDATE raspisanie SET idabiturient=$idabiturient where idraspisanie=$idraspisanie");
    
		closedb();

     return $result;
 	 
 }


 function get_id_by_tel($tel)
{

global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT idabiturient, iduroven from abiturient where tel='$tel'");
    
		closedb();

     return mysqli_fetch_assoc($result);

}

 function get_ticket_by_tel($tel)
{

global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT abiturient.fio as fio, abiturient.tel as tel, raspisanie.date_rasp as date_rasp, raspisanie.time_rasp as time_rasp from raspisanie right join abiturient on raspisanie.idabiturient=abiturient.idabiturient where abiturient.tel='$tel'");
    
		closedb();

     return mysqli_fetch_assoc($result);

}

function is_tel($tel)
{

global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT count(*) as vsego from abiturient where tel='$tel'");
    
		closedb();

     return mysqli_fetch_assoc($result);

}


function is_tel_exept_abi($tel, $abi)
{

global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT count(*) as vsego from abiturient where tel='$tel' and idabiturient<>$abi");
    
		closedb();

     return mysqli_fetch_assoc($result);

}


function get_idrasp_by_idabiturient($idabiturient)
{

global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT idraspisanie from raspisanie where idabiturient=$idabiturient");
    
		closedb();
  if ($result==false) return 0;
  else     { $result =mysqli_fetch_assoc($result) ;return $result['idraspisanie'];}

}

function get_all_docs_by_idabi($idabiturient)
{
global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * from docs where idabiturient=$idabiturient and doc_type<>'льгота'");
    
		closedb();

     return mysqli_fetch_all($result, MYSQLI_ASSOC);


}

function get_all_lgota_docs_by_idabi($idabiturient)
{
global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT * from docs where idabiturient=$idabiturient and doc_type='льгота'");
    
		closedb();

     return mysqli_fetch_all($result, MYSQLI_ASSOC);


}



function add_doc($idabiturient, $doc_type, $doc_path, $doc_name)
{

global $mysqli;
	connectdb();

	if ($doc_type=='льгота' || $doc_type=='доп.балл')
	$result = mysqli_query($mysqli,"INSERT INTO docs (idabiturient, doc_type, doc_path, doc_name) values ($idabiturient, '$doc_type', '$doc_path', '$doc_name')");

    else
    	$result = mysqli_query($mysqli,"INSERT INTO docs (idabiturient, doc_type, doc_path) values ($idabiturient, '$doc_type', '$doc_path')");
    
    //echo "INSER INTO docs (idabiturient, doc_type, doc_path) values ($idabiturient, '$doc_type', '$doc_path')";
		closedb();

     return $result;

}


function is_doc_by_type($idabiturient, $doc_type)
{

global $mysqli;
	connectdb();

	if ($doc_type<>'льгота'){


	$result = mysqli_query($mysqli,"SELECT count(*) as n from docs where idabiturient=$idabiturient and doc_type='$doc_type'");

	
}

    
    
    //echo "INSER INTO docs (idabiturient, doc_type, doc_path) values ($idabiturient, '$doc_type', '$doc_path')";
		closedb();

     return mysqli_fetch_assoc($result);

}
// Админка-------------------------------------------------------------

 function get_all_zayavl_by_forma_uroven($iduroven,$idform)
 //получить список уровней
 {
	global $mysqli;
	connectdb();
	$result = mysqli_query($mysqli,"SELECT abiturient.idabiturient, abiturient.fio, abiturient.tel, abiturient.reg_date, abiturient.email, zayavlenie.idzayavl, zayavlenie.`comment`, `status`.name_status, specialization.specialization, zayavlenie.prioritet, napravleniya.Napr FROM zayavlenie join abiturient on zayavlenie.idabiturient=abiturient.idabiturient join specialization on zayavlenie.idspecialization=specialization.idspecialization join napravleniya on specialization.idnapr=napravleniya.idNapr join `status` on zayavlenie.idstatus=`status`.idstatus  where napravleniya.idForma=$idform and napravleniya.idUroven=$iduroven and prioritet=1 order by reg_date");
    
	
	closedb();

     return mysqli_fetch_all($result,MYSQLI_ASSOC);
 	 
 }


//----------------------------------------------------------------------------------------
 function initSession()
 {
	 session_start();
	 if (!isset($_SESSION['tel'])) 
	 	{$_SESSION['tel']="";
	  	  $_SESSION['inited']=true;
         $_SESSION['email']="";
         $_SESSION['pass']="";
         $_SESSION['error_auth']=false;
	  	}


	  return  $_SESSION['inited'];  
	  
 }
 
  function check_abiturient($tel,$pass)
 {
 global $mysqli;
connectDB();
$res=mysqli_query($mysqli,"select * from abiturient  where tel='$tel'");	

	 closeDB();


	 if(mysqli_num_rows($res)<>0) 
	 {	 $res=mysqli_fetch_assoc($res);

	 	 if ($res['pass']==$pass) return true;
	}
	 else return false;
 }
 
 function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','А'=>'a' ,'б'=>'b', 'Б'=>'b','в'=>'v', 'В'=>'v','г'=>'g', 'Г'=>'g','д'=>'d','Д'=>'d','е'=>'e', 'Е'=>'e','ё'=>'e','Ё'=>'e' ,'ж'=>'j', 'Ж'=>'j', 'з'=>'z','З'=>'z' ,'и'=>'i','И'=>'i' ,'й'=>'y', 'Й'=>'y','к'=>'k','К'=>'k','л'=>'l','Л'=>'l' ,'м'=>'m','М'=>'m' ,'н'=>'n','Н'=>'n','о'=>'o', 'О'=>'o','п'=>'p','П'=>'p' ,'р'=>'r','Р'=>'r','с'=>'s','С'=>'s','т'=>'t','Т'=>'t','у'=>'u','У'=>'u','ф'=>'f','Ф'=>'f','х'=>'h','Х'=>'h','ц'=>'c','Ц'=>'c','ч'=>'ch','Ч'=>'ch','ш'=>'sh','Ш'=>'sh','щ'=>'shch','Щ'=>'shch','ы'=>'y','э'=>'e','Э'=>'e','ю'=>'yu','Ю'=>'yu','я'=>'ya','Я'=>'ya','ъ'=>'','ь'=>''));
  return $s; // возвращаем результат
}



<header class="page-header">
	
    
       <h2>ВСТУПИТЕЛЬНАЯ КАМПАНИЯ - 2020</h2> 


     <div class='log_in_out'>
      <?php
				if (check_abiturient($_SESSION['tel'], $_SESSION['pass'])) 
		{
			
				
			echo "<img src='images/avatar.png'/><div class='login'>".$_SESSION['tel']."</div><a href='logout.php'>Выход </a>";  
			
			
			
		}
		else { echo "<a href='index.php?error=0'>Вход </a>";}
		?>
	</div>
	
    </header>
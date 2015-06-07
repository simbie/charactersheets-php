<?php


include('conn.php');







function insert_npc($name)
{




$result = mysql_query("INSERT INTO `gmhelper_NPC` 
			   
			  	(
			   
			   `npc_name`  
			  
			  
			   		   
			   	) 
		  VALUES 	
		  
		  		(	
		  			
					'".$name."'
					
					
								
				);"
					
) 
		  
		  
   or die(mysql_error()); 

}


















if(isset($_POST['insertnpc']))
{

insert_npc($_POST['insertnpc']);


}





?>
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


























function insert_objects($type, $name)
{
	$result = mysql_query("INSERT INTO `gmhelper_objects`
		(
			`type`,
			`name`
		)
	VALUES
	(
		'".$type."',
		'".$name."'
		);"
	)
	or die(mysql_error());
}




function insert_object_attr($parent, $name, $value, $description)
{
	$result = mysql_query("INSERT INTO `gmhelper_object_attr`
		(
			`parent`,
			`attr_name`,
			`attr_value`,
			`attr_description`
		)
	VALUES
	(
		'".$parent."',
		'".$name."',
		'".$value."',
		'".$description."'
		);"
	)
	or die(mysql_error());
}











if(isset($_POST['insertnpc']))
{

insert_npc($_POST['insertnpc']);


}





if(isset($_POST['insertobject']))
{

insert_objects($_POST['objecttype'], $_POST['objectname']);


}



if(isset($_POST['insertobjectattr']))
{

insert_object_attr($_POST['parent'], $_POST['name'], $_POST['value'], $_POST['description']);


}



?>
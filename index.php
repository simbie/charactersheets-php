<?

include('conn.php');






















function xcms_update_users_main($user_id = null, $user_name = null, $user_password= null, $user_token= null, $user_active = null)
{

$result_getuser = mysql_query("SELECT * FROM `".xdbs_site."_users_main` WHERE id ='".$user_id."'") or die(mysql_error());
$row_getuser = mysql_fetch_array($result_getuser);







if ($row_getuser['id'] != '')

{


if ($user_name == null)
{
	$user_name = $row_getuser['user_name'];
}
if ($user_password == null)
{
	$user_password = $row_getuser['user_password'];
}
else
{
	$user_password = md5($user_password);
}
if ($user_token == null)
{
	$user_token = $row_getuser['user_token'];
}
if ($user_active == null)
{
	$user_active = $row_getuser['user_active'];
}









$result = mysql_query("UPDATE `".xdbs_site."_users_main` SET
			   
			   
			
			
			user_name = '".$user_name."',
			user_password = '".$user_password."',
			user_token = '".$user_token."',
			user_active = '".$user_active."'
		

			   
			  
			  
			   
			   
		WHERE id = '".$user_id."' ") 
  
or die(mysql_error());

}

}


















?>


<html>
 <head>
  <title>GMHelper </title>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 </head>
 <body>

<?php

$result = mysql_query("SELECT * FROM `gmhelper_NPC`") or die(mysql_error());

while ( $row = mysql_fetch_array($result) ) 

{
echo ''.$row['npc_name'].'<br>';
}

?>

NPC Name:<input type="text" id="npc_name"><br>
<button id="insertnpc">Lägg till</button>

<br>
--------------------------
<br>
<h2>ADD NEW OBJECTS</h2>
Object type:
<select id="objecttype">
<option value="monster">Monster</option>
<option value="class">Class</option>
</select>
<br>
Object name:<input type="text" id="objectname"><br>
<button id="insertobjects">ADD OBJECT</button>

<br>
--------------
<br>
<h2>OBJECT ATTRIBUTES</h2>
Object name:
<select id="attrparent">
<?php

$result = mysql_query("SELECT * FROM `gmhelper_objects`") or die(mysql_error());

while ( $row = mysql_fetch_array($result) ) 

{
echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>

</select><br>
Attribute name: 
<select id="attrname">
<option value="strength">Strength</option>
<option value="dexterity">Dexterity</option>
</select><br>
Attribute value: <input type="text" id="attrvalue"><br>
Description<input type="text" id="attrdescription"><br>
<button id="insertobjectattr">ADD ATTRIBUTE</button>



     <script type="text/javascript">
 
     	$(document).on('click', '#insertnpc', function()
     	{
     		var npc_name = $('#npc_name').val();
     		$.ajax({
     			url: "/functions.php",
     			type: "post",
     			dataType: "html",
     			data: {'insertnpc': npc_name},
     			success: function(data){
     				alert(data)
     			},
     			error: function(){alert("Det gick inte!");
     		}
     	});
     	});





     	     	$(document).on('click', '#insertobjects', function()
     	{
     		var objecttype = $('#objecttype').val();
     		var objectname = $('#objectname').val();
     		$.ajax({
     			url: "/functions.php",
     			type: "post",
     			dataType: "html",
     			data: {'insertobject': '', 'objecttype': objecttype, 'objectname': objectname},
     			success: function(data){
     				alert(data)
     			},
     			error: function(){alert("Det gick inte!");
     		}
     	});
     	});



     	     	$(document).on('click', '#insertobjectattr', function()
     	{
     		var attrparent = $('#attrparent').val();
     		var attrname = $('#attrname').val();
     		var attrvalue = $('#attrvalue').val();
     		var attrdescription = $('#attrdescription').val();
     		$.ajax({
     			url: "/functions.php",
     			type: "post",
     			dataType: "html",
     			data: {'insertobjectattr': '', 'parent': attrparent, 'name': attrname, 'value': attrvalue, 'description': attrdescription},
     			success: function(data){
     				alert(data)
     			},
     			error: function(){alert("Det gick inte!");
     		}
     	});
     	});

      </script>



 </body>
</html>
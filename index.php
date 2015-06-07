<?






















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
  <title>PHP Test</title>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 </head>
 <body>



NPC Name:<input type="text" id="npc_name">
<button id="insertnpc">Lägg till</button>





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

      </script>



 </body>
</html>
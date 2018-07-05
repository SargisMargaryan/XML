<!DOCTYPE html>
<html>
<head>
	<title>information page </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#add').click(function(){
				let id=$('#id').val();
				let name=$('#name').val();
				let surname=$('#surname').val();
				let age=$('#age').val();
				let city=$('#city').val();
			$.ajax({
				url:'file.php',
				type:'post',
				data:{id:id,name:name,surname:surname,age:age,city:city,action:'add'},
				success:function(elem){
					location.reload();
					// $('div').append(elem);
				}
			})
			});
			$('.del').click(function(){
				let id=$(this).parents('tr').find('.id').html();
				
			$.ajax({
				url:'file.php',
				type:'post',
				data:{id:id,action:'delete'},
				success:function(elem){
					location.reload();
					// $('div').append(elem);
				}
			})
			});
			$('.upd').click(function(){
				let id=$(this).parents('tr').find('.id').html();
				let name=$(this).parents('tr').find('.name').html();
				let surname=$(this).parents('tr').find('.sname').html();
				let age=$(this).parents('tr').find('.age').html();
				let city=$(this).parents('tr').find('.city').html();
				// alert(surname);
			$.ajax({
				url:'file.php',
				type:'post',
				data:{id:id,name:name,surname:surname,age:age,city:city,action:'update'},
				success:function(elem){
					location.reload();
					// $('div').append(elem);
				}
			})
			});
			
		})

	</script>

</head>
<body>

  <label>ID number:<input type="text" id="id"></label><br><br>
  <label>Name: <input type="text" id="name"></label><br><br>
  <label>Surname: <input type="text" id="surname"></label><br><br>
  <label>Age: <input type="text" id="age"></label><br><br>
  <label>City: <input type="text" id="city"></label><br><br>
  <input type="button" id="add" value="ADD"><br><br>
<div></div>
 <?php

 	$xml=new DOMDocument();
 	$xml->load("first.xml");
 	// $a=$xml->saveXML();
 	// echo $a;
 	// echo gettype($a);
 	$peoples=$xml->getElementsByTagName("people");
 	echo "<table border=1 cellpadding=40><tr>";
 	   echo "<th>ID</th>";
 	  echo "<th>Name</th>";
 	  echo "<th>Surname</th>";
 	  echo "<th>Age</th>";
 	  echo "<th>City</th>";
 	  echo "<th>Update</th>";
 	  echo "<th>Delete</th>";
 	  echo "</tr>";
 	foreach ($peoples as $people) {

 		$ids=$people->getElementsByTagName("id");
 			$id=$ids->item(0)->nodeValue;
 		$names=$people->getElementsByTagName("name");
 			$name=$names->item(0)->textContent;
 		$surnames=$people->getElementsByTagName("surname");
 			$surname=$surnames->item(0)->textContent;
 		$ages=$people->getElementsByTagName("age");
 			$age=$ages->item(0)->nodeValue;
 		$cities=$people->getElementsByTagName("city");
 			$city=$cities->item(0)->nodeValue;
 	// 		echo $name."   ".$surname.'  '.$age.'  '."<br>";
 			$i=1;
 			echo "<tr>";
 			echo "<td class='id'>$id</td>";
 			echo "<td contenteditable=true class='name'>$name</td>";
 			echo "<td contenteditable=true class='sname'>$surname</td>";
 			echo "<td contenteditable=true class='age'>$age</td>";
 			echo "<td contenteditable=true class='city'>$city</td>";
 			echo "<td><button class='upd'>Update</button></td>";
 			echo "<td><button class='del'>Delete</button></td>";
           echo "</tr>";  
 		
          
 	}
 	echo "</table>";
 	// print_r($xml->firstChild);
 	// print_r($names);
 	
  ?>
</body>
</html>
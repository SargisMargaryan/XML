<?php

$action=$_POST['action'];
$xml=new DOMDocument();
$xml->formatOutput=true;
$peoples=$xml->load("first.xml");
if(!$xml){
	$peoples=$xml->createElement("peoples");
	$xml->appendChild($peoples);
}
else
{
	$peoples=$xml->firstChild;
}

if($action=='add'){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $surname=$_POST['surname'];
  $age=$_POST['age'];
  $city=$_POST['city'];
  

$people=$xml->createElement("people");
$peoples->appendChild($people);

$i=$xml->createElement("id",$id);
$people->appendChild($i);

$n=$xml->createElement("name",$name);
$people->appendChild($n);

$s=$xml->createElement("surname",$surname);
$people->appendChild($s);

$a=$xml->createElement("age",$age);
$people->appendChild($a);

$c=$xml->createElement("city",$city);
$people->appendChild($c);

}
else if($action=='delete'){
	$id=$_POST['id'];
$peoples=$xml->getElementsByTagName("people");
foreach ($peoples as $people) {

	$ids=$people->getElementsByTagName("id");
 			$i=$ids->item(0)->nodeValue;
 			if($i==$id){
 				$ids->item(0)->parentNode->parentNode->removeChild($ids->item(0)->parentNode);
 			}
}
}
else if($action=='update'){
	 $id=$_POST['id'];
  $na=$_POST['name'];
  $sr=$_POST['surname'];
  $ag=$_POST['age'];
  $ci=$_POST['city'];
$peoples=$xml->getElementsByTagName("people");

foreach ($peoples as $people) {
 		$ids=$people->getElementsByTagName("id");
 			$i=$ids->item(0)->nodeValue;
 		$names=$people->getElementsByTagName("name");
 			$name=$names->item(0)->textContent;
 		$surnames=$people->getElementsByTagName("surname");
 			$surname=$surnames->item(0)->textContent;
 		$ages=$people->getElementsByTagName("age");
 			$age=$ages->item(0)->nodeValue;
 		$cities=$people->getElementsByTagName("city");
 			$city=$cities->item(0)->nodeValue;
 			if($i==$id){
 				$i="";
 				$name="";
 				$surname="";
 				$ages="";
 				$city="";
     $ids->item(0)->appendChild($ids->createTextNode($id));
     $names->item(0)->appendChild($names->createTextNode($na));
     $surnames->item(0)->appendChild($surnames->createTextNode($sr));
     $ages->item(0)->appendChild($ages->createTextNode($ag));
     $cities->item(0)->appendChild($cities->createTextNode($ci));

 			}
 		}
}
$xml->save("first.xml");
<?php
function dbcon(){
  $server='localhost';
	$user='root';
	$pass='1234';
	$dbname='findhouse';
	return new mysqli($server,$user,$pass,$dbname);
}
 $db = dbcon();
 $sqlstr="SELECT * FROM property";
 $query=$db->query($sqlstr);
 // echo "<pre>";var_export($query);exit();
 $result ['property'] = [];

 while ( $row = $query->fetch_assoc()) {
  //  echo "<pre>";var_export($row['Image']);exit();

  $result2['property_id'] = $row['property_id'];
  $result2['contact'] = $row['contact'];
  $result2['propertyname'] = $row['propertyname'];
  $result2['location'] = $row['location'];
  $result2['status'] = $row['status'];
  $result2['price'] = $row['price'];
  $result2['description'] = $row['description'];
  $result2['activation'] = $row['activation'];
  $result2['Image'] = "http://192.168.25.2:8181/FindHouse/".$row['Image'];
  array_push($result['property'],$result2);
 // 	array_push($result['property'], "http://192.168.25.2:8181/FindHouse/".$row['Image']);
 }
// header('Content-Type: application/json');
 // $test['users']= $result;
 echo json_encode($result);



//$con goes here
    // $result=$db->query("SELECT * FROM property");
    // $response["property"] = array();
    //
    //     while($row = $result->fetch_assoc())    {
    //
    //         $stuff= array();
    //
    //         /* ADD THE TABLE COLUMNS TO THE JSON OBJECT CONTENTS */
    //         $stuff["property_id"] = $row['property_id'];
    //         array_push($response["property"], $stuff);
    //
    //         // $response[] = $row;
    //     }
    //     // success
    //     $response["success"] = 1;
    //     echo(json_encode($response));
    //
    //
    // /* CLOSE THE CONNECTION */
    // mysqli_close($db);



?>

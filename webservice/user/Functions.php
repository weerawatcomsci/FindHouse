<?php
require_once 'DBOperations.php';
class Functions{
private $db;
public function __construct() {
      $this -> db = new DBOperations();
}

public function loginUser($email, $password) {
  $db = $this -> db;
  if (!empty($email) && !empty($password)) {
    if ($db -> checkUserExist($email)) {
       $result =  $db -> checkLogin($email, $password);
       if(!$result) {
        $response["result"] = "failure";
        $response["message"] = "Invaild Login Credentials";
        return json_encode($response);
       } else {
        $response["result"] = "success";
        $response["message"] = "Login Successful";
        $response["user"] = $result;
        return json_encode($response);
       }
    } else {
      $response["result"] = "failure";
      $response["message"] = "Invaild Login Credentials";
      return json_encode($response);
    }
  } else {
      return $this -> getMsgParamNotEmpty();
    }
}

public function isEmailValid($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}
public function getMsgParamNotEmpty(){
  $response["result"] = "failure";
  $response["message"] = "Parameters should not be empty !";
  return json_encode($response);
}
public function getMsgInvalidParam(){
  $response["result"] = "failure";
  $response["message"] = "Invalid Parameters";
  return json_encode($response);
}
public function getMsgInvalidEmail(){
  $response["result"] = "failure";
  $response["message"] = "Invalid Email";
  return json_encode($response);
}
}

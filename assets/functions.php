<?php
function set_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function set_password($password){
$options = ['cost' => 11,'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];
$password = password_hash($password, PASSWORD_BCRYPT, $options);
echo $password;
}
?>
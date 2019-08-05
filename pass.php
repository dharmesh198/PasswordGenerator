<?php
   // Original PHP code by Chirp Internet: www.chirp.com.au
   // Please acknowledge use of this code by including this header.

  function better_crypt($input, $rounds = 5)
  {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i=0; $i < 22; $i++) {
      $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return $salt;
  }
  
  $user_password = 'mytest!Q@W'; // This is the password entered by user
  
  echo "\nSalt ---> ".$blowfish_salt = better_crypt($user_password, 5); 
  echo "\nDb Salt ---> ".$db_blowfish_salt = sprintf('$2y$%02d$', 5) . $blowfish_salt; // Store in database
  echo "\nPass --->".$db_pass = crypt($user_password, $db_blowfish_salt); // Store in password field
  
  // Regenarate password and compare
  
  echo "\nRegenarate pass --->".$regen_pass = crypt($user_password, $db_blowfish_salt); // Password regenerated during login
  
  if($regen_pass == $db_pass) {
    echo "\n password is correct";
  }else{
	echo "\nPassword did not match";
  }
?>

<?php  

class User{

    private function email_exists($user, $dbcon){

        $email = $_POST['email'];

        $sql = "SELECT `email` FROM `users` WHERE `email`=?";
        $stmt = $dbcon->prepare($sql);

        if (is_object($stmt)) {
             $stmt->bindParam(1, $email, PDO::PARAM_STR);
             $stmt->execute();
             
             if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                 
                 return $row;
             }
               
        }
        return false;

    }
    public function check_old_password($password, $dbcon){
        $sql = "SELECT `password` FROM `users` WHERE `id`=?";
        $stmt = $dbcon->prepare($sql);

        if (is_object($stmt)) {
            $stmt->bindParam(1,$_SESSION['signed_in']['id'] ,PDO::PARAM_INT);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $dehashed_oldpass = password_verify($password,$row->password);
                return $dehashed_oldpass;
            }
            else{

                return false;
            }
        }
    }

    
	public function signup($user, $dbcon){

                $name = ucwords( $_POST['name']);
                $country =  ucwords($_POST['country']);
                $username =  $_POST['username'];
                $email = $_POST['email'];
                $password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                $cpassword = filter_var( $_POST['cpassword'], FILTER_SANITIZE_STRING);

           if (empty($name) || empty($country) || empty($username) || empty($email) || empty($password) || empty($cpassword)) {
                return "required_field";           
            }
            else if (!preg_match("/^[a-zA-Z][a-zA-Z\\s]+$/", $name)){
                return "inavlid_name";

            }
            else if (!preg_match("/^[a-zA-Z][a-zA-Z\\s]+$/", $country)){
                return "invalid_country";

            }
            else if (!preg_match("/^[a-zA-Z0-9.]+$/", $username)) {
                return "inavlid_username";

            }
            else if (strlen($username) < 4 ){
                return "username_length";

            }
            else if(!filter_var( $email,FILTER_VALIDATE_EMAIL)) {
                return  "not_valid";

            }  
            else if($this->email_exists($email, $dbcon)) {
                return "email_exists";

            }
            else if(($password !==  $cpassword)) {
                return "pass_not_match";

            }else if(strlen($password) < 4 || strlen($cpassword) < 4 ){
                return "pass_length";

            }else{         
                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                $vcode = generateCode();

                $sql= "INSERT INTO `users` (`name`, `country`, `username`, `email`, `password`, `vcode`) VALUES(?,?,?,?,?,?)";
                $stmt = $dbcon->prepare($sql);
                $stmt->bindParam(1, $name, PDO::PARAM_STR);
                $stmt->bindParam(2, $country, PDO::PARAM_STR);
                $stmt->bindParam(3, $username, PDO::PARAM_STR);
                $stmt->bindParam(4, $email, PDO::PARAM_STR);
                $stmt->bindParam(5, $hashed_pass, PDO::PARAM_STR);
                $stmt->bindParam(6, $vcode, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount()) {
                    return "success";
                }

            }
            return "error";
    }

    public function login($user, $dbcon){

               $email = $_POST['email'];
               $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            return 'required_field';

        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             
             return  "not_valid";

        }elseif(!$this->email_exists($email,$dbcon)){
                
                return "not_exists"; 

        }else{

            $sql ="SELECT * FROM users WHERE email=?";
            $stmt = $dbcon->prepare($sql);

            if(is_object($stmt)){
              $stmt->bindParam(1, $email, PDO::PARAM_STR);
              $stmt->execute();
              $row = $stmt->fetch(PDO::FETCH_OBJ);

              $de_hashed_pass = password_verify($password, $row->password);
               if($de_hashed_pass == $row->password){
                    $_SESSION['signed_in'] = [
                        'id'        => $row->id,
                        'name'      => $row->name,
                        'country'   => $row->country,
                        'username'  => $row->username,
                        'email'     => $row->email,
                        'joined_at' => $row->joined_at
                    ];

                    return 'success';

                }
                
            }
           return 'error';      
        }
        
    } 

    public function change_password($user, $dbcon){

               $oldpassword = $_POST['oldpassword'];
               $npassword   = $_POST['npassword'];
               $cpassword   = $_POST['cpassword'];

        if (empty($oldpassword) || empty($npassword) || empty($cpassword)) {
            return "required_field";

        }elseif (!$this->check_old_password($oldpassword, $dbcon)) {
            return "old_pass_not_match";

        }elseif ($npassword !== $cpassword){
            return "pass_not_match";
   
        }elseif (strlen($npassword) < 4 || strlen($cpassword) < 4 ) {
            return "pass_length";

        }else{
             
             $hashed_pass = password_hash($npassword, PASSWORD_DEFAULT);
             $sql = "UPDATE `users` SET `password`=? WHERE `id`=? ";
             $stmt= $dbcon->prepare($sql);
             
             if (is_object($stmt)) {     
                 $stmt->bindParam(1, $hashed_pass, PDO::PARAM_STR);
                 $stmt->bindParam(2, $_SESSION['signed_in']['id'], PDO::PARAM_INT);
                 $stmt->execute();

                 if ($stmt->rowCount() > 0 ) {
                    
                     return "success";
                 }
                
             }
              return "error";
        }
    }

    private function sendEmail($user){
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
          ->setUsername('80407410675335')
          ->setPassword('0668c6f4267147');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Password Recovery Request !!'))
          ->setFrom(['noreply@oursystem.com' => 'Our Login System'])
          ->setTo([$user->email])
          ->setBody(recoveryPasswordEmailMessage($user), 'text/html');

        // Send the message
        $result = $mailer->send($message);

        if ($result) {
             return true;
        }
        return false;


    }

    public function email_reset_password_link($user, $dbcon){

        $email = $_POST['email'];

        if(empty($email)) {
             return 'required_field';

        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             return  "not_valid";

        }elseif(!$this->email_exists($email,$dbcon)){  
                return "not_exists"; 

        }else{

            $sql = "SELECT * FROM `users` WHERE `email`=?";
            $stmt = $dbcon->prepare($sql);

            if (is_object($stmt)) {
               $stmt->bindParam(1, $email, PDO::PARAM_STR);
               $stmt->execute();

                 if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                    $send = $this->sendEmail($row);

                    if ($send){
                     return "success";
                   }
                   return "error";
                }

            }

        }

    }

    private function id_exists($user, $dbcon){
             
        $id = $_POST['id'];

        $sql = "SELECT `id` FROM `users` WHERE `id`=?";
        $stmt = $dbcon->prepare($sql);

        if (is_object($stmt)) {
             $stmt->bindParam(1, $id, PDO::PARAM_INT);
             $stmt->execute();
             
             if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                 
                 return true;
             }      
        }
        return false;
    }

    public function forgot_reset_password($user,$dbcon){

             //all form data recieved
             //-User is is valid
             //-code is valid
             //-new passsword and confirm password match

            $npassword   = $_POST['npassword'];
            $cpassword   = $_POST['cpassword'];

            if (empty($npassword) || empty($cpassword)) {
                return "required_field";

            }elseif ($npassword !== $cpassword){
                return "pass_not_match";
       
            }elseif (strlen($npassword) < 4 || strlen($cpassword) < 4 ) {
                return "pass_length";

            }elseif (!$this->id_exists($user, $dbcon)) {
                return "id_not_match";
                
            }elseif (!$this->code_exists($user, $dbcon)) {
                
                //-regenerate code
                //-get user info from database with update code
                //-use user info to send an email with updated code
                
               $this->regenerate_vcode($user, $dbcon); 

               $row = $this-> get_user_details($user, $dbcon);

               $this->sendEmail( $row );

               return "code_not_match";

           }else{

                 $hashed_pass = password_hash($npassword, PASSWORD_DEFAULT);
                 $vcode = generateCode(); 

                 $sql = "UPDATE `users` SET `password`=?, `vcode`=? WHERE `id`=? ";
                 $stmt= $dbcon->prepare($sql);
                 
                 if (is_object($stmt)) {  
                    $stmt->bindParam(1, $hashed_pass, PDO::PARAM_STR);
                    $stmt->bindParam(2, $vcode, PDO::PARAM_STR);
                    $stmt->bindParam(3, $user['id'], PDO::PARAM_INT);
                    $stmt->execute();

                     if ($stmt->rowCount()) {
                        
                         return "success";
                     }
                    
                 }
                return "error";
          }

    }
    private function get_user_details($user, $dbcon){
             
        $sql = "SELECT * FROM `users` WHERE `id`=?";
        $stmt = $dbcon->prepare($sql);

        if (is_object($stmt)) {
             $stmt->bindParam(1, $user['id'], PDO::PARAM_INT);
             $stmt->execute();
             
             if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                 
                 return $row;
             }      
        }
        return false;

    }
    private function regenerate_vcode($user, $dbcon){

        $sql = "UPDATE `users` SET `vcode`=?  WHERE `id`=?";
        $stmt = $dbcon->prepare($sql);

        $code = generateCode();

        if (is_object($stmt)) {
             $stmt->bindParam(1, $code, PDO::PARAM_STR);
             $stmt->bindParam(2, $user['id'], PDO::PARAM_INT);
             $stmt->execute();
             
             if ($stmt->rowCount()) {
                 return true;
             }      
        }
        return false;

    }   
    private function code_exists($user, $dbcon){

        $sql = "SELECT * FROM `users` WHERE `id`=?";
        $stmt = $dbcon->prepare($sql);

        if (is_object($stmt)) {
             $stmt->bindParam(1, $user['id'], PDO::PARAM_INT);
             $stmt->execute();
             
             if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                 
                 if ($user['code'] == $row->vcode) {

                     return true;
                 }
                
             }      
        }
        return false;

    }
   	
}

$user =  new User();

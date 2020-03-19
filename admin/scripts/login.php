<?php 

function login($username, $password, $ip){
    //debug 
    // sprintf enables you to use %s
    // $message = sprintf('you are tryin to login with username %s and password %s', $username, $password);
    $pdo = Database::getInstance()->getConnection();
    // check existence
    //prevent sql injection
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name= :username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username' => $username,
        )
    );

    if($user_set->fetchColumn()>0){
        // user exists
       $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
       $get_user_query .= ' AND user_pass = :password';
       $user_check = $pdo->prepare($get_user_query);
       $user_check->execute(
           array(
               ':username'=>$username,
               ':password'=>$password
           )
     );
     while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
         $id = $found_user['user_id'];
         //logged in

        $message = 'You just logged in';

        //specify info to be kept in the locker aka Session
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $found_user['user_fname'];

         //Todo: finish the following lines so that when user logged in
         // the user_ip column get updated by the $ip

         $update_query = 'UPDATE tbl_user SET user_ip = :ip WHERE user_id= :id';
         $update_set = $pdo->prepare($update_query);
         $update_set->execute(
             array(
                ':ip'=>$ip,
                ':id'=>$id
             )
             
         );
     }

     if(isset($id)){
         redirect_to('index.php');
     }

    }else{
        //user does not exist
        $message = 'User does not exist';
}
return $message;
}

function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('admin_login.php');
    }
}


// destroy session
function logout(){
    session_destroy();
    redirect_to('admin_login.php');
}

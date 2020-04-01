<?php

// this function will create a new user  in the db and send an email to the users email
function createUser($fname, $username, $email){
    $pdo = Database::getInstance()->getConnection();

    // check if the user exists already or not in the db
    $check_user_query = 'SELECT COUNT(user_name) AS num FROM tbl_user WHERE user_name = :username'; 
    $user_set = $pdo->prepare($check_user_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    $row = $user_set->fetch(PDO::FETCH_ASSOC);

    // if else statement to continue the create function or stop cause user is taken
    if($row['num'] > 0){

        $message = 'This username is already taken, try again using a another one!';

    }else{
    // Creating a password and sending out confirmation to the user that was created

    //creating a randmized password for user
    $password = md5(rand(0,1000));

    //sending the confirmation email to the email of the user 

    //phpmailer config
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    
    // defining the gmail accound used. PLEASE DONT STEAL MY ACCOUNT!:)
    $mail->Username='gv.user.create@gmail.com';
    $mail->Password='Wilson10'; 

    $mail->addAddress($email);
    $mail->setFrom('gv.user.create@gmail.com');
    
    // this is the email template that will send to new users
    $mail->isHTML(true);
    $mail->Subject='Welcome New User!'; 
    $mail->Body='
    Congrats, your new account has been made!<br><br>
    I hope you are as excited for this as much as I am!<br><br>
    Best,<br><br>
    Graham Vickers<br><br>
    <br><br><br>

    Here are your login credentials:<br><br>
    ------------------------<br>

    Email: '.$username.'<br><br>
    Password: '.$password.'<br><br>
    * Note: if you do not sign in with these credentials within 24 hours of recieving this email, your account will be deactivated
    ------------------------<br>
    To log in, please visit http://localhost:8010/admin/admin_login.php
    <br><br><br>
    ';
    
    // this will either send the email and create the user. Or stop cause the email could not be sent

    // if the mail wasnt sent render the message
    if(!$mail->send()){

        $message= $mail->ErrorInfo;
        return 'Sorry, but the user could not be created. Plase try again';
    }else{
        // this will run if the mail could be sent

        // this will create the user in the db
        $create_user_query = 'INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_ip, user_verif) VALUES (:fname, :username, :password, :email, "no", "0")';
        $create_user_set = $pdo->prepare($create_user_query);
        $create_user_set->execute(
            array(
                ':username'=>$username,
                ':password'=>$password,
                ':fname'=>$fname,
                ':email'=>$email
            )
        );

        // if everything ran right user will be rediirected back to the index
        redirect_to('index.php');
        $message = 'User successfuly created!';
    }  
  }
}

// this is pulling the user data to fill the edit user area 
function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id= :id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($get_user_result){
        return $get_user_set;
    }else{
        return 'user could not be updated';
    }
}

// this is for editing the user profile
function editUser($id, $fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    $update_user_query = "UPDATE tbl_user SET user_fname = :fname, user_name = :username, user_pass = :password, user_email = :email, user_verif = 1 WHERE user_id= :id";
    $update_user_set = $pdo->prepare($update_user_query);
    $get_user_result = $update_user_set->execute(
        array(
            ':id'=>$id,
            ':username'=>$username,
            ':password'=>$password,
            ':fname'=>$fname,
            ':email'=>$email
        )
    );

    if($get_user_result){
        redirect_to('index.php');
    }else{
        // user does not exist
        return 'User could not be updated, please try again';
    }
}

function getAllUsers(){
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = "SELECT * FROM tbl_user";
    $users = $pdo->query($get_user_query);

    if($users){
        return $users;
    }else{
        return false;
    }
}

function deleteUser($id){
    $pdo = Database::getInstance()->getConnection();

    $delete_user_query = "DELETE FROM tbl_user WHERE user_id = :id";
    $delete_user_set = $pdo->prepare($delete_user_query);
    $delete_user_result = $delete_user_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($delete_user_result && $delete_user_set->rowCount() > 0){
        redirect_to('admin_deleteUsers.php');
    }else{
        // user does not exist
        return false;
    }
}
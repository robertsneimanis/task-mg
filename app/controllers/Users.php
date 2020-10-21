<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Check for POST
      if(isset($_POST['login'])){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
          'register-name' => '',
          'register-email' => '',
          'register-password' => '',
          'register-confirm_password' => '',
          'register-name_err' => '',
          'register-email_err' => '',
          'register-password_err' => '',
          'register-confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/index', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/index', $data);
        }


        // register start here ===============================================================================
      } if(isset($_POST['register'])){
        // die('register was pressed')
        // Process form

        print_r($_POST);
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[        
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
          'register-name' => trim($_POST['register-name']),
          'register-email' => trim($_POST['register-email']),
          'register-password' => trim($_POST['register-password']),
          'register-confirm_password' => trim($_POST['register-confirm_password']),
          'register-name_err' => '',
          'register-email_err' => '',
          'register-password_err' => '',
          'register-confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['register-email'])){
          $data['register-email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['register-email'])){
            $data['register-email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['register-name'])){
          $data['register-name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['register-password'])){
          $data['register-password_err'] = 'Pleae enter password';
        } elseif(strlen($data['register-password']) < 6){
          $data['register-password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['register-confirm_password'])){
          $data['register-confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['register-password'] != $data['register-confirm_password']){
            $data['register-confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['register-email_err']) && empty($data['register-name_err']) && empty($data['register-password_err']) && empty($data['register-confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['register-password'] = password_hash($data['register-password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in');
            redirect('users/index');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/index', $data);
        }

        // register end =======================================================================

      } else {
        // Init data
        $data =[
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
          'register-name' => '',
          'register-email' => '',
          'register-password' => '',
          'register-confirm_password' => '',
          'register-name_err' => '',
          'register-email_err' => '',
          'register-password_err' => '',
          'register-confirm_password_err' => ''        
        ];

        // Load view
        $this->view('users/index', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('posts');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/index');
    }
  }

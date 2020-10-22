<?php
  class Attributes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->attributeModel = $this->model('Attribute');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get attributes
      $attributes = $this->attributeModel->getAttributes($_SESSION['user_id']);

      $data = [
        'attributes' => $attributes
      ];

      $this->view('attributes/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter attribute title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter attribute value';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validated
          if($this->attributeModel->addAttribute($data)){
            flash('attribute_message', 'Attribute Added');
            redirect('attributes');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('attributes/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'body' => ''
        ];
  
        $this->view('attributes/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validated
          if($this->attributeModel->updateAttribute($data)){
            flash('attribute_message', 'Attribute Updated');
            redirect('attributes');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('attributes/edit', $data);
        }

      } else {
        // Get existing attribute from model
        $attribute = $this->attributeModel->getAttributeById($id);

        // Check for owner
        if($attribute->user_id != $_SESSION['user_id']){
          redirect('attributes');
        }

        $data = [
          'id' => $id,
          'title' => $attribute->title,
          'body' => $attribute->body
        ];
  
        $this->view('attributes/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing attribute from model
        $attribute = $this->attributeModel->getAttributeById($id);
        
        // Check for owner
        if($attribute->user_id != $_SESSION['user_id']){
          redirect('attributes');
        }

        if($this->attributeModel->deleteAttribute($id)){
          flash('attribute_message', 'Attribute Removed');
          redirect('attributes');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('attributes');
      }
    }
  }
<?php
  class Attributes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/index');
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
          'attribute' => trim($_POST['attribute']),
          'value' => trim($_POST['value']),
          'user_id' => $_SESSION['user_id'],
          'attribute_err' => '',
          'value_err' => ''
        ];

        // Validate data
        if(empty($data['attribute'])){
          $data['attribute_err'] = 'Please enter attribute';
        }
        if(empty($data['value'])){
          $data['value_err'] = 'Please enter attribute value';
        }

        // Make sure no errors
        if(empty($data['attribute_err']) && empty($data['value_err'])){
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
          'attribute' => '',
          'value' => ''
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
          'attribute' => trim($_POST['attribute']),
          'value' => trim($_POST['value']),
          'user_id' => $_SESSION['user_id'],
          'attribute_err' => '',
          'value_err' => ''
        ];

        // Validate data
        if(empty($data['attribute'])){
          $data['attribute_err'] = 'Please enter attribute';
        }
        if(empty($data['value'])){
          $data['value_err'] = 'Please enter value text';
        }

        // Make sure no errors
        if(empty($data['attribute_err']) && empty($data['value_err'])){
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
          'attribute' => $attribute->attribute,
          'value' => $attribute->value
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
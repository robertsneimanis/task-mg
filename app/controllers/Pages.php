<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('attributes');
      }

      $data = [
        'title' => 'Magebit',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share attributes with other users'
      ];

      $this->view('pages/about', $data);
    }
  }
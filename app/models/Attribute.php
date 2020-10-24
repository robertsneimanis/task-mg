<?php
  class Attribute {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getAttributes($user_id){
      $this->db->query('SELECT * FROM attributes WHERE user_id = :user_id');
      $this->db->bind(':user_id', $user_id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function addAttribute($data){
      $this->db->query('INSERT INTO attributes (attribute, user_id, value) VALUES(:attribute, :user_id, :value)');
      // Bind values
      $this->db->bind(':attribute', $data['attribute']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':value', $data['value']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateAttribute($data){
      $this->db->query('UPDATE attributes SET attribute = :attribute, value = :value WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':attribute', $data['attribute']);
      $this->db->bind(':value', $data['value']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAttributeById($id){
      $this->db->query('SELECT * FROM attributes WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteAttribute($id){
      $this->db->query('DELETE FROM attributes WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
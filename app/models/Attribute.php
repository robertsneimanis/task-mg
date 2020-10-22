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
      $this->db->query('INSERT INTO attributes (title, user_id, body) VALUES(:title, :user_id, :body)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateAttribute($data){
      $this->db->query('UPDATE attributes SET title = :title, body = :body WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

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
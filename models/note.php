<?php
class Note {
  private $db;

  private $id;
  private $title;
  private $content;

  function __construct() {
    $this->db = Database::connect();
  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getContent() {
    return $this->content;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setTitle($title) {
    $this->title = $this->db->escape_string($title);
  }

  public function setContent($content) {
    $this->content = $this->db->escape_string($content);
  }

  public function getAll() {
    $query = "SELECT * FROM note WHERE hidden = 0 ORDER BY id DESC";
    $notes = $this->db->query($query);
    return $notes;
  }

  public function save() {
    $query = "INSERT INTO note (title, content) VALUES ('{$this->getTitle()}', '{$this->getContent()}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function update() {
    $query = "UPDATE note SET title = '{$this->getTitle()}', content = '{$this->getContent()}' WHERE id = {$this->getId()}";
    $update = $this->db->query($query);
    $result = false;
    if ($update) {
      $result = true;
    }
    return $result;
  }

  public function delete() {
    $query = "UPDATE note SET hidden = 1 WHERE id = {$this->getId()}";
    // $query = "DELETE FROM note WHERE id = {$this->getId()}";
    $delete = $this->db->query($query);
    $result = false;
    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
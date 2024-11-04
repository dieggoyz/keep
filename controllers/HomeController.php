<?php
require_once('models/note.php');

class HomeController {
  public function index() {
    $note = new Note();
    $notes = $note->getAll();
    require_once('views/home/general.php');
  }

  public function addNote() {
    if (isset($_POST) && !empty($_POST)) {
      $title = $_POST['title'] ? Utils::clean($_POST['title']) : false;
      $content = $_POST['content'] ? Utils::clean($_POST['content']) : false;

      if ($title || $content) {
        $note = new Note();
        $note->setTitle($title);
        $note->setContent($content);
        $note->save();
      }
    }
    header('Location:' . APP_URL);
  }

  public function update() {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      $note = new Note();
      $id = $_GET['id'];
      $note->setId($id);
      $note->setTitle(Utils::clean($_POST['title']));
      $note->setContent(Utils::clean($_POST['content']));
      $note->update();
    }
    header('Location:' . APP_URL);
  }

  public function delete() {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      $note = new Note();
      $id = $_GET['id'];
      $note->setId($id);
      $note->delete();
    }
    header('Location:' . APP_URL);
  }
}

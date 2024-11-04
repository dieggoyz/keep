<?php
class errorController {
  public function forbidden() {
    require_once('views/errors/403.php');
  }

  public function notFound() {
    require_once('views/errors/404.php');
  }
}

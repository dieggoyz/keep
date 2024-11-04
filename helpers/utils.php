<?php
class Utils {
  public static function isLogged() {
    if (!isset($_SESSION['logged'])) {
      header('Location:' . APP_URL . 'account/login');
    } else {
      return true;
    }
  }

  public static function isAdmin() {
    if (!isset($_SESSION['admin'])) {
      header('Location:' . APP_URL);
    } else {
      return true;
    }
  }

  public static function clean($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
  }

  // Convierte un datetime a una fecha generica
  public static function date($date) {
    $date = substr($date, 0, 10);
    $day = date('d', strtotime($date));
    $month = date('m', strtotime($date));
    $year = date('Y', strtotime($date));
    return $day . "/". $month . "/" . $year;
  }

  // Obtener el valor pasado previamente por un formulario
  public static function old($field) {
    if (isset($_POST[$field])) {
      return $_POST[$field];
    }
  }

  public static function routeIs($route) {
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, $route) !== false) { 
      return 'active';
    }
  }

  // Mostrar error por defecto (#404)
  public static function showError() {
    $error = new errorController();
    $error->notFound();
  }

  // Definir el título de la página por un script - si encuentro como hacer esta wea mejor cambiarlo porque la wea rancia xdd
  public static function title($title) {
    echo '<script>document.title = "' . $title . ' | ' . APP_NAME .'"</script>';
  }

  public static function uploadImage($file, $path) {
    $result = false;
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    // $file_size = $file['size'];
    $file_error = $file['error'];
    // $file_type = $file['type'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($file_ext, $allowed)) {
      if ($file_error === 0) {
        if (!is_dir($path)) { mkdir($path, 0777, true); }
        $date = new Datetime();
        $name = $date->format('YmdHisv');
        $file_name_new = $name . "." . $file_ext;
        $file_destination = $path . $file_name_new;
        if (move_uploaded_file($file_tmp, $file_destination)) { $result = $file_name_new; }
      }
    }
    return $result;
  }
}

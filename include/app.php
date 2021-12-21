<?php
class App {
    public $db;
    public function Run($config) {
        $this->db = new DB($config['db']);

        if (!$this->db->IsConnect()) {
            include('views/header.php');
            $error = $this->db->Error();
            include('views/errors.php');
            include('views/footer.php');
            return;
        }

        $path = explode('?', $_SERVER['REQUEST_URI'])[0];
        $path = str_replace('..', '', $path);
        $path = substr($path,strlen($config['basepath'])+1);
        if (!$path) $path = 'home';
        $file = 'views/pages/'.$path.'.php';
        if (is_file($file)) {
            include($file);
        } else {
            include('views/header.php');
            $error = 'Not found';
            include('views/errors.php');
            include('views/footer.php');
        }
    }
}

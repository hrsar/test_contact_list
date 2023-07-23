<?
    require_once 'models/ContactModel.php';
    require_once 'controllers/ContactController.php';
    $model = new ContactModel();
    $controller = new ContactController($model);
    if(isset($_POST['data'])) {
        if ($_POST['action'] === 'add') {
            $data = json_decode($_POST['data'], true);
            
        } else if ($_POST['action'] === 'del') {
            $data = $_POST['data'];
        }
        $res = $controller->handleRequest($_POST['action'], $data);
        exit($res);
    }
?>
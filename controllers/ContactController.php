<?php
class ContactController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function handleRequest($action, $data)
    {
        if ($action === 'add') {
            $res = $this->model->addContact($data);
        } else if ($action === 'del') {
            $res = $this->model->deleteContact($data);
        }
        return $res;
    }
    public function getAllList() 
    {
        $contacts = $this->model->getAllContacts();
        return  $contacts;
    }
}
?>
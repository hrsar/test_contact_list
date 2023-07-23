<?php
class ContactModel // run the commented code for create table on your DB (run only one time)
{
    private $pdo;
    private $host = '127.0.0.1';
    private $dbname = 'contacts';
    private $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public function __construct()
    {
        
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", 'root', '',$this->opt);
        // $sql = "
        // CREATE TABLE contact_list (
        //     id INT AUTO_INCREMENT PRIMARY KEY,
        //     name VARCHAR(255) NOT NULL,
        //     phone VARCHAR(20) NOT NULL
        // )
        // ";
        // $this->pdo->exec($sql);
         
    }

    public function addContact($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `contact_list` (name, phone) VALUES (?, ?)");
        $result =  $stmt->execute([$data['name'], $data['phone']]);
        if($result) {
            $lastInsertedId = $this->pdo->lastInsertId();
            return $lastInsertedId;
        } else {
            return false;
        }
    }

    public function getAllContacts()
    {
        $stmt = $this->pdo->query("SELECT * FROM `contact_list` ORDER BY `id` DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteContact($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `contact_list` WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

?>
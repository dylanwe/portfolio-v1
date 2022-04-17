<?php
class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $dbConnection;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'portfolio';
        $this->username = 'root';
        $this->password = 'root';
    }

    public function connect()
    {
        $this->dbConnection = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8","$this->username","$this->password");
        return $this;
        mysqli_set_charset($this->dbConnection, 'utf8mb4');
    }

    public function getTable(string $tableName)
    {
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("SELECT * FROM $tableName;");
        $exe->execute();
        $table = $exe->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function getPublishedProjects()
    {
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("SELECT * FROM content WHERE published='1';");
        $exe->execute();
        $table = $exe->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function newPage()
    {
        $title = 'new page ' . date('d-m-Y');
        $url = strtolower(str_replace(' ', '-',trim($title)));
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("INSERT INTO `content` (`id`, `url`, `title`, `project_type`, `description`, `project_img`, `content`, `author`, `date`, `featured`, `published`) VALUES (NULL, '$url', '$title', '', 'Korte beschrijving van het project en wat het doet.', '', '', 'Dylan Weijgertze', CURRENT_TIMESTAMP, '0', '0');");
        $exe->execute();
    }

    public function getFeatured()
    {
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("SELECT * FROM content WHERE featured='1';");
        $exe->execute();
        $table = $exe->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function getPage(string $url)
    {
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("SELECT * FROM content WHERE `url`='$url';");
        $exe->execute();
        $table = $exe->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function getTitles()
    {
        $db = $this->connect()->dbConnection;
        $exe = $db->prepare("SELECT title, `url`, `published` FROM content;");
        $exe->execute();
        $titles = $exe->fetchAll(PDO::FETCH_ASSOC);
        return $titles;
    }

    public function updatePage(string $id, string $content)
    {
        $content = json_encode($content);
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET `content`=$content WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function updateCtTitle(string $id, string $title, string $url)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET title='$title', `url`='$url' WHERE id='$id';";
        $db->prepare($sql)->execute();
        header("Location: https://dylanwe.com/edit/$url");
    }

    public function updateCtHeader(string $id, string $img)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET project_img='$img' WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function updateCtType(string $id, string $projectType)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET project_type='$projectType' WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function updateCtDescription(string $id, string $description)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET description='$description' WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function updateCtPublished(string $id, string $bool)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET published='$bool' WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function updateCtFeatured(string $id, string $bool)
    {
        $db = $this->connect()->dbConnection;
        $sql = "UPDATE content SET featured='$bool' WHERE id='$id';";
        $db->prepare($sql)->execute();
    }

    public function deletePage(string $id)
    {
        $db = $this->connect()->dbConnection;
        $sql = "DELETE FROM content WHERE id='$id';";
        $db->prepare($sql)->execute();
    }
}

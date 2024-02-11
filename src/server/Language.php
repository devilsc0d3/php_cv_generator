<?php

new Language();


class Language
{
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet_php;charset=utf8', 'root', '');
    }

    public function addLanguage($name)
    {
        $insert = $this->bdd->prepare('INSERT INTO language(name) value (?)');
        $insert->execute(array($name));
    }

    public function deleteLanguage($id)
    {
        $deleteLanguage = $this->bdd->prepare('DELETE FROM language WHERE id = ?');
        $deleteLanguage->execute(array($id));
    }

    public function updateLanguage($id, $name)
    {
        $updateLanguage = $this->bdd->prepare('UPDATE language SET name = ? WHERE id = ?');
        $updateLanguage->execute(array($name, $id));
    }

    public function getLanguage()
    {
        $getLanguage = $this->bdd->query('SELECT * FROM language');
        return $getLanguage->fetchAll();
    }
}
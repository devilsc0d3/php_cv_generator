<?php

$Language = new Language();
class Language
{
    public array $pageRegister;
    public array $pageLogin;
    public array $pagePasswordForget;
    public array $pageHome;
    public array $pageAdmin;
    public array $pageProfile;
    public array $page404;
    public array $pageTemplate;

    function __construct()
    {
        $this->french();
    }

    function english()
    {
        $this->englishLogin();
        $this->englishRegister();
        $this->englishPasswordForget();
        $this->english404();
    }

    function french()
    {
        $this->frenchLogin();
        $this->frenchRegister();
        $this->frenchPasswordForget();
        $this->french404();
    }

    function frenchLogin() {
        $this->pageLogin = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "login" => "Connexion",
            "password" => "Mot de passe",
            "register" => "Inscription",
            "nickname" => "Pseudo",
            "submit" => "Envoyer",
            "forgot" => "Mot de passe oublié ?",
            "error" => "Erreur",
            "create_account" => "Créer un compte maintenant !");
    }

    function englishLogin() {
        $this->pageLogin = array(
            "lang" => "en",
            "title" => "CVifyPHP",
            "login" => "Login",
            "password" => "Password",
            "register" => "Register",
            "nickname" => "Nickname",
            "submit" => "Send",
            "forgot" => "Password forget ?",
            "error" => "Error",
            "create_account" => "Create account now !");
    }

    function frenchRegister()
    {
        $this->pageRegister = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "register" => "Inscription",
            "nickname" => "Pseudo",
            "email" => "Email",
            "password" => "Mot de passe",
            "submit" => "Envoyer",
            "already_account" => "Vous avez déjà un compte ?");
    }

    function englishRegister()
    {
        $this->pageRegister = array(
            "lang" => "en",
            "title" => "CVifyPHP",
            "register" => "Register",
            "nickname" => "Nickname",
            "email" => "Email",
            "password" => "Password",
            "submit" => "Send",
            "already_account" => "Do you already have an account ?");
    }

    function frenchPasswordForget()
    {
        $this->pagePasswordForget = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "new_password" => "Nouveau mot de passe",
            "password_forget" => "Mot de passe oublié",
            "email" => "Email",
            "nickname" => "Pseudo",
            "submit" => "Envoyer",
            "already_account" => "Vous avez déjà un compte ?");
    }

    function englishPasswordForget()
    {
        $this->pagePasswordForget = array(
            "lang" => "en",
            "title" => "CVifyPHP",
            "new_password" => "New password",
            "password_forget" => "Password forget",
            "email" => "Email",
            "nickname" => "Nickname",
            "submit" => "Send",
            "already_account" => "Do you already have an account ?");
    }

    function french404() {
        $this->page404 = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "error" => "Erreur 404",
            "return" => "Retourner à la page d'accueil");
    }

    function english404() {
        $this->page404 = array(
            "lang" => "en",
            "title" => "CVifyPHP",
            "error" => "Error 404",
            "return" => "Return to home page");
    }
}
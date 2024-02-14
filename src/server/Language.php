<?php

$Language = new Language("en");

$pageLoginEn = array(
    "title" => "Login",
    "login" => "Login",
    "password" => "Password",
    "register" => "Register",
    "forgot" => "Forgot password",
    "error" => "Error",
    "empty" => "Empty fields",
    "errorLogin" => "Error login",
    "errorPassword" => "Error password",
    "errorEmail" => "Error email",
    "errorRegister" => "Error register",
    "errorForgot" => "Error forgot",
    "errorEmpty" => "Error empty",
    "errorEmailExist" => "Error email exist",
    "errorEmailNotExist" => "Error email not exist",
    "errorPasswordNotMatch" => "Error password not match");

class Language
{
    public $pageRegister;
    public $pageLogin;
    public $pagePasswordForget;
    public $pageHome;
    public $pageAdmin;
    public $pageProfile;
    public $page404;
    public $pageTemplate;

    function french()
    {
        $this->pageLogin = $pageLoginFr = array(
            "title" => "Connexion",
            "login" => "Connexion",
            "password" => "Mot de passe",
            "register" => "Inscription",
            "forgot" => "Mot de passe oublié",
            "error" => "Erreur",
            "empty" => "Champs vides",
            "errorLogin" => "Erreur de connexion",
            "errorPassword" => "Erreur de mot de passe",
            "errorEmail" => "Erreur d'email",
            "errorRegister" => "Erreur d'inscription",
            "errorForgot" => "Erreur de mot de passe oublié",
            "errorEmpty" => "Erreur de champs vides",
            "errorEmailExist" => "Erreur d'email existant",
            "errorEmailNotExist" => "Erreur d'email inexistant",
            "errorPasswordNotMatch" => "Erreur de mot de passe non correspondant");
        $this->pageRegister = $pageRegisterFr = array(
            "title" => "Inscription",
            "login" => "Connexion",
            "password" => "Mot de passe",
            "register" => "Inscription",
            "forgot" => "Mot de passe oublié",
            "error" => "Erreur",
            "empty" => "Champs vides",
            "errorLogin" => "Erreur de connexion",
            "errorPassword" => "Erreur de mot de passe",
            "errorEmail" => "Erreur d'email",
            "errorRegister" => "Erreur d'inscription",
            "errorForgot" => "Erreur de mot de passe oublié",
            "errorEmpty" => "Erreur de champs vides",
            "errorEmailExist" => "Erreur d'email existant",
            "errorEmailNotExist" => "Erreur d'email inexistant",
            "errorPasswordNotMatch" => "Erreur de mot de passe non correspondant");
        $this->pagePasswordForget = $pagePasswordForgetFr = array(
            "title" => "Mot de passe oublié",
            "login" => "Connexion",
            "password" => "Mot de passe",
            "register" => "Inscription",
            "forgot" => "Mot de passe oublié",
            "error" => "Erreur",
            "empty" => "Champs vides",
            "errorLogin" => "Erreur de connexion",
            "errorPassword" => "Erreur de mot de passe",
            "errorEmail" => "Erreur d'email",
            "errorRegister" => "Erreur d'inscription",
            "errorForgot" => "Erreur de mot de passe oublié",
            "errorEmpty" => "Erreur de champs vides",
            "errorEmailExist" => "Erreur d'email existant",
            "errorEmailNotExist" => "Erreur d'email inexistant",
            "errorPasswordNotMatch" => "Erreur de mot de passe non correspondant");
    }
}
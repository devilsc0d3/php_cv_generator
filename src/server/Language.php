<?php

$Language = new Language();


if(isset($_POST['submit'])) {
    if(isset($_POST['lang'])) {
        $_SESSION['lang'] = $_POST['lang'];
      $Language->changeLanguage($_POST['lang']);
    }
}

class Language
{
    public array $pageRegister;
    public array $pageLogin;
    public array $pagePasswordForget;
    public array $pageHome;
    public array $pageProfile;
    public array $page404;

    function __construct()
    {
        if(isset($_SESSION['lang'])) {
            $lang = $_SESSION['lang'];
            $this->changeLanguage($lang);
        } else {
            $this->english();
        }
    }

    function changeLanguage($lang) {
        $this->$lang();
    }

    function english()
    {
        $this->englishLogin();
        $this->englishRegister();
        $this->englishPasswordForget();
        $this->english404();
        $this->englishHome();
        $this->englishProfile();
    }

    function french()
    {
        $this->frenchLogin();
        $this->frenchRegister();
        $this->frenchPasswordForget();
        $this->french404();
        $this->frenchHome();
        $this->frenchProfile();
    }

    function spanish() {
        $this->LoginSpanish();
        $this->registerSpanish();
        $this->passwordForgetSpanish();
        $this->errorSpanish();
        $this->homeSpanish();
        $this->profileSpanish();
    }

    function german() {
        $this->loginGerman();
        $this->registerGerman();
        $this->passwordForgetGerman();
        $this->errorGerman();
        $this->homeGerman();
        $this->profileGerman();
    }

    function russian() {
        $this->loginRussian();
        $this->registerRussian();
        $this->passwordForgetRussian();
        $this->errorRussian();
        $this->homeRussian();
        $this->profileRussian();
    }

    function chinese() {
        $this->loginChinese();
        $this->registerChinese();
        $this->passwordForgetChinese();
        $this->errorChinese();
        $this->homeChinese();
        $this->profileChinese();
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

    function englishHome() {
        $this->pageHome = array(
            "lang" => "en",
            "hi" => "Hello ",
            "title" => "CVifyPHP",
            "home" => "Home",
            "share" => "Share",
            "submit" => "Send",
            "preset name" => "name of the preset",
            "del" => "Delete",
            "logout" => "Logout",
            "login" => "Login",
            "register" => "Register",
            "admin" => "Admin",
            "delete" => "Delete account",
            "credit" => "By Fauré Léo",
            "profile" => "Profiles",
            "template" => "CV Template",
            "convert" => "Convert to PDF");
    }

    function frenchHome() {
        $this->pageHome = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "home" => "Accueil",
            "share" => "Partager",
            "submit" => "Envoyer",
            "preset name" => "Nom du preset",
            "hi" => "Bonjour ",
            "del" => "Supprimer",
            "logout" => "Déconnexion",
            "login" => "Connexion",
            "register" => "Inscription",
            "admin" => "Admin",
            "delete" => "Supprimer le compte",
            "credit" => "Par Fauré Léo",
            "profile" => "Profils",
            "template" => "Modèle de CV",
            "convert" => "Convertir en PDF");
    }

    function englishProfile() {
        $this->pageProfile = array(
            "lang" => "en",
            "title" => "CVifyPHP",
            "new_cv" => "Create new CV",
            "general" => "General",
            "last_name" => "last name",
            "first_name" => "first name",
            "address" => "address",
            "phone" => "phone",
            "email" => "email",
            "birth" => "date of birth",
            "license" => "License of ride",
            "send" => "Send",
            "photo" => "Photo",
            "upload" => "Upload",
            "delete" => "delete",
            "edit" => "edit",
            "education" => "Education",
            "description" => "Description...",
            "date_begin" => "Date begin",
            "date_end" => "Date end",
            "name establishment" => "Name of the establishment",
            "hobbies" => "Hobbies",
            "experience_pro" => "Professional experience",
            "name company" => "Name of the company",
            "name job" => "Name of the job",
            "back" => "Back to home page");
    }

    function frenchProfile() {
        $this->pageProfile = array(
            "lang" => "fr",
            "title" => "CVifyPHP",
            "new_cv" => "Créer un nouveau CV",
            "general" => "Général",
            "last_name" => "nom de famille",
            "first_name" => "prénom",
            "address" => "adresse",
            "phone" => "téléphone",
            "email" => "email",
            "birth" => "date de naissance",
            "license" => "Permis de conduire",
            "send" => "Envoyer",
            "photo" => "Photo",
            "upload" => "Télécharger",
            "delete" => "supprimer",
            "edit" => "modifier",
            "education" => "Formation",
            "description" => "Description...",
            "date_begin" => "Date début",
            "date_end" => "Date fin",
            "name establishment" => "Nom de l'établissement",
            "hobbies" => "Loisirs",
            "experience_pro" => "Expérience professionnelle",
            "name company" => "Nom de l'entreprise",
            "name job" => "Nom du poste",
            "back" => "Retour à l'accueil");
    }

    function loginSpanish() {
        $this->pageLogin = array(
            "lang" => "es",
            "title" => "CVifyPHP",
            "login" => "Iniciar sesión",
            "password" => "Contraseña",
            "register" => "Registro",
            "nickname" => "Apodo",
            "submit" => "Enviar",
            "forgot" => "¿Olvidaste tu contraseña?",
            "error" => "Error",
            "create_account" => "¡Crea una cuenta ahora!");
    }

    function loginGerman() {
        $this->pageLogin = array(
            "lang" => "de",
            "title" => "CVifyPHP",
            "login" => "Anmeldung",
            "password" => "Passwort",
            "register" => "Registrieren",
            "nickname" => "Spitzname",
            "submit" => "Senden",
            "forgot" => "Passwort vergessen?",
            "error" => "Fehler",
            "create_account" => "Erstellen Sie jetzt ein Konto!");
    }

    function loginRussian() {
        $this->pageLogin = array(
            "lang" => "ru",
            "title" => "CVifyPHP",
            "login" => "Авторизоваться",
            "password" => "пароль",
            "register" => "регистр",
            "nickname" => "псевдоним",
            "submit" => "послать",
            "forgot" => "Забыли пароль?",
            "error" => "ошибка",
            "create_account" => "Создайте аккаунт сейчас!");
    }

    function loginChinese() {
        $this->pageLogin = array(
            "lang" => "zh",
            "title" => "CVifyPHP",
            "login" => "登录",
            "password" => "密码",
            "register" => "寄存器",
            "nickname" => "绰号",
            "submit" => "发送",
            "forgot" => "忘记密码？",
            "error" => "错误",
            "create_account" => "现在创建帐户！");
    }

    function registerSpanish() {
        $this->pageRegister = array(
            "lang" => "es",
            "title" => "CVifyPHP",
            "register" => "Registro",
            "nickname" => "Apodo",
            "email" => "Correo electrónico",
            "password" => "Contraseña",
            "submit" => "Enviar",
            "already_account" => "¿Ya tienes una cuenta?");
    }

    function registerGerman() {
        $this->pageRegister = array(
            "lang" => "de",
            "title" => "CVifyPHP",
            "register" => "Registrieren",
            "nickname" => "Spitzname",
            "email" => "Email",
            "password" => "Passwort",
            "submit" => "Senden",
            "already_account" => "Haben Sie bereits ein Konto?");
    }

    function registerRussian() {
        $this->pageRegister = array(
            "lang" => "ru",
            "title" => "CVifyPHP",
            "register" => "регистр",
            "nickname" => "псевдоним",
            "email" => "электронное письмо",
            "password" => "пароль",
            "submit" => "послать",
            "already_account" => "У вас уже есть аккаунт?");
    }

    function registerChinese() {
        $this->pageRegister = array(
            "lang" => "zh",
            "title" => "CVifyPHP",
            "register" => "寄存器",
            "nickname" => "绰号",
            "email" => "电子邮件",
            "password" => "密码",
            "submit" => "发送",
            "already_account" => "你已经有一个帐户了吗？");
    }

    function passwordForgetSpanish() {
        $this->pagePasswordForget = array(
            "lang" => "es",
            "title" => "CVifyPHP",
            "new_password" => "Nueva contraseña",
            "password_forget" => "Contraseña olvidada",
            "email" => "Correo electrónico",
            "nickname" => "Apodo",
            "submit" => "Enviar",
            "already_account" => "¿Ya tienes una cuenta?");
    }

    function passwordForgetGerman() {
        $this->pagePasswordForget = array(
            "lang" => "de",
            "title" => "CVifyPHP",
            "new_password" => "Neues Passwort",
            "password_forget" => "Passwort vergessen",
            "email" => "Email",
            "nickname" => "Spitzname",
            "submit" => "Senden",
            "already_account" => "Haben Sie bereits ein Konto?");
    }

    function passwordForgetRussian() {
        $this->pagePasswordForget = array(
            "lang" => "ru",
            "title" => "CVifyPHP",
            "new_password" => "новый пароль",
            "password_forget" => "забытый пароль",
            "email" => "электронное письмо",
            "nickname" => "псевдоним",
            "submit" => "послать",
            "already_account" => "У вас уже есть аккаунт?");
    }

    function passwordForgetChinese() {
        $this->pagePasswordForget = array(
            "lang" => "zh",
            "title" => "CVifyPHP",
            "new_password" => "新密码",
            "password_forget" => "忘记密码",
            "email" => "电子邮件",
            "nickname" => "绰号",
            "submit" => "发送",
            "already_account" => "你已经有一个帐户了吗？");
    }

    function homeSpanish() {
        $this->pageHome = array(
            "lang" => "es",
            "hi" => "Hola ",
            "title" => "CVifyPHP",
            "home" => "Casa",
            "share" => "Compartir",
            "submit" => "Enviar",
            "preset name" => "nombre del preset",
            "del" => "Eliminar",
            "logout" => "Cerrar sesión",
            "login" => "Iniciar sesión",
            "register" => "Registro",
            "admin" => "Administración",
            "delete" => "Eliminar cuenta",
            "credit" => "Por Fauré Léo",
            "profile" => "Perfiles",
            "template" => "Plantilla de CV",
            "convert" => "Convertir a PDF");
    }

    function homeGerman() {
        $this->pageHome = array(
            "lang" => "de",
            "hi" => "Hallo ",
            "title" => "CVifyPHP",
            "home" => "Zuhause",
            "share" => "Aktie",
            "submit" => "Senden",
            "preset name" => "Name des Voreinstellung",
            "del" => "Löschen",
            "logout" => "Ausloggen",
            "login" => "Anmeldung",
            "register" => "Registrieren",
            "admin" => "Verwaltung",
            "delete" => "Konto löschen",
            "credit" => "Von Fauré Léo",
            "profile" => "Profile",
            "template" => "Lebenslaufvorlage",
            "convert" => "In PDF konvertieren");
    }

    function homeRussian() {
        $this->pageHome = array(
            "lang" => "ru",
            "hi" => "Привет ",
            "title" => "CVifyPHP",
            "home" => "Дом",
            "share" => "Поделиться",
            "submit" => "послать",
            "preset name" => "имя пресета",
            "del" => "удалять",
            "logout" => "выйти",
            "login" => "Авторизоваться",
            "register" => "регистр",
            "admin" => "администратор",
            "delete" => "удалить аккаунт",
            "credit" => "От Fauré Léo",
            "profile" => "профили",
            "template" => "шаблон резюме",
            "convert" => "конвертировать в PDF");
    }

    function homeChinese() {
        $this->pageHome = array(
            "lang" => "zh",
            "hi" => "你好 ",
            "title" => "CVifyPHP",
            "home" => "家",
            "share" => "分享",
            "submit" => "发送",
            "preset name" => "预设名称",
            "del" => "删除",
            "logout" => "登出",
            "login" => "登录",
            "register" => "寄存器",
            "admin" => "管理",
            "delete" => "删除帐户",
            "credit" => "由Fauré Léo",
            "profile" => "轮廓",
            "template" => "简历模板",
            "convert" => "转换为PDF");
    }

    function profileSpanish() {
        $this->pageProfile = array(
            "lang" => "es",
            "title" => "CVifyPHP",
            "new_cv" => "Crear nuevo CV",
            "general" => "General",
            "last_name" => "apellido",
            "first_name" => "nombre de pila",
            "address" => "dirección",
            "phone" => "teléfono",
            "email" => "correo electrónico",
            "birth" => "fecha de nacimiento",
            "license" => "Licencia de manejo",
            "send" => "Enviar",
            "photo" => "Foto",
            "upload" => "Subir",
            "delete" => "borrar",
            "edit" => "editar",
            "education" => "Educación",
            "description" => "Descripción...",
            "date_begin" => "Fecha de inicio",
            "date_end" => "Fecha de finalización",
            "name establishment" => "Nombre del establecimiento",
            "hobbies" => "Aficiones",
            "experience_pro" => "Experiencia profesional",
            "name company" => "Nombre de la empresa",
            "name job" => "Nombre del trabajo",
            "back" => "Volver a la página de inicio");
    }

    function profileGerman() {
        $this->pageProfile = array(
            "lang" => "de",
            "title" => "CVifyPHP",
            "new_cv" => "Neuen Lebenslauf erstellen",
            "general" => "Allgemeines",
            "last_name" => "Nachname",
            "first_name" => "Vorname",
            "address" => "Adresse",
            "phone" => "Telefon",
            "email" => "Email",
            "birth" => "Geburtsdatum",
            "license" => "Fahrerlaubnis",
            "send" => "Senden",
            "photo" => "Foto",
            "upload" => "Hochladen",
            "delete" => "löschen",
            "edit" => "bearbeiten",
            "education" => "Bildung",
            "description" => "Beschreibung...",
            "date_begin" => "Startdatum",
            "date_end" => "Enddatum",
            "name establishment" => "Name der Einrichtung",
            "hobbies" => "Hobbys",
            "experience_pro" => "Berufserfahrung",
            "name company" => "Name des Unternehmens",
            "name job" => "Name des Jobs",
            "back" => "Zurück zur Startseite");
    }

    function profileRussian() {
        $this->pageProfile = array(
            "lang" => "ru",
            "title" => "CVifyPHP",
            "new_cv" => "Создать новое резюме",
            "general" => "Общий",
            "last_name" => "фамилия",
            "first_name" => "имя",
            "address" => "адрес",
            "phone" => "телефон",
            "email" => "электронное письмо",
            "birth" => "дата рождения",
            "license" => "Водительское удостоверение",
            "send" => "послать",
            "photo" => "Фото",
            "upload" => "загрузить",
            "delete" => "удалять",
            "edit" => "редактировать",
            "education" => "образование",
            "description" => "описание...",
            "date_begin" => "Дата начала",
            "date_end" => "Дата окончания",
            "name establishment" => "Название учреждения",
            "hobbies" => "хобби",
            "experience_pro" => "Профессиональный опыт",
            "name company" => "Название компании",
            "name job" => "Название работы",
            "back" => "Вернуться на главную страницу");
    }

    function profileChinese() {
        $this->pageProfile = array(
            "lang" => "zh",
            "title" => "CVifyPHP",
            "new_cv" => "创建新简历",
            "general" => "一般",
            "last_name" => "姓",
            "first_name" => "名字",
            "address" => "地址",
            "phone" => "电话",
            "email" => "电子邮件",
            "birth" => "出生日期",
            "license" => "驾驶执照",
            "send" => "发送",
            "photo" => "照片",
            "upload" => "上传",
            "delete" => "删除",
            "edit" => "编辑",
            "education" => "教育",
            "description" => "描述...",
            "date_begin" => "开始日期",
            "date_end" => "结束日期",
            "name establishment" => "机构名称",
            "hobbies" => "爱好",
            "experience_pro" => "职业经验",
            "name company" => "公司名称",
            "name job" => "工作名称",
            "back" => "返回主页");
    }

    function errorSpanish() {
        $this->page404 = array(
            "lang" => "es",
            "title" => "CVifyPHP",
            "error" => "Error 404",
            "return" => "Volver a la página de inicio");
    }

    function errorGerman() {
        $this->page404 = array(
            "lang" => "de",
            "title" => "CVifyPHP",
            "error" => "Fehler 404",
            "return" => "Zurück zur Startseite");
    }

    function errorRussian() {
        $this->page404 = array(
            "lang" => "ru",
            "title" => "CVifyPHP",
            "error" => "Ошибка 404",
            "return" => "Вернуться на главную страницу");
    }

    function errorChinese() {
        $this->page404 = array(
            "lang" => "zh",
            "title" => "CVifyPHP",
            "error" => "错误 404",
            "return" => "返回主页");
    }


}
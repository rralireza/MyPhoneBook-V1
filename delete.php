<?php
    
    require_once "class/management.php";
    require_once "class/phonebook.php";
    $contactsObj = new Contacts();
    $user_id = $_GET['id'];
    $contactsObj->deleteContacts($user_id);
    
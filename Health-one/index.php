<?php

use Controller\Controller;
include_once 'Controller/Controller.php';


$controller = new Controller();

/* formulier met gegevens tonen om een rij bij te werken */
if(isset($_POST['showForm']))
    {
        $controller->showFormMedicijnAction( $_POST['showForm']);
    }
/* UPDATE: formulier afhandeling om een rij bij te werken */
else if(isset($_POST['update']))
    {
        $controller->updateMedicijnAction();
    }
/* CREATE:  formulier afhandeling nieuwe rij */
else if(isset($_POST['create']))
    {
        $controller->createMedicijnAction();
    }
/* DELETE:  verwijderen rijen */
else if(isset($_POST['delete']))
    {
        $controller->deleteMedicijnAction($_POST['delete']);
    }
else if(isset($_POST['login']))
    {
        $controller->getLoginAction();
    }
else if(isset($_POST['logout']))
    {
        $controller->getLogoutAction();
    }

/*READ:  overzicht alle patienten */
else
    {
        $controller->readLoginAction();
    }
    
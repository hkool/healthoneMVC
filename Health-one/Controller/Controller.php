<?php
namespace Controller;
include_once ("View/View.php");
use View\View;
include_once ("Model/Medicijn.php");
include_once ("Model/Recept.php");
use Model\Model;
include_once ("Model/Model.php");

class Controller
{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }
    public function readMedicijnenAction(){
        $this->view->showMedicijnen();
    }
    public function readLoginAction(){
        $this->view->showLogin();
    }
    public function readReceptenAction(){
        $this->view->showRecepten();
    }
    public function showFormMedicijnAction($id=null){
       $this->view->showFormMedicijnen($id);
    }
    public function createMedicijnAction(){
        $naam = filter_input(INPUT_POST,'naam');
        $omschrijving = filter_input(INPUT_POST,'omschrijving');
        $bijwerkingen = filter_input(INPUT_POST,'bijwerkingen');
        $prijs = filter_input(INPUT_POST,'prijs');
        $result = $this->model->insertMedicijn($naam,$omschrijving,$bijwerkingen,$prijs);
        $this->view->showMedicijnen($result);
    }
    public function createReceptAction(){
        $medicijnid = filter_input(INPUT_POST,'naam');
        $patientid = filter_input(INPUT_POST,'patientid');
        $dosis = filter_input(INPUT_POST,'dosis');
        $looptijd = filter_input(INPUT_POST,'looptijd');
        $datum = filter_input(INPUT_POST,'datum');
        $herhaling = filter_input(INPUT_POST,'herhaling');
        $aantal = filter_input(INPUT_POST,'aantal');
        $result = $this->model->insertRecept($medicijnid,$patientid,$dosis,$looptijd,$datum,$herhaling,$aantal);
        $this->view->showRecepten($result);
    }
    public function updateMedicijnAction(){
        $id = filter_input(INPUT_POST,'id');
        $naam = filter_input(INPUT_POST,'naam');
        $omschrijving = filter_input(INPUT_POST,'omschrijving');
        $bijwerkingen = filter_input(INPUT_POST,'bijwerkingen');
        $prijs = filter_input(INPUT_POST,'prijs');
        
        $result=$this->model->updateMedicijn($id,$naam,$omschrijving,$bijwerkingen,$prijs);
        $this->view->showMedicijnen($result);
    }
    public function deleteMedicijnAction($id){
        $result = $this->model->deleteMedicijn($id);
        $this->view->showMedicijnen($result);
    }
    public function getLoginAction(){
        $username = filter_input(INPUT_POST,'username');
        $wachtwoord = filter_input(INPUT_POST,'wachtwoord');
        $this->model->getLogin($username, $wachtwoord);
        if (isset($_SESSION ["username"])){
            $this->view->showMedicijnen();
        }
        else {
            $this->view->showLogin();
        }   
        
    }
    public function getLogoutAction(){
        $this->model->getLogout();
        $this->view->showLogin();
    }
}
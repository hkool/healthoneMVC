<?php
namespace view;
use Model\Model;
include_once ('Model/Model.php');
use Model\Medicijn;
include_once('Model/Medicijn.php');
use Model\Apotheker;
include_once('Model/Apotheker.php');

class View
{

    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function showMedicijnen($result = null){
        
        $medicijnen = $this->model->getMedicijnen();
        
        $medicijnnaam = "Naam:";
        $medicijnomschrijving = "Omschrijving:";
        $medicijnbijwerkingen = "Bijwerkingen:";
        $medicijnprijs = "Prijs:";

    
    echo "<!DOCTYPE html>
                <html lang=\"NL\">
                <head>
                    <meta charset=\"UTF-8\">
                    <title>Overzicht Medicijnen</title>
                    <link rel=\"stylesheet\" href=\"./css/homepagina.css\">
                    <script src=\"https://kit.fontawesome.com/e1f3f21892.js\" crossorigin=\"anonymous\"></script>
                </head>
                <body>
                    <header>
                        <h1>Health-One</h1>
                        <h3>
                        <div id=\"toevoegen\">
                            <form action='index.php' method='post'>
                            <input type='hidden' name='showForm' value='0'>
                            <input type='submit' value='toevoegen'/>
                            </form>
                        </div>
                        </h3>
                        <h3>
                            <form action='index.php' method='post'>
                            <input type='hidden' name='logout' value='0'>
                            <input type='submit' value='logout'/>
                            </form>
                        </h3>
                        
                    </header>
                    <nav>
                        <br>
                        <div class=\"row\">
                        <h2>Medicijnen overzicht</h2> 
                        <h2>Recept overzicht</h2>
                        </div>
                        <br>
                    </nav>
                </body>
            </html>;"
?>

                    <?php    if($medicijnen !== null) { echo "
                        <div id=\"medicijnen\">";
                            foreach ($medicijnen as $medicijn) {
                                echo "<div class=\"medicijn\">
                                      $medicijnnaam&#8287$medicijn->naam<br />
                                      $medicijnomschrijving&#8287$medicijn->omschrijving<br />
                                      $medicijnbijwerkingen&#8287$medicijn->bijwerkingen<br />
                                      $medicijnprijs&nbsp;$medicijn->prijs<br />
                                      <form action='index.php' method='post'>
                                       <input type='hidden' name='showForm' value='$medicijn->id'><input type='submit' value='wijzigen'/></form>
                                        <form action='index.php' method='post'>
                                        
                                       <input type='hidden' name='delete' value='$medicijn->id'><input type='submit' value='verwijderen'/></form>
                                    </div>";
                            }
                        }
                    else{
                        echo "Geen medicijnen gevonden";
                    }
    }
    public function showFormMedicijnen($id=null){
        if($id !=null && $id !=0){
            $medicijn = $this->model->selectMedicijn($id);
        }
        /*de html template */
        echo "<!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <title>Beheer Medicijngegevens</title>
            <link rel=\"stylesheet\" href=\"./css/add.css\">
        </head>
        <body>
        <header>
        <h1>Formulier Medicijngegevens</h1>
        </header>";
        if(isset($medicijn)){
            echo "<form method='post' >
            <table>
                <tr><td></td><td>
                    <input type=\"hidden\" name=\"id\" value='$id'/></td></tr>
                 <tr><td>   <label for=\"naam\">Medicijn naam</label></td><td>
                    <input type=\"text\" name=\"naam\" value= '".$medicijn->naam."'/></td></tr>
                <tr><td>
                    <label for=\"omschrijving\">Omschrijving</label></td><td>
                    <input type=\"text\" name=\"omschrijving\" value = '".$medicijn->omschrijving."'/></td></tr>
                <tr><td>
                    <label for=\"bijwerkingen\">Bijwerkingen</label></td><td>
                    <input type=\"text\" name=\"bijwerkingen\" value= '".$medicijn->bijwerkingen."'/></td></tr>
                <tr><td>
                    <label for=\"omschrijving\">Prijs</label></td><td>
                    <input type=\"text\" name=\"prijs\" value = '".$medicijn->prijs."'/></td></tr>
                <tr><td>
                    <div class=\"button\">
                    <input type='submit' name='update' value='Opslaan'></td><td>
                    </div>
                </td></tr></table>
                </form>
            </body>
            </html>";
        }
        else{
            /*de html template */
            echo "<form method='post' action='index.php'>
            <table>
                <tr><td></td><td>
                    <input type=\"hidden\" name=\"id\" value=''/></td></tr>
                 <tr><td>   <label for=\"naam\">Medicijn naam</label></td><td>
                    <input type=\"text\" name=\"naam\" value= ''/></td></tr>
                <tr><td>
                    <label for=\"omschrijving\">Omschrijving</label></td><td>
                    <input type=\"text\" name=\"omschrijving\" value = ''/></td></tr>
                <tr><td>
                    <label for=\"bijwerkingen\">Bijwerkingen</label></td><td>
                    <input type=\"text\" name=\"bijwerkingen\" value= ''/></td></tr>
                <tr><td>
                    <div class=\"button\">
                    <input type='submit' name='create' value='Opslaan'></td><td>
                    </div>
                </td></tr></table>
                </form>
            </body>
            </html>";
            }
    }
    public function showLogin(){
       echo "<!DOCTYPE html>
            <html>
            <head>
                <title>Health-One</title>
                <link rel=\"stylesheet\" href=\"./css/login.css\">
            </head>
            <body>
            <form method=\"POST\">
                <header>
                    <div id=\"titel\">
                        <h1>Health-One</h1>
                    </div>
                </header>
                <div id=\"login-box\">
                <div id=\"login-titel\">
                    <h1>Login</h1><hr>
                    </div>
                        <div id=\"inloggen\">
                        <table>
                            <tr><td></td><td>
                            
                                <input type=\"hidden\" name=\"id\" value=''/></td></tr>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for=\"naam\">Username</label></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type=\"username\" name=\"username\" value= ''/></tr>                           
                            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for=\"wachtwoord\">Wachtwoord</label></td>&nbsp;
                                <input type=\"password\" name=\"wachtwoord\" value = ''/></tr>
                            <tr><td>
                            
                        </div>
                            <div id=\"login\">
                                <form action='index.php' method='post'>
                                <input type='hidden' name='login' value='0'>
                                <input type='submit' value='login'/>
                                </form>
                            </div>
                            </td></tr>
                        </table>
                    </div>
                    </form>
                </body>
            </html>";
    }
    public function showRecepten($result = null){
        
        echo "<!DOCTYPE html>
        <html lang=\"NL\">
        <head>
            <meta charset=\"UTF-8\">
            <title>Overzicht Medicijnen</title>
            <link rel=\"stylesheet\" href=\"./css/homepagina.css\">
            <script src=\"https://kit.fontawesome.com/e1f3f21892.js\" crossorigin=\"anonymous\"></script>
        </head>
        <body>
            <header>
                <h1>Health-One</h1>
                <h3>
                <div id=\"toevoegen\">
                    <form action='index.php' method='post'>
                    <input type='hidden' name='showForm' value='0'>
                    <input type='submit' value='toevoegen'/>
                    </form>
                </div>
                </h3>
                <h3>
                    <form action='index.php' method='post'>
                    <input type='hidden' name='logout' value='0'>
                    <input type='submit' value='logout'/>
                    </form>
                </h3>
                
            </header>
            <nav>
                <br>
                <div class=\"row\">
                <h2>Medicijnen overzicht</h2> 
                <h2>Recept Overzicht</h2>
                </div>
                <br>
            </nav>
        </body>
    </html>;"
?>
            <?php    if($medicijnen !== null) { echo "
                <div id=\"medicijnen\">";
                    foreach ($medicijnen as $medicijn) {
                        echo "<div class=\"medicijn\">
                              $medicijnnaam&#8287$medicijn->naam<br />
                              $medicijnomschrijving&#8287$medicijn->omschrijving<br />
                              $medicijnbijwerkingen&#8287$medicijn->bijwerkingen<br />
                              <form action='index.php' method='post'>
                               <input type='hidden' name='showForm' value='$medicijn->id'><input type='submit' value='wijzigen'/></form>
                                <form action='index.php' method='post'>
                                
                               <input type='hidden' name='delete' value='$medicijn->id'><input type='submit' value='verwijderen'/></form>
                            </div>";
                    }
                }
            else{
                echo "Geen recepten gevonden";
            }
    }
}

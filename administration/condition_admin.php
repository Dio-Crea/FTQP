<?php
session_start();
require_once '../includes/admin/connect.php';
require_once 'includes/header.php';



// UPDATE CONDITIONS
if(isset($_POST['content'])){
    $texte_condition =htmlentities($_POST['content'],ENT_QUOTES);
    $id = $_POST['id'];
    $uptexte =mysqli_query($connect, "UPDATE conditions SET message='$texte_condition' WHERE id=$id");
}
// fin UPDATE CONDITIONS

// SELECT 
$query_select= mysqli_query($connect, "SELECT * FROM conditions");
//FIN SELECT
while($ligne=mysqli_fetch_assoc($query_select)){





// INSERT INTO ACCUEIL
if(isset($_POST['insertinto'])){
    $inaccueil ="INSERT INTO accueil VALUES message=''";
     "<form action='' method='post' name=''>"
    ."<div contenteditable='true'><textarea name=''></textarea></div>"
    ."<input type='hidden' name='id' value=''></input>"     
    ."<input type='submit' value='Submit' name=''></input>"      
    ."</form>" ;
}
// FIN INSERT INTO


?>

                 
                <?php
                      if(isset($_SESSION['clef_unique'])&&$_SESSION['clef_unique']==session_id()){
                /* formulaire d'update de la page */
                echo 
                "<div id='index_admin'><form action='' method='post' name='upda'>"
                ."<div class='editeur'><textarea id='edit' name='content'>".$ligne['message']."</textarea></div>"
                ."<input type='hidden' name='id' value='".$ligne['id']."'></input>"     
                ."<input type='submit' value='Editer' name='editer'></input>"      
                ."</form></div>"   
                ; 
                }
                else {
                    header("Location: ./");
                }
                ?>
<?php   }require_once 'includes/footer.php';?>
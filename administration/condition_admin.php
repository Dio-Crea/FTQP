<?php
require_once '../includes/admin/connect.php';


// UPDATE ACCUEIL
if(isset($_POST['texte_conditions'])){
    $texte_cond =htmlentities($_POST['texte_conditions'],ENT_QUOTES);
    $id = $_POST['id'];
    $uptexte =mysqli_query($connect, "UPDATE conditions SET message='$texte_cond' WHERE id=$id");
}
// fin UPDATE ACCUEIL

// SELECT 
$query_select= mysqli_query($connect, "SELECT * FROM conditions");
//FIN SELECT
while($ligne=mysqli_fetch_assoc($query_select)){



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/admin_style.css" />
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
        <script src="ckeditor/ckeditor.js"></script>
                <script>
                    
                    CKEDITOR.replace ('textareaId', { 
                    "filebrowserImageUploadUrl": "/imgupload/ckeditor/plugins/imgupload.php" 
                                                });
                </script>
  
        <title></title>
    </head>
    <body>
     <div id="conteneur" >
         <div id="gauche">
            <div id="logo_admin"></div>
            <div id="menu_admin">
                <ul>
                   <li><a href="admin.php"  >ACCUEIL</a></li>
                   <li><a href="condition_admin.php" class="en-cours">CONDITIONS</a></li>
                   <li><a href="galerie_admin.php">GALERIE</a></li>
                   <li><a href="aide_admin.php">AIDE</a></li>
                   <li><a href="contact_admin.php">CONTACT</a></li>
                </ul>    
            </div>
        </div>
   
        <div id="droite">

             <div id="contenu_admin">
                 
                <?php
                     
                echo 
                "<div id='index_admin'><form action='' method='post' name='upda'>"
                ."<textarea class='ckeditor' name='texte_conditions' >".$ligne['message']."</textarea>"
                ."<input type='hidden' name='id' value='".$ligne['id']."'></input>"     
                ."<input type='submit' value='Editer' name='editer'></input>"      
                ."</form></div>"   
                ; 
                ?>
             </div>
        </div>  
      </div>   

    </body>
</html>
<?php   }?>
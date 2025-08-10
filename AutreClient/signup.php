
<?php  

require("action/connexion.php");

?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.php' ?>
<body>
    <CENTER>
    <h1>le formulaiire de d'enregistrement</h1><br><br>
    </CENTER>
   
    <form action="action/insertion.php" method="post" class="container bg-defauld">
        <div class="">
            <label for="Nom" class="form-label">Le nom :</label><br>
            <input type="text" class="  form-control" name="Nom">
        </div>

        <div class="">
            <label for="Prenom" class="form-label">Le Prenom:</label><br>
            <input type="text" class="form-control" name="Prenom">
        </div>

        <div class="col">
            <label for="Email" class="form-label">mail</label><br>
            <input type="text" class="form-control" name="Email">
        </div>

        <div class="col">
            <label for="Mot_De_Passe" class="form-label">Le mot de pass</label><br>
            <input type="text" class=" form-control" name="Mot_De_Passe">
        </div>

        <div class="col">
            <label for="De_Passe" class="form-label">confirmer votre mot de pass</label><br>
            <input type="text" class="  form-control" name="De_Passe">
        </div><br><br>
        <a href="login.php" class="link"> <h4>se connecte</h4></a>

        <button class="btn btn-info btn-block btn-center" name="valided">ENREGISTRER VOTRE FORMULAIRE</button>
    </form>
    
</body>
</html>
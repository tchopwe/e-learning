<?php
require("action/connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/header.php' ?>
<body>
<?php include 'includes/navbar.php' ?>
<CENTER>
    <h1>lse question d'un utilisateur</h1><br><br>
    </CENTER>
   
    <form action="QuestionUsers/sendQuestionAction.php" method="post" class="container bg-defauld">
        <div class="">
            <label for="titre" class="form-label">Le titre :</label><br>
            <input type="text" class="  form-control" name="Titre">
        </div>

        <div class="">
            <label for="Question" class="form-label">Le Question:</label><br>
            <textarea type="text" class="form-control" name="Question"> </textarea>
        </div>

        <div class="col">
            <label for="Description" class="form-label">Description</label><br>
            <textarea type="text" class="form-control" name="Description"></textarea>
        </div>
        <br><br>
        <button class="btn btn-info btn-block btn-center" name="valided">publier votre question</button>
    </form>
</body>
</html>
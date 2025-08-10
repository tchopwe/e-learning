<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();

    $ListeCours= $dam->query("SELECT * FROM cours"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreCours= $ListeCours->rowCount();

    $ListeSemestre= $dam->query("SELECT * FROM semestre"); // Je Mets Le Nom de Ma Table à Manipuler



    
?>


                <!-- Begin Page Content -->
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-2"></div>
                        
                            <div class="col-lg-8">
                                <div >
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau cours</h1>
                                    </div>
                                    <form method="POST" action="views/Cours/InsertCours.php" class="ajax-form">
             
                                            <div class="form-group">
                                            <label for="id_cours"  class="control-label">Identifiant du Cours </label><br>
                                                <input type="text" name="id_cours" class="form-control form-control-user" id="id_cours"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="titre" class="control-label">Libellé du cours </label><br>
                                            <input type="text" name="titre" class="form-control form-control-user" id="titre"
                                                placeholder="Noms du cours">
                                        </div>
                                        

                                            <div class="form-group">
                                            <label for="description" class="control-label">Description du Cours</label><br>
                                                <input type="text"  name="description" class="form-control form-control-user"
                                                    id="description" placeholder="Desciption du Cours">
                                            </div>
                                            <div class="form-group">
                                            <div class="form-group">
                                                <label for="id_utilisateur" class="control-label">Choix de l'enseignant</label>
                                                <select name="id_enseignant" id="id_utilisateur" class="form-control">
                                                        <?php while($ListeClasse=$ListedesTable->fetch()){ ?>
                                                        <option value="<?php echo $ListeClasse['id_utilisateur']?>">
                                                            <?php echo $ListeClasse['email']?>
                                                        </option>
                                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_semestre" class="control-label">Choix du semestre</label>
                                                <select name="id_semestre" id="id_semestre" class="form-control">
                                                        <?php while($ListeClasse=$ListeSemestre->fetch()){ ?>
                                                        <option value="<?php echo $ListeClasse['id_semestre']?>">
                                                            <?php echo $ListeClasse['nom_semestre']?>
                                                        </option>
                                                                <?php } ?>
                                                </select>
                                            </div>
                                        <button type="submit" class="btn btn-success"> valider </button>
                                        <hr>
                                    </form>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>


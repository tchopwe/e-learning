<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    
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
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau Semestre</h1>
                                    </div>
                                    <form method="POST" action="InsertSemestre.php" class="form">
             
                                            <div class="form-group">
                                            <label for="id_semestre"  class="control-label">Identifiant </label><br>
                                                <input type="text" name="id_semestre" class="form-control form-control-user" id="id_semestre"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="nom" class="control-label">Noms du Semestre </label><br>
                                            <input type="text" name="nom_semestre" class="form-control form-control-user" id="nom_semestre"
                                                placeholder="nom_semestre">
                                        </div>
                                        

                                            <div class="form-group">
                                            <label for="niveau" class="control-label">Niveau</label><br>
                                                <input type="text"  name="niveau" class="form-control form-control-user"
                                                    id="niveau" placeholder="niveau">
                                            </div>
                                            <div class="form-group">
                                            <label for="annee_academique" class="control-label">annee_academique</label><br>
                                                <input type="annee_academique" name="annee_academique"  class="form-control form-control-user"
                                                    id="annee_academique" placeholder="annee_academique">
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

            <!-- End of Main Content -->

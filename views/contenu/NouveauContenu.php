<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    
?>  <!-- Begin Page Content -->
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-2"></div>
                        
                            <div class="col-lg-8">
                                <div >
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau utilisateur</h1>
                                    </div>
                                    <form method="POST" action="view/contenu/InsertContenu.php" class="form">
             
                                            <div class="form-group">
                                            <label for="id_contenu"  class="control-label">Identifiant </label><br>
                                                <input type="text" name="id_contenu" class="form-control form-control-user" id="id_contenu"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="titre_contenu" class="control-label">titre_contenu</label><br>
                                            <input type="text" name="titre_contenu" class="form-control form-control-user" id="titre_contenu"
                                                placeholder="titre_contenu">
                                        </div>

                                             <div class="form-group">
                                            <label for="type_contenu">Type de contenu :</label>
                                               <select name="type_contenu" id="type_contenu" required>
                                                   <option value="">--Sélectionner--</option>
                                                   <option value="image">Image</option>
                                                   <option value="video">Vidéo</option>
                                                   <option value="pdf">PDF</option>
                                                </select><br><br>
                                            </div>

                                            <div class="form-group">
                                            <label for="url_fichier" class="control-label">url_fichier</label><br>
                                                <input type="url_fichier" name="url_fichier"  class="form-control form-control-user"
                                                    id="url_fichier" placeholder="url_fichier">
                                            </div>
                                            <div class="form-group">
                                            <label for="chiffre" class="control-label">chiffre</label><br>
                                                <input type="chiffre" name="chiffre"  class="form-control form-control-user"
                                                    id="chiffre" placeholder="chiffre">
                                            </div>
                                            <div class="form-group">
                                            <label for="type_utilisateur" class="control-label">Type d'utilisateur</label><br>
                                                <input type="text" name="type_utilisateur"  class="form-control form-control-user"
                                                    id="type_utilisateur" placeholder="Type d'utilisateur">
                                            </div>
                                            <div class="form-group">
                                            <label for="id_groupe" class="control-label">Identifiant du groupe</label><br>
                                                <input type="text" name="id_groupe"  class="form-control form-control-user"
                                                    id="id_groupe" placeholder="Identifiant du groupe">
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

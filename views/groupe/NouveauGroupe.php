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
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau groupe</h1>
                                    </div>
                                    <form method="POST" action="InsertGroupe.php" class="form">
             
                                            <div class="form-group">
                                            <label for="id_groupe"  class="control-label">Identifiant </label><br>
                                                <input type="text" name="id_groupe" class="form-control form-control-user" id="id_groupe"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="nom_group" class="control-label">Noms </label><br>
                                            <input type="text" name="nom_group" class="form-control form-control-user" id="nom_group"
                                                placeholder="Noms du groupe">
                                        </div>
                                        

                                            <div class="form-group">
                                            <label for="niveau" class="control-label">Niveau</label><br>
                                                <input type="text"  name="niveau" class="form-control form-control-user"
                                                    id="niveau" placeholder="niveau concerner">
                                            </div>
                                            <div class="form-group">
                                            <label for="cle_chiffrement" class="control-label">clé de chiffrement </label><br>
                                                <input type="text" name="cle_chiffrement"  class="form-control form-control-user"
                                                    id="cle_chiffrement" placeholder="clé de chiffrement du groupe">
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LeslieNgansop 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

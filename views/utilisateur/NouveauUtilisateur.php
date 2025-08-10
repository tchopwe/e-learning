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
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau utilisateur</h1>
                                    </div>
                                    <form method="POST" action="views/utilisateur/InsertUtilisateur.php" class="ajax-form">
             
                                            <div class="form-group">
                                            <label for="id_utilisateur"  class="control-label">Identifiant </label><br>
                                                <input type="text" name="id_utilisateur" class="form-control form-control-user" id="id_utilisateur"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="nom" class="control-label">Noms de l'utilisateur </label><br>
                                            <input type="text" name="nom" class="form-control form-control-user" id="nom"
                                                placeholder="Noms de l'utilisateur">
                                        </div>
                                        

                                            <div class="form-group">
                                            <label for="prenom" class="control-label">Prenom de l'utilisateur</label><br>
                                                <input type="text"  name="prenom" class="form-control form-control-user"
                                                    id="prenom" placeholder="Prenom de l'utilisateur">
                                            </div>
                                            <div class="form-group">
                                            <label for="email" class="control-label">Email de l'utilisateur</label><br>
                                                <input type="email" name="email"  class="form-control form-control-user"
                                                    id="email" placeholder="Email de l'utilisateur">
                                            </div>
                                            <div class="form-group">
                                            <label for="mot_de_passe" class="control-label">Mot de passe</label><br>
                                                <input type="password" name="mot_de_passe"  class="form-control form-control-user"
                                                    id="mot_de_passe" placeholder="Mot de passe">
                                            </div>
                                            <div class="form-group">
                                            <label for="type_utilisateur" class="control-label">Choix du type d'utilisateur</label><br>
                                            <select name="type_utilisateur" class="form-control form-control-user">
                                                <option value="etudiant">Étudiant</option>
                                                <option value="enseignant">Enseignant</option>
                                                <option value="admin">Administrateur</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_groupe" class="control-label">Choix du groupe</label>
                                                <select name="id_groupe" id="id_groupe" class="form-control">
                                                        <?php while($ListeClasse=$Listedegroup->fetch()){ ?>
                                                        <option value="<?php echo $ListeClasse['id_groupe']?>">
                                                            <?php echo $ListeClasse['nom_groupe']?>
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


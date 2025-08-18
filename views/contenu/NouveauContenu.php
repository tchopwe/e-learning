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
                                    <form method="POST" action="InsertContenu.php" class="form">
             
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
                                            <label for="type_contenu" class="control-label">type_contenu</label><br>
                                                <input type="text"  name="type_contenu" class="form-control form-control-user"
                                                    id="type_contenu" placeholder="type_contenu">
                                            </div>
                                            <div class="form-group">
                                            <label for="url_fichier" class="control-label">url_fichier</label><br>
                                                <input type="url_fichier" name="url_fichier"  class="form-control form-control-user"
                                                    id="url_fichier" placeholder="url_fichier">
                                            </div>
                                            <div class="form-group">
                                            <label for="mot_de_passe" class="control-label">Mot de passe</label><br>
                                                <input type="password" name="mot_de_passe"  class="form-control form-control-user"
                                                    id="mot_de_passe" placeholder="Mot de passe">
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


            <div class="form-group">
                <label for="id_utilisateur">Type d'utilisateur <span class="text-danger">*</span></label>
                <select name="id_utilisateur" id="id_utilisateur" class="form-control" required>
                    <option value="">--Sélectionner--</option>
                    <?php foreach ($typeUtilisateurs as $tu): ?>
                        <option value="<?= (int)$tu['id_utilisateur'] ?>"><?= htmlspecialchars($tu['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter (chiffré)</button>
        </form>

        <hr>

        <p class="mt-3 text-muted">
            <strong>Note :</strong> Le fichier est enregistré <em>chiffré</em> dans <code>uploads/</code> avec l’entête <code>ENCv1</code> suivie de l’IV (16 octets) puis le ciphertext.
            Pour le lire, il faudra un script qui vérifie l’appartenance au groupe, récupère <code>groupe.cle_chiffrement</code>, lit l’IV et déchiffre à la volée.
        </p>
    </div>

    <!-- JS Bootstrap si besoin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

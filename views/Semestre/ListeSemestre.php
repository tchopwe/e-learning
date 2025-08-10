
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();

    $ListedesCours= $dam->query("SELECT * FROM cours"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreCours= $ListedesCours->rowCount();

    $ListedesSemestres= $dam->query("SELECT * FROM semestre"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreSemestre= $ListedesSemestres->rowCount();


    
?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <a target="_blank"
                            href="views/Semestre/NouveauSemestre.php" class="btn btn-success mb-3 ml-2 ajax-link"> ajouter semestre
                        </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste de tout les Semestre</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Noms du semestre</th>
                                            <th>niveau</th>
                                            <th>annee_academique</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
								<tbody><!-- Ici, Je Récupère Les Valeurs des Résultats de La REQUETTE -->
								
									<?php while($STAGIAIRE=$ListedesSemestres->fetch()){?> 
									
										<tr> <!-- Ici, Je Mets Les Noms des Colonnes, Je Dis Bien Les Noms des Colonnes -->
										
											<td align="center"><?php echo $STAGIAIRE['id_semestre'] ?></td>
											<td><?php echo $STAGIAIRE['nom_semestre'] ?></td>
											<td><?php echo $STAGIAIRE['niveau'] ?></td>
											<td><?php echo $STAGIAIRE['annee_academique'] ?></td>
                                            <td>
                                                <a href="views/Semestre/EditerSemestre.php?id_semestre=<?php echo $STAGIAIRE['id_semestre'] ?>"  class="btn btn-info btn-circle btn-sm ajax-link">
                                                <i class="fas fa-pencil-alt"></i>
                                                </a>&nbsp;&nbsp;
                                                <a Onclick="return confirm('Etes Vous Sur de Vouloir Supprimer ?')" 
                                                    href="views/Semestre/SupprimerSemestre.php?id_semestre=<?php echo $STAGIAIRE['id_semestre'] ?>"  class="btn btn-danger btn-circle btn-sm ajax-link">
                                                    <i class="fas fa-trash"></i>
                                                </a>			
                                            </td>	
                                    </a>									

												<?php } ?>
											</td>
										</tr>
								</tbody>
                                </table>
                            </div>
                            <a href="action/genePdf.php" class="btn btn-primary position-rigth"> imprimer</a>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>

            </div>
            <!-- End of Main Content -->

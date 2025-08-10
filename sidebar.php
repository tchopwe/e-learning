<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-LEARNING</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="adminlayout.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Utilisateur -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-users"></i>
            <span>Utilisateur</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing utilisateur</h6>
                <a class="collapse-item ajax-link" href="views/utilisateur/ListeUtilisateur.php">Liste utilisateur</a>
                <a class="collapse-item ajax-link" href="views/utilisateur/NouveauUtilisateur.php">Ajouter utilisateur</a>
            </div>
        </div>
    </li>

    <!-- Groupe -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroup"
            aria-expanded="true" aria-controls="collapseGroup">
            <i class="fas fa-users"></i>
            <span>Groupe</span>
        </a>
        <div id="collapseGroup" class="collapse" aria-labelledby="headingGroup" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing groupe</h6>
                <a class="collapse-item ajax-link" href="views/groupe/ListeGroupe.php">Liste groupe</a>
                <a class="collapse-item ajax-link" href="views/groupe/NouveauGroupe.php">Ajouter groupe</a>
            </div>
        </div>
    </li>

    <!-- Cours -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCours"
            aria-expanded="true" aria-controls="collapseCours">
            <i class="fas fa-book"></i>
            <span>Cours</span>
        </a>
        <div id="collapseCours" class="collapse" aria-labelledby="headingCours" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Cours</h6>
                <a class="collapse-item ajax-link" href="views/cours/ListeCours.php">Liste des cours</a>
                <a class="collapse-item ajax-link" href="views/cours/NouveauCours.php">Ajouter des cours</a>
            </div>
        </div>
    </li>

    <!-- Contenus -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContenu"
            aria-expanded="true" aria-controls="collapseContenu">
            <i class="fas fa-file-alt"></i>
            <span>Contenus</span>
        </a>
        <div id="collapseContenu" class="collapse" aria-labelledby="headingContenu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing contenus</h6>
                <a class="collapse-item ajax-link" href="views/contenu/ListeContenu.php">Liste contenu</a>
                <a class="collapse-item ajax-link" href="views/contenu/NouveauContenu.php">Ajouter contenu</a>
            </div>
        </div>
    </li>

    <!-- Semestre -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemestre"
            aria-expanded="true" aria-controls="collapseSemestre">
            <i class="fas fa-calendar"></i>
            <span>Semestre</span>
        </a>
        <div id="collapseSemestre" class="collapse" aria-labelledby="headingSemestre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Semestre</h6>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Liste des Semestres</a>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Ajouter Semestre</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/logo_minesup.jpg" alt="...">
        <p class="text-center mb-2"><strong>MINESUP</strong> <br> Proche de vous pour le progrès!</p>
    </div>

</ul>

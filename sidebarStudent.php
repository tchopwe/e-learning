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
        <a class="nav-link" href="studentlayout.php">
            <i class="fas fa-home"></i>
            <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Cours -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCours"
            aria-expanded="true" aria-controls="collapseCours">
            <i class="fas fa-book"></i>
            <span>Cours disponibles</span>
        </a>
        <div id="collapseCours" class="collapse" aria-labelledby="headingCours" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Cours</h6>
                <a class="collapse-item ajax-link" href="views/cours/ListeCours.php">Cours Semestres 1</a>
                <a class="collapse-item ajax-link" href="views/cours/NouveauCours.php">Cours Semestre 2</a>
            </div>
        </div>
    </li>

    <!-- Semestre -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemestre"
            aria-expanded="true" aria-controls="collapseSemestre">
            <i class="fas fa-download"></i>
            <span>Cours téléchargés</span>
        </a>
        <div id="collapseSemestre" class="collapse" aria-labelledby="headingSemestre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Semestre</h6>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestres 1</a>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestre 2</a>
            </div>
        </div>
    </li>

     <!-- Notifications -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemestre"
            aria-expanded="true" aria-controls="collapseSemestre">
            <i class="fas fa-bell"></i>
            <span>Notification</span>
        </a>
        <div id="collapseSemestre" class="collapse" aria-labelledby="headingSemestre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Semestre</h6>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestres 1</a>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestre 2</a>
            </div>
        </div>
    </li>

     <!-- contenu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemestre"
            aria-expanded="true" aria-controls="collapseSemestre">
            <i class="fas fa-lock"></i>
            <span>Contenus chiffrés</span>
        </a>
        <div id="collapseSemestre" class="collapse" aria-labelledby="headingSemestre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Semestre</h6>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestres 1</a>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestre 2</a>
            </div>
        </div>
    </li>

     <!-- paramètres -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemestre"
            aria-expanded="true" aria-controls="collapseSemestre">
            <i class="fas fa-cog"></i>
            <span>paramètres</span>
        </a>
        <div id="collapseSemestre" class="collapse" aria-labelledby="headingSemestre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Listing Semestre</h6>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestres 1</a>
                <a class="collapse-item ajax-link" href="views/Semestre/ListeSemestre.php">Semestre 2</a>
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

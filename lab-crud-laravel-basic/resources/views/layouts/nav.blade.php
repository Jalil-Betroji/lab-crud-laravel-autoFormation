<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="{{route('show.stagiaires')}}">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('show.stagiaires')}}">Liste des stagiaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('add.stagiaire')}}">Ajouté Stagiaire</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" id="search-form">
        <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" name="search" id="search-input">
      </form>
    </div>
  </div>
</nav>
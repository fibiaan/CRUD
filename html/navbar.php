<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php $r = $GLOBALS['page'] == 'home' ? 'active' : '' ; echo $r; ?>" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administración de usuarios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if($GLOBALS['type'] == '1'){
                    include ('extras/menu_admin.html');
                }else{
                    echo '<li><a class="dropdown-item" href="php/logout.php">Cerrar Sesión</a></li>';
                }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php $b = !$GLOBALS['data'] ? '' : 'disabled' ; echo $b; ?>" href="#" tabindex="-1" aria-disabled="<?php $b = $GLOBALS['data'] ? 'true' : 'false' ; echo $b; ?>">Sensores</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
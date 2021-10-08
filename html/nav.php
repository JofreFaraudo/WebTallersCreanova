<?php
$result = !verify(1,$_SESSION['ID']);
?>
<div class='User'>
<header class="Userheader">
<a class='Logo' href="http://www.collegicreanova.org/cat/inici">
<img title='Col&middot;legi Creanova' src='../Images/logo-creanova.png' alt='Col&middot;legi creanova' height=77px>
</a>
    <nav>
<ul>
<li>
<!-- div class='dropdown'>
<a href='#' class='dropdown-toggle sr-only' id='language-select' data-toggle='dropdown'><i class='fa fa-globe'></i>Idioma</a>
    Selecionar idioma
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="language-select">
    <li role="presentation">
      <a role="menuitem" tabindex="-1" href="#">Acción</a>
    </li>
    <li role="presentation">
      <a role="menuitem" tabindex="-1" href="#">Otra acción</a>
    </li>
    <li role="presentation">
      <a role="menuitem" tabindex="-1" href="#">Otra acción más</a>
    </li>
    <li role="presentation" class="divider"></li>
    <li role="presentation">
      <a role="menuitem" tabindex="-1" href="#">Acción separada</a>
</li>
  </ul>
</div -->
</li>
<li>
<a href='UpdateUsers.php' id='UpdateUsers'>
<i class='fa fa-edit'></i>
<sapn>Actualitzar Usuaris</span>
</a>
</li>
<<?php echo ($result ? "!--" : ""); ?>li>
<a href='/AddTallers.php' id='addWorkshop'>
<i class='fa fa-plus-square'></i>
<span>Afegir tallers</span>
</a>
</li<?php echo ($result ? "--" : ""); ?>>
<li>
<a href='/' id='tallers'>
<i class='fa fa-pen-square'></i>
<span>Tallers</span>
</a>
</li>
<<?php echo ($result ? "!--" : ""); ?>li>
<a href='SignUp.php' id='new-user'>
<i class='fa fa-user-plus'></i>
<span>Registrar usuaris</span>
</a>
</li<?php echo ($result ? "--" : ""); ?>>
<li>
<a href='LogIn.php?action=logout' id='sign-out'>
<i class='fa fa-power-off'></i>
<span>Tancar sessi&oacute;</span>
</a>
</li>
</ul>
</nav>
</header>
</div>

<?php 
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if ($perfil == 1): ?>
                    <!-- Opciones del navbar para el admin -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('users-list'); ?>">ABM Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('lista-productos'); ?>">CRUD Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('alta-producto'); ?>">Listar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('consultas'); ?>">Panel</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('logout'); ?>">
                                <i class="fa fa-sign-out"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                <?php else: ?>
                    <!-- Opciones del navbar para otros usuarios -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url('inicio'); ?>">Pagina Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('catalogo'); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('comercializacion'); ?>">Comercializacion</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('contacto'); ?>">Contacto</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('quienessomos'); ?>">Quienes Somos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('terminosyusos'); ?>">Terminos y usos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if ($perfil == 2): ?>
                        <!-- Nuevo navbar para usuarios logueados con perfil_id igual a 2 -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('muestro'); ?>">
                                    <i class="fa fa-shopping-cart"></i> Carrito
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('panel-usuario');?>">
                                    <i class="fa fa-user"></i> <?php echo $nombre; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('logout'); ?>">
                                    <i class="fa fa-sign-out"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    <?php else: ?>
                        <!-- Navbar para usuarios no logueados -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-end">
                            <li class="nav-item">
                                <a class="btn btn-outline-success" href="<?php echo base_url('/login'); ?>">Iniciar Sesion</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

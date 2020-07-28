<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GXtec</title>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">GV10x</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configurações</a>
                        <a class="dropdown-item" href="#">Mensagens</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login.php">Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gerencial</div>
                            <a class="nav-link" href="../gerencial/dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Operacional</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pesquisa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../precos/precos.php">Preços</a>
                                    <a class="nav-link" href="../vendas/vendas.php">Gestão de Vendas</a>
                                </nav>
                            </div>
                        
                            <a class="nav-link" href="../clientes/clientes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Clientes
                            </a>
                            <div class="sb-sidenav-menu-heading">Administrativo</div>
                            <a class="nav-link" href="../clientes/grupoClientes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Grupo Clientes
                            </a>
                            <a class="nav-link" href="../colaboradores/colaboradores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Colaboradores
                            </a>
                            <a class="nav-link" href="../fornecedores/fornecedores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Fornecedores
                            </a>
                            
                            <a class="nav-link" href="../categorias/categorias.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Categorias
                            </a>
                            
                            <a class="nav-link" href="../produtos/produtos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Produtos
                            </a>
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                        
                    </div>
                </nav>
            </div>
    
</html>

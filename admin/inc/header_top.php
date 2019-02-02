<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p>Usuário</p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="?pagina=user">Cadastrar</a></li>
                <li><a href="?pagina=editarUser">Listar</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p>Categoria</p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="?pagina=categoria">Cadastrar</a></li>
                <li><a href="?pagina=listarCategoria">Listar</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p>Artigos</p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="?pagina=artigo">Cadastrar</a></li>
                <li><a href="?pagina=listarArt">Listar</a></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p>Projetos</p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="?pagina=post">Cadastrar</a></li>
                <li><a href="?pagina=listarPost">Listar</a></li>
            </ul>
        </li>
          

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p><?php echo $_SESSION['nome']; ?></p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="ti-settings"></i>
                <p>Settings</p>
            </a>
        </li>
    </ul>

</div>
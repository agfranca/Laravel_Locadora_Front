<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <img style="width: 10%" class="img-fluid" src="https://www.se.senac.br/wp-content/uploads/2018/07/senac_white.png">
        <a style="padding-top: 60px;padding-left: 20px" class="navbar-brand" href="{{ route('index') }}">Locadora</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('marcas.index') }}">Marcas</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('modelos.index') }}">Modelos</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('carros.index') }}">Carros</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('locacoes.index') }}">Locações</a></li>              
                @php
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                @endphp
                
                @if (isset($_SESSION['token']))
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('logout') }}">Sair</a></li>
                @endif
            
            </ul>
        </div>
    </div>
</nav>
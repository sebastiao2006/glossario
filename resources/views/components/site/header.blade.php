      <!-- ========================= header-2 start ========================= -->
      <header class="header header-2">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo/logo.png" alt="Logo" />
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                    <ul id="nav2" class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="page-scroll active" href="#home">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#services">Serviços</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#about">Sobre</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#contact">Contacto</a>
                      </li>
                    </ul>
                  {{--   @guest
                        <a href="{{ route('login') }}" class="btn btn-primary ms-3">Login</a>
                    @endguest --}}

                   @auth
                      @if(auth()->user()->role === 'admin')
                          <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                              Painel
                          </a>
                      @elseif(auth()->user()->role === 'funcionario')
                          <a href="{{ route('funcionario.dashboard') }}" class="btn btn-primary">
                              Painel
                          </a>
                      @endif

                     {{--  <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                          @csrf
                          <button type="submit" class="btn btn-danger">Sair</button>
                      </form> --}}
                  @else
                      <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                  @endauth
                  </div>
                  <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
              </div>
            </div>
            <!-- row -->
          </div>
          <!-- container -->
        </div>
        <!-- navbar area -->
      </header>
      <!-- ========================= header-2 end ========================= -->
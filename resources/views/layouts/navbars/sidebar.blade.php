<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
      <h2>ARCHIVAGE</h2>
      <i><img  style="width:50px" src="{{ asset('material') }}/img/SYSTID-2018-update.png"></i>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">Accueil</i>
            <p>{{ __('Accueil') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'typedocument' || $activePage == 'typedocument') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#typedocument" aria-expanded="true">
          <p>{{ __('Gestion Type document') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="typedocument">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'typedocument' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('typedocument.index') }}">
                <span class="sidebar-mini">LTD </span>
                <span class="sidebar-normal">{{ __('Liste des types document') }} </span>
              </a>

            </li>
            <li class="nav-item{{ $activePage == 'typedocument' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('typedocument.create') }}">
                <span class="sidebar-mini">ATD </span>
                <span class="sidebar-normal"> {{ __('Ajouter type document') }} </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'document' || $activePage == 'document') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#document" aria-expanded="true">
          <p>{{ __('Gestion  document') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="document">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'document' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('document.index') }}">
                <span class="sidebar-mini">LD </span>
                <span class="sidebar-normal">{{ __('Liste des  document') }} </span>
              </a>

            </li>
            <li class="nav-item{{ $activePage == 'document' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('document.create') }}">
                <span class="sidebar-mini">AD </span>
                <span class="sidebar-normal"> {{ __('Ajouter document') }} </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <p>{{ __(' Utilisateurs') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Gestion Utilisateur') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.create') }}">
                <span class="sidebar-mini"> AU </span>
                <span class="sidebar-normal"> {{ __('Ajouter Utilisateur') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Profile Utilisateur') }} </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
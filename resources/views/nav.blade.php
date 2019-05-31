<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

        <!-- Sidebar user panel -->

       


        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">

            @if(Auth::check())
                @if(Auth::user()->admin == 0)
            <li class="{{ HTML::menu_active('/') }}"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Accueil</span></a></li>

            <li class="{{ HTML::menu_active('clients') }}"><a href="{{ url('clients') }}"><i class="fa fa-users"></i><span>Clients</span></a></li>

            <li class="{{ HTML::menu_active('invoices') }}"><a href="{{ url('invoices') }}"><i class="fa fa-file-pdf-o"></i><span>Factures</span></a></li>

            <li class="{{ HTML::menu_active('avoir') }}"><a href="{{ url('avoir') }}"><i class="fa fa-file-pdf-o"></i><span>Avoir</span></a></li>
            <li class="{{ HTML::menu_active('bon') }}"><a href="{{ url('bon') }}"><i class="fa fa-file-pdf-o"></i><span>Bon</span></a></li>

            <li class="{{ HTML::menu_active('estimates') }}"><a href="{{ url('estimates') }}"><i class="fa fa-quote-left"></i><span>Devis</span> </a></li>

            <li class="{{ HTML::menu_active('payments') }}"><a href="{{ url('payments') }}"><i class="fa fa-money"></i><span>Paiements</span></a></li>

            <li class="{{ HTML::menu_active('expenses') }}"><a href="{{ url('expenses') }}"><i class="fa fa-credit-card "></i><span>Depenses</span></a></li>

            <li class="{{ HTML::menu_active('products') }}"><a href="{{ url('products') }}"><i class="fa fa-puzzle-piece"></i> <span>Produits</span></a></li>

            <li class="{{ HTML::menu_active('stock') }}"><a href="{{ url('stock') }}"><i class="fa fa-puzzle-piece"></i> <span>Stock</span></a></li>
            <li class="{{ HTML::menu_active('providers') }}"><a href="{{ url('providers') }}"><i class="fa fa-puzzle-piece"></i> <span>Fournisseurs</span></a></li>

            <li class="{{ HTML::menu_active('reports') }}"><a href="{{ url('reports') }}"><i class="fa fa-line-chart"></i> <span>Rapports</span></a></li>
                @endif
            @endif
                    @if(Auth::check())
               @if(Auth::user()->admin != 0)
            <li class="{{ HTML::menu_active('users') }}"><a href="{{ route('users.index') }}"><i class="fa fa-user "></i> <span>Utilisateurs</span></a></li>
                @endif
            @endif
            <li class="{{ HTML::menu_active('settings') }}"><a href="{{ url('settings/company') }}"><i class="fa fa-cogs fa-1x "></i> <span>Configurations</span></a></li>

            <li class="header">ACCOUNT MENU</li>

            <li class="{{ HTML::menu_active('profile') }}"><a href="{{ url('profile') }}"><i class="fa fa-file fa-1x "></i> <span>Profile</span></a></li>

            <li class="{{ HTML::menu_active('logout') }}"><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out fa-1x "></i> <span>Deconnexion</span></a></li>

        </ul>

    </section>

    <!-- /.sidebar -->

</aside>
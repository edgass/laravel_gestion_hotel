<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center" ><img src="{{asset('dist/img/b.jpg')}}"  class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="{{route('logout')}}" oneclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-power-off"></i></a> </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONNEL</li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Gesion des Clients</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/back/client">Liste des clients</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Gestion de Personnel</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
           <li><a href="/back/recruitement">Recuritement</a></li>
           <li><a href="/back/employe">Enploye</a></li>
        </ul>
        </li>
        <li class="treeview"><a href="#">Gestion de pointage <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
              <ul class="treeview-menu">
                <li><a href="/back/heurentre">Heur d 'Entre</a></li>
                <li><a href="/back/heursortie">Heur de Sortie</a></li>
                <li><a href="/back/heurpose">Heur de Pose</a></li>
              </ul>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>Gestion de Reservation</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
            <li><a href="/back/reschambre">Chambre</a></li>
            <li><a href="/back/resparking">Parking</a></li>
            <li><a href="/back/resrestaurant">Restaurant</a></li>
            <li><a href="/back/respiscine">Piscine</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Gestion de Chambre</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/back/chambre">Liste des chambres</a></li>
          </ul>
        <li class="treeview"> <a href="#"> <i class="fa fa-map-marker"></i> <span>GESTION DE PARKING</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/back/parking">Liste des places</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-paint-brush"></i> <span>GESTION DE PISCINE</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/back/piscine">Liste des piscines</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>GESTION DE TABLE </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/back/table_restaurant">Liste des tables</a></li>

          </ul>
        </li>
        <li class="treeview"> <a href=""> <i class="fa fa-money"></i> <span>FACTURATION</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/facture">Liste des factures</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href=""> <i class="fa fa-usd"></i> <span>COMPTABILITE</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/comptabilite">Liste des prestations</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- <li>
                        <a href="/"><i class="ti-home"></i><span class="right-nav-text">Dashbord</span> </a>
                    </li> -->
                    <li>
                        <a href="{{ route('client.index') }}"><i class="ti-user"></i><span class="right-nav-text">Clients</span> </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('client.archive') }}"><i class="ti-user"></i><span class="right-nav-text">Archivage Clients</span> </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('client.index') }}"><i class="ti-car"></i><span class="right-nav-text">Voitures</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('client.index') }}"><i class="ti-calendar"></i></i><span class="right-nav-text">Réservations</span> </a>
                    </li> -->
                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#client">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">Clients</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="client" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="/AjouterClient"><i class="ti-plus"></i>Nouveau Client</a> </li>
                            <li> <a href="{{ route('client.index') }}"><i class="ti-list"></i>Liste Clients</a> </li>
                        </ul>
                    </li> -->
                    
                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#voiture">
                            <div class="pull-left"><i class="ti-car"></i><span class="right-nav-text">Voitures</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="voiture" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#"><i class="ti-plus"></i>Nouvelle Voiture</a> </li>
                            <li> <a href="{{ route('client.index') }}"><i class="ti-list"></i>Liste Voitures</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reservation">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">Réservations</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="reservation" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#"><i class="ti-plus"></i>Nouvelle Réservation</a> </li>
                            <li> <a href="{{ route('client.index') }}"><i class="ti-list"></i>Liste Réservations</a> </li>
                        </ul>
                    </li> -->
                  

                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-archive"></i><span class="right-nav-text">Archivage</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('client.archive') }}"><i class="ti-user"></i>Clients</a> </li>
                            <li> <a href="#"><i class="ti-car"></i>Voitures</a> </li>
                            <li> <a href="#"><i class="ti-calendar"></i>Réseravations</a> </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
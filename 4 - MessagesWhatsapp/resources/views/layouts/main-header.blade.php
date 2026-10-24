<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-left navbar-brand-wrapper ml-4">
        <!-- <a class="navbar-brand brand-logo" href="/"><img src="../assets/images/car.jpg" width="40px" alt=""></a> -->
        <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px; ">
            <b class="text-info">M</b>essages
        </span>
    </div>
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
      
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="button-toggle-nav inline-block pull-left"><i class="ti-fullscreen"></i></a>
        </li>
       

    </ul>
    <ul class="nav navbar-nav">

        <li class="nav-item">
            <div>
                <h4><b>@yield('title')</b></h4>
            </div>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">

        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="../assets/images/bilal.jpg" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">Bilal Daoudi</h5>
                            <span>Bilaldaoudi@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
            </div>
        </li>
    </ul>
</nav>
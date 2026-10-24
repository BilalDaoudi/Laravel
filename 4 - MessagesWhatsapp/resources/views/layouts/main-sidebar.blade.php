<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- <li>
                        <a href="/"><i class="ti-home"></i><span class="right-nav-text">Dashbord</span> </a>
                    </li> -->
                    <li>
                        <a href="{{ route('destinataires') }}"><i class="ti-user"></i><span class="right-nav-text">Destinataires</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('messages') }}"><i class="ti-text"></i><span class="right-nav-text">Messages</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('EnvoyerMessage') }}"><i class="ti-comment-alt"></i><span class="right-nav-text">Envoyer Message</span> </a>
                    </li>
                    <li>
                        <a href=""><i class="ti-check"></i><span class="right-nav-text">Programmer Message</span> </a>
                    </li>       
                </ul>
            </div>
        </div>
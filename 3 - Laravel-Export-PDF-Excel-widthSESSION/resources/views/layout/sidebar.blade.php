<div class="sidebar" data-color="orange">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
        <i class="bi bi-cash"></i> 
        </a>
        <a href="#" class="simple-text logo-normal">
            Exchange
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="#">
                    <i class="bi bi-bar-chart"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="bi bi-pencil"></i>
                    <p>Actions Comptable</p>
                </a>
            </li>
            <li>
                <a href="{{ route('devise.index') }}">
                    <i class="bi bi-currency-exchange"></i>
                    <p>Manage Devise</p>
                </a>
            </li>
            <li  class="">
                <a href="{{ route('clients.index') }}">
                    <i class="bi bi-people"></i>
                    <p>Clients</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-box"></i>
                    <p>Stock</p>
                </a>
            </li>
            <li>
                <a href="{{ route('comptables.index') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    <p>Comptables</p>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.index') }}">
                    <i class="bi bi-gear"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="./upgrade.html">
                    <i class="bi bi-archive"></i>
                    <p>Historique Opérations</p>
                </a>
            </li>
        </ul>
    </div>
</div>
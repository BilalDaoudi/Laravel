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
                <a href="#" onclick="toggleContent()">
                    <i class="bi bi-cash"></i>
                    <p>Devise</p>
                </a>
                <ul id="deviseContent" style="display: none;">
                    <li>
                        <a href="./Devise">
                            <i class="bi bi-cash"></i>
                            <p>Manage Devise</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-coin"></i>
                            <p>Devise de base</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li  class="">
                <a href="./clients">
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
                <a href="#">
                    <i class="bi bi-person-lines-fill"></i>
                    <p>Comptable</p>
                </a>
            </li>
            <li>
                <a href="#">
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
<script>
    function toggleContent() {
        var content = document.getElementById("deviseContent");
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
</script>

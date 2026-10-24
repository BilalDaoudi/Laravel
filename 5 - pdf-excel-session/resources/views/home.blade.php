<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Home
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class>
    <div class="wrapper ">
        @include('layout.sidebar')
        <div class="main-panel" id="main-panel">
            @include('layout.navbar')
            <div class="panel-header panel-header-lg">

            </div>
            <div class="content">


                <div class="" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-3 h5 card-title text-center" style="color: blueviolet; "> Les Clients</div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" style="border:1px solid gray" placeholder="Rechercher...">
                                            <!-- <span class="input-group-text"  style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;background-color: white;">
                                                <i class="bi bi-search"></i>
                                            </span> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center ">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn" style="background-color: blue;"><i class="bi bi-plus"></i> New</a>
                                        <a href="#" class="btn btn-danger"><i class="bi bi-file-earmark-arrow-down"></i> Export</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-border">
                                        <table class="table table-bordered  text-center">
                                            <thead class="">
                                                <th>Identifient</th>
                                                <th>Nom</th>
                                                <th>Localisation</th>
                                                <th>Commentaire</th>
                                                <th>Bloquer</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bilal591</td>
                                                    <td>Bilal Daoudi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-unlock"></i> unlock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bilal591</td>
                                                    <td>Bilal Daoudi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-unlock"></i> unlock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bilal591</td>
                                                    <td>Bilal Daoudi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-unlock"></i> unlock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mohamed23</td>
                                                    <td>Mohamed Farfachi</td>
                                                    <td>Nador</td>
                                                    <td>-</td>
                                                    <td><a href="#"><i class="bi bi-lock"></i> lock</a></td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="bi bi-key"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=" row">
                                        <nav aria-label="Page navigation" class="mx-auto w-100">
                                            <ul class="pagination w-100  justify-content-center">
                                                <li class="page-item"><a class="page-link" href="#" aria-label="Précédent"><span aria-hidden="true">&laquo;</span></a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                <li class="page-item"><a class="page-link" href="#" aria-label="Suivant"><span aria-hidden="true">&raquo;</span></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bootstrap Popup</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>This is a simple Bootstrap popup example.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap JS and Popper.js -->
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                @include('layout.footer')
            </div>
        </div>
        <script src="{{ asset('/assets/js/core/jquery.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/now-ui-dashboard.min.js') }}" defer type="text/javascript"></script>
</body>

</html>
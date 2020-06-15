@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        background-color: #2196F3;
        padding: 10px;
    }

    .grid-item {
        /* background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8); */
        padding: 20px;
        /* font-size: 30px; */
        /* text-align: center; */
    }
</style>
@endsection


@section('body')

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

    <!-- <h2 class="mb-4">Sidebar #02</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
    <br>
    <!-- <div class="grid-container"> -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="single_product_list_slider">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{ url('img/imageProduits/lit.jpeg') }}" alt="">
                                <div class="single_product_text">
                                    <h4>Nom du Produit</h4>
                                    <h3>1500.85 Dhs</h3>
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                        <!-- <i class="ti-heart"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Thornton</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->
</div>

@endsection

@section('scripts')

<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#homeSubmenu').removeClass();
        $('#homeSubmenu').addClass('list-unstyled collapse show');
        $('#linkListProd').addClass('activeLink');
    });
</script>
@endsection
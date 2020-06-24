@extends('layout.app')

@section('linkcss')
<!-- nice select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/price_rangs.css">

@endsection
@section('body')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Cart Products</h2>
            <p>Home <span>-</span>Cart Products</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area padding_top">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Produit</th>
              <th scope="col">Prix</th>
              <th scope="col">Quantité</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>

            @if(session()->has("produits"))
            @foreach(session()->get("produits")->keys() as $prod)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex" style="width: 33%;">
                    <!-- TODO : rechercher tof par id_caractéristique non pas par id_produit !! -->
                    <img style="border-radius: 22px;" src='images/{{ collect(DB::select("select photo.chemin_photo from produit inner join photo ON photo.produit_ = produit.id_produit where id_produit = $prod"))->first()->chemin_photo }}' alt="" />
                  </div>
                  <div class="media-body">
                    <!-- TODO : rechercher nom_produit par id_caractéristique non pas par id_produit !! -->
                    <p>
                      {{ collect(DB::select("select nom_produit from produit where id_produit = $prod"))->first()->nom_produit }}
                    </p>
                  </div>
                </div>
              </td>
              <td>
                <h5>
                  Prix
                </h5>
              </td>
              <td>
                <div class="product_count">
                  <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                  <input class="input-number" type="text" min="0" value="{{ session()->get('produits')['' . $prod] }}">
                  <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                </div>
              </td>
              <td>
                <h5>$720.00</h5>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>
                Votre panier est vide !
              </td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif

            <tr class="bottom_button">
              <td>
                <a class="btn_1" href="#">Update Cart</a>
              </td>
              <td></td>
              <td></td>
              <td>
                <div class="cupon_text float-right">
                  <a class="btn_1" href="#">Close Coupon</a>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>$2160.00</h5>
              </td>
            </tr>
            <tr class="shipping_area">
              <td></td>
              <td></td>
              <td>
                <h5>Shipping</h5>
              </td>
              <td>
                <div class="shipping_box">
                  <ul class="list">
                    <li>
                      <a href="#">Flat Rate: $5.00</a>
                    </li>
                    <li>
                      <a href="#">Free Shipping</a>
                    </li>
                    <li>
                      <a href="#">Flat Rate: $10.00</a>
                    </li>
                    <li class="active">
                      <a href="#">Local Delivery: $2.00</a>
                    </li>
                  </ul>
                  <h6>
                    Calculate Shipping
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </h6>
                  <select class="shipping_select">
                    <option value="1">Bangladesh</option>
                    <option value="2">India</option>
                    <option value="4">Pakistan</option>
                  </select>
                  <select class="shipping_select section_bg">
                    <option value="1">Select a State</option>
                    <option value="2">Select a State</option>
                    <option value="4">Select a State</option>
                  </select>
                  <input type="text" placeholder="Postcode/Zipcode" />
                  <a class="btn_1" href="#">Update Details</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
          <a class="btn_1" href="#">Continue Shopping</a>
          <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
        </div>
      </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection

@section('scripts')
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
<script>
  $(document).ready(function() {
    $(".input-number-decrement").unbind("click");
    $(".input-number-increment").unbind("click");

    
  })
</script>
@endsection
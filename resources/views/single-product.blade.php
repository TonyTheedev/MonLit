@extends('layout.app')

@section('linkcss')
<link rel="stylesheet" href="{{ url('css/lightslider.min.css') }}">

@endsection

@section('body')
<!-- breadcrumb start-->
<section class="breadcrumb" style="background-image: url('/img/ImgIrina.png');">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2> {{ $info_produit->nom_marque }} </h2>
            <p>{{ $info_produit->sloggan_marque }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner justify-content-between">
      <div class="col-lg-7 col-xl-7">
        <div class="product_slider_img">
          <div id="vertical">

            @foreach(
            DB::select("select * from photo where produit_ = $info_produit->id_produit ")
            as
            $photo
            )
            <div data-thumb="/images/{{$photo->chemin_photo}}" style="filter: contrast(0.5);">
              <img src="/images/{{$photo->chemin_photo}}" style="border-radius: 20px;" />
            </div>
            <div data-thumb="/images/{{$photo->chemin_photo}}">
              <img src="/images/{{$photo->chemin_photo}}" style="border-radius: 20px;" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="s_product_text">
          <h3>{{ $info_produit->nom_produit }}</h3>
          <h5>
            @foreach(
            DB::select("
            select id_caractere, libelle_option_produit from produit inner join carateristique on carateristique.produit_ = produit.id_produit
            where produit.id_produit = $info_produit->id_produit")
            as
            $info
            )
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" class="radioOptions" name="radioOptions" id="{{$info->id_caractere}}">
              <label class="form-check-label" for="{{$info->id_caractere}}"> {{ $info->libelle_option_produit }}</label>
            </div>
            @endforeach
          </h5>
          <h2 id="prix"></h2>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Catégorie</span> : {{ $info_produit->libelle_type }}</a>
            </li>
            <li>
              <a href="#"> <span>disponibilité</span> : {{ $info_produit->qtt_stock }} en Stock</a>
            </li>
          </ul>
          <p id="containerDescriptions">

          </p>
          <div class="card_area d-flex justify-content-between align-items-center">
            <div class="product_count">
              <span class="inumber-decrement"> <i class="ti-minus"></i></span>
              <input class="input-number" type="text" value="1" min="0" max="10">
              <span class="number-increment"> <i class="ti-plus"></i></span>
            </div>
            <a href="#" class="btn_3" style="font-weight: 700;">Au panier !</a>
            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">caractéristiques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Commentaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Demonstration</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
          Beryl Cook is one of Britain’s most talented and amusing artists
          .Beryl’s pictures feature women of all shapes and sizes enjoying
          themselves .Born between the two world wars, Beryl Cook eventually
          left Kendrick School in Reading at the age of 15, where she went
          to secretarial school and then into an insurance office. After
          moving to London and then Hampton, she eventually married her next
          door neighbour from Reading, John Cook. He was an officer in the
          Merchant Navy and after he left the sea in 1956, they bought a pub
          for a year before John took a job in Southern Rhodesia with a
          motor company. Beryl bought their young son a box of watercolours,
          and when showing him how to use it, she decided that she herself
          quite enjoyed painting. John subsequently bought her a child’s
          painting set for her birthday and it was with this that she
          produced her first significant work, a half-length portrait of a
          dark-skinned lady with a vacant expression and large drooping
          breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
        </p>
        <p>
          It is often frustrating to attempt to plan meals that are designed
          for one. Despite this fact, we are seeing more and more recipe
          books and Internet websites that are dedicated to the act of
          cooking for one. Divorce and the death of spouses or grown
          children leaving for college are all reasons that someone
          accustomed to cooking for more than one would suddenly need to
          learn how to adjust all the cooking practices utilized before into
          a streamlined plan of cooking that is more efficient for one
          person creating less
        </p>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5>128mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5>508mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5>85mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5>52gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Quality checking</h5>
                </td>
                <td>
                  <h5>yes</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Freshness Duration</h5>
                </td>
                <td>
                  <h5>03days</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>When packeting</h5>
                </td>
                <td>
                  <h5>Without touch of hand</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Each Box contains</h5>
                </td>
                <td>
                  <h5>60pcs</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="comment_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-1.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <!-- <a class="reply_btn" href="#">Reply</a> -->
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item reply">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-2.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <!-- <a class="reply_btn" href="#">Reply</a> -->
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-3.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <!-- <a class="reply_btn" href="#">Reply</a> -->
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Ajouter un commentaire</h4>
              <p>Votre note : </p>
              <ul class="list">
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
              </ul>
              <!-- <p>Outstanding</p> -->
              <form class="row contact_form" action="" method="post" novalidate="novalidate" autocomplete="off">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nom complet" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Adresse email" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="number" placeholder="Numéro de téléphone" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="1" style="height: 100px;" placeholder="Votre avis"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn_3">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>En Moyenne</h5>
                  <h4>4.0</h4>
                  <h6>(03 personnes)</h6>
                </div>
              </div>
              <div class="col-6">
                <div class="rating_list">
                  <h3>Basé sur 3 commentaires</h3>
                  <ul class="list">
                    <li>
                      <a href="#">5 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">4 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">3 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">2 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">1 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="review_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-1.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-2.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/product/single-product/review-3.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Ajouter un commentaire</h4>
              <p>Votre note : </p>
              <ul class="list">
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
              </ul>
              <!-- <p>Outstanding</p> -->
              <form class="row contact_form" action="" method="post" novalidate="novalidate" autocomplete="off">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nom complet" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Adresse email" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="number" placeholder="Numéro de téléphone" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="1" style="height: 100px;" placeholder="Votre avis"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn_3">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="section_tittle text-center">
          <h2>Top Des Achats</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="best_product_slider owl-carousel">
          <div class="single_product_item">
            <img src="{{ url('img/product/product_1.png') }}" alt="">
            <div class="single_product_text">
              <h4>Nom du produit</h4>
              <h3>1200.50 DHS</h3>
            </div>
          </div>
          <div class="single_product_item">
            <img src="{{ url('img/product/product_2.png') }}" alt="">
            <div class="single_product_text">
              <h4>Nom du produit</h4>
              <h3>1200.50 DHS</h3>
            </div>
          </div>
          <div class="single_product_item">
            <img src="{{ url('img/product/product_3.png') }}" alt="">
            <div class="single_product_text">
              <h4>Nom du produit</h4>
              <h3>1200.50 DHS</h3>
            </div>
          </div>
          <div class="single_product_item">
            <img src="{{ url('img/product/product_4.png') }}" alt="">
            <div class="single_product_text">
              <h4>Nom du produit</h4>
              <h3>1200.50 DHS</h3>
            </div>
          </div>
          <div class="single_product_item">
            <img src="{{ url('img/product/product_5.png') }}" alt="">
            <div class="single_product_text">
              <h4>Nom du produit</h4>
              <h3>1200.50 DHS</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product_list part end-->
@endsection

@section('scripts')
<script src="{{ url('js/lightslider.min.js') }}"></script>
<script src="{{ url('js/stellar.js') }}"></script>
<script src="{{ url('js/theme.js') }}"></script>
<script>
  $(document).ready(function() {

    $("input:radio[name='radioOptions']").change(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      // id = 
      $.ajax({
        url: "{{ route('importDescriptions') }}",
        method: 'GET',
        data: {
          id_caracteristique: this.id,
        },
        dataType: 'json',
        success: function(reponse) {
          $('#prix').html(reponse.prix + " Dhs");
          $("#containerDescriptions").empty();
          reponse.descriptions.forEach(function(description) {
            $("#containerDescriptions").append(`<i>${description.libelle_description}</i><br>`);
          });
        }
      });

    });

    Array.from($("input:radio[name='radioOptions']"))[0].click();
  });
</script>
@endsection
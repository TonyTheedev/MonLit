@extends('layout.app')

@section('linkcss')
<!-- nice select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/price_rangs.css">

@endsection

@section('body')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<!-- <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Producta Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- breadcrumb start-->

<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
  <div class="container">
    <div class="returning_customer">
      <div class="check_title">
        <h2 style="background: #90A4A3;border-radius: 30px;">
          Bénificiez de plusieur avantages en tant que client fidéle !!
          <a href="#" data-toggle="modal" data-target="#modalLogin">
            <strong>Login</strong>
          </a>
        </h2>
      </div>
      <p>
        Si vous étes déja l'un de nos fidéles clients, veuillez <a href="#" data-toggle="modal" data-target="#modalLogin">vous connecter</a>, vos informations de livraison y seront automatiquement
        pré-remplie dans les champs ci-dessous.
      </p>
    </div>
    <div class="cupon_area">
      <div class="check_title">
        <h2 style="background: #90A4A3;border-radius: 30px;">
          Avez-vous un coupon ?
          <!-- <a href="#">Click here to enter your code</a> -->
        </h2>
      </div>
      <input type="text" placeholder="Votre code coupon de promotion" />
      <a class="tp_btn" href="#">Chutter le prix !</a>
    </div>
    <div class="billing_details">
      <form action="{{ route('ConfirmationFinal') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
          <div class="col-lg-8">
            <h3>Informations de paiement</h3>
            <div class="row contact_form">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="nom" placeholder="Nom de famille" autocomplete="off" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="prenom" placeholder="Prénom" />
              </div>

              <div class="col-md-12 form-group row">
                <div class="col row" style="padding-left: 40px;">
                  <div class="primary-radio">
                    <input type="radio" name="radioHomme" id="homme" value="homme" onchange="document.getElementById('femme').checked = false;">
                    <label style="border:1px solid black;" for="homme"></label>
                  </div>
                  <i> &nbsp; Homme</i>
                </div>

                <div class="col row" style="padding-left: 75px;">
                  <div class="primary-radio">
                    <input type="radio" name="radioFemme" id="femme" value="femme" onchange="document.getElementById('homme').checked = false;">
                    <label style="border:1px solid black;" for="femme"></label>
                  </div>
                  <i> &nbsp; Femme</i>
                </div>
              </div>

              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="telephone" placeholder="N&deg; téléphone" />
              </div>

              <div class="col-md-6 form-group p_star">
                <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email" />
              </div>

              <div class="col-md-12 form-group p_star">
                <select class="country_select" name="ville">
                  <option value="Nador">Nador</option>
                  <option value="Oujda">Oujda</option>
                  <option value="Berkane">Berkane</option>
                  <option value="Rabat">Rabat</option>
                  <option value="Fes">Fes</option>
                  <option value="Casa_Blanca">Casa Blanca</option>
                </select>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="adresse" placeholder="Addresse de livraison" />
              </div>

              <div class="col-md-12 form-group">
                <input type="number" class="form-control" id="zip" name="codePostal" placeholder="Code postal" />
              </div>

              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <input type="checkbox" id="f-option2" name="compte" />
                  <label for="f-option2">Créer un compte.</label>
                </div>
              </div>

              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>Plus de Détails ?</h3>
                  <!-- <input type="checkbox" id="f-option3" name="selector" />
                <label for="f-option3">Ship to a different address?</label> -->
                </div>
                <textarea style="border: dotted;" class="form-control" name="message" id="message" rows="1" placeholder="Si vous avez besoin de quelquechose n'hésitez pas de laisser un message déscriptif"></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="order_box" style="width: 125%;">
              <h2>Votre Commande</h2>
              <ul class="list">
                <li>
                  <a>Produits
                    <span>Total</span>
                  </a>
                </li>
                @if(session()->has("produits"))
                @foreach(session()->get("produits")->keys() as $prod)
                <li>
                  <a href="{{ url('/Panier') }}" style="color: #90A4A3;">
                    <p style="color: #90A4A3;font-style: italic;font-weight: 600;">{{ collect(DB::select("select produit.nom_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->nom_produit }}
                    </p>

                    <span class="middle"><i class="fas fa-shopping-cart"></i> x {{ session()->get('produits')['' . $prod] }}</span>
                    <span class="last" style="font-weight: 600;color: #21292C;"><i class="fas fa-coins"></i> {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->prix
                        *
                        session()->get('produits')['' . $prod]
                      }} Dhs
                    </span>
                  </a>
                </li>
                @endforeach
                @endif

              </ul>
              <ul class="list list_2">
                <li>
                  <a>Montant :
                    <span id="Montant" style="font-weight: 600;color: #21292C;"></span>
                    <input type="hidden" name="MontantHidden" id="MontantHidden">
                  </a>
                </li>
                <li>
                  <a>Livraison
                    <span>Livraison Option 4: &nbsp; 270 Dhs</span>
                  </a>
                </li>
                <li>
                  <a>
                    <i style="text-decoration: underline;">Facturation (TTC)</i>
                    <span id="Facturation" style="font-weight: 600;color: #21292C;text-decoration: underline;"></span>
                    <input type="hidden" name="FacturationHidden" id="FacturationHidden">
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" checked />
                  <label for="f-option5">Par Chéque</label>
                  <div class="check"></div>
                </div>
                <p>
                  Veuillez envoyez un chéque au
                  <br>
                  Nom : <span style="font-weight: 500;">MONLIT</span>
                  <br>
                  Adresse : Quartier, Rue N&deg; X.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Par Carte banquaire</label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  RIB de la boutique : <span style="font-weight: 500;">N&deg; 57493157</span>
                  <br>
                  Identifiant : <span style="font-weight: 500;">7778524</span>
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">J'accepte les </label>
                <a href="#">termes et les conditions*</a>
              </div>
              <input id="btnSubmit" type="submit" class="btn_3" value="Procéder">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!--================End Checkout Area =================-->
@endsection

@section('scripts')
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
<script>
  function CalculeFacturation() {
    var somme = 0;
    Array.from(document.getElementsByClassName("last")).forEach(span => {
      somme += parseFloat(span.textContent.split(" ")[1]);
    });
    $('#Montant').html(somme + " Dhs");
    $('#MontantHidden').val(somme + " Dhs");
    $('#Facturation').html('<i class="fas fa-money-bill-wave"></i> ' + (somme + 270) + " Dhs");
    $('#FacturationHidden').val((somme + 270) + " Dhs");
    $('#FacturationHidden').val((somme + 270) + " Dhs");
  }
  CalculeFacturation();

  $("#f-option4").change(function() {
    if (this.checked) {
      $("#btnSubmit").attr("title", "");
      $("#btnSubmit").attr("disabled", false);
      $("#btnSubmit").css("background-color", "#ff3368");
    } else {
      $("#btnSubmit").attr("title", "Veuillez accepter d'abbord les termes & conditions");
      $("#btnSubmit").attr("disabled", true);
      $("#btnSubmit").css("background-color", "lightgray");
    }
  });
  $("#f-option4").change();
</script>
@endsection
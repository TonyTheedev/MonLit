@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="{{ url('css/nouveauProduitStyle.css') }}">

@endsection


@section('body')
<script>
    function viderImage(id) {
        document.getElementById("inpFile" + id).value = "";
        document.getElementById('prvImage' + id).style.backgroundImage = "";
        document.getElementById('toolsImage' + id).style.visibility = "hidden";
        document.getElementById('toolInput' + id).style.visibility = "visible";
    }
</script>
<div id="content" class="p-4 p-md-5 pt-5">

    <div class="">
        <form>
            <h1>Ajout d'un nouveau produit.</h1>
            <br>
            <h3>Informations de base.</h3>
            <div class="row">
                <div class="form-group col" style="padding-left: 0px">
                    <input type="text" required="required" />
                    <label for="input" class="control-label">Libellé du produit</label><i class="bar"></i>
                </div>
                <div class="form-group col" style="padding-left: 0px">
                    <select>
                        <option>Mora</option>
                        <option>Pelee 2</option>
                    </select>
                    <label for="select" class="control-label">Marque</label><i class="bar"></i>
                </div>
                <div class="form-group col" style="padding-left: 0px">
                    <select>

                    </select>
                    <label for="select" class="control-label">Type</label><i class="bar"></i>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input type="number" required="required" />
                    <label for="input" class="control-label">Quantité en stock</label><i class="bar"></i>
                </div>
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input type="number" required="required" />
                    <label for="input" class="control-label">Seuil min </label><i class="bar"></i>
                </div>
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input type="number" required="required" />
                    <label for="input" class="control-label">Seuil max </label><i class="bar"></i>
                </div>
                <div class="form-group col-sm">
                    <input type="color" required="required" />
                    <label for="input" class="control-label">Couleurs disponibles</label><i class="bar"></i>
                </div>
            </div>
            <hr>
            <h3>Photos (Maximum 5).</h3>
            <div class="row">
                <div class="col-sm" id="prvImage1" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage1" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(1)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile1">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput1">
                        <label for="inpFile1">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile1" id="inpFile1" accept="image/*" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage2" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage2" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(2)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile2">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput2">
                        <label for="inpFile2">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile2" id="inpFile2" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage3" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage3" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(3)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile3">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput3">
                        <label for="inpFile3">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile3" id="inpFile3" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage4" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage4" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(4)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile4">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput4">
                        <label for="inpFile4">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile4" id="inpFile4" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage5" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage5" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(5)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile5">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput5">
                        <label for="inpFile5">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile5" id="inpFile5" />
                    </div>

                </div>


                <!-- <div class="form-group">
                    <textarea required="required"></textarea>
                    <label for="textarea" class="control-label">Textarea</label><i class="bar"></i>
                </div>  -->
                <!-- <div class="checkbox">
                    <label>
                        <input type="checkbox" /><i class="helper"></i>I'm the label from a checkbox
                    </label>-->
            </div>
            <br>
            <input type="button" id="btnOption" value="+ options" data-toggle="modal" data-target="#exampleModal">
            <!-- <div class="form-radio">
                <div class="radio">
                    <label>
                        <input type="radio" name="radio" checked="checked" /><i class="helper"></i>I'm the label from a radio button
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="radio" /><i class="helper"></i>I'm the label from a radio button
                    </label>
                </div>
            </div> -->
        </form>
    </div>
    <div class="button-container">
        <button type="button" class="button"><span>Enregistrer</span></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout des options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <small>exemple :</small>
                        <br>
                        <input type="radio" name="radioExemple" id="radioExemple">
                        <label for="radioExemple" id="labelExemple">texte de l'option</label>
                    </div>
                    <div>
                        <input type="text" id="texteOption" oninput="document.getElementById('labelExemple').innerHTML= document.getElementById('texteOption').value">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{ url('js/scriptInputFile.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#homeSubmenu').removeClass();
        $('#homeSubmenu').addClass('list-unstyled collapse show');
        $('#linkNouveauProd').addClass('activeLink');
        $('#btnOption').click();


    });
</script>
@endsection
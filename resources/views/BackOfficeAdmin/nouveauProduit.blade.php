@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="{{ url('css/nouveauProduitStyle.css') }}">
<style>
    .btnSupr {
        background: red;
        color: white;
        border: 0px;
        border-radius: 50px;
        height: 24px;
    }

    #btnLine {
        background-color: #63a4ff;
        background-image: linear-gradient(315deg, #63a4ff 0%, #83eaf1 74%);
        border: 0px;
        border-radius: 10px;
        margin: 10px;
    }

    input[type="color"] {
        -webkit-appearance: none;
        border: none;
        width: 32px;
        height: 32px;
    }

    input[type="color"]::-webkit-color-swatch-wrapper {
        padding: 0;
    }

    input[type="color"]::-webkit-color-swatch {
        border: none;
    }
</style>
@endsection



@section('body')
<script>
    function viderImage(id) {
        document.getElementById("inpFile" + id).value = "";
        document.getElementById('prvImage' + id).style.backgroundImage = "";
        document.getElementById('toolsImage' + id).style.visibility = "hidden";
        document.getElementById('toolInput' + id).style.visibility = "visible";
    }

    let nbrOptions = 0;

    function AjoutOptionItem() {
        document.getElementById('BigContainerOption').insertAdjacentHTML('beforeend',
            `<div class="input-group mb-2" id="ContainerOption${nbrOptions}">` +
            ' <div div class = "input-group-prepend"> ' +
            '   <div class="input-group-text ">' +
            `       <button class="far fa-trash-alt btnSupr" style="color: white;" onclick="suprimerDescription(${nbrOptions})"></button>` +
            '   </div>' +
            '  </div>' +
            ` <input type="text" class="form-control" id="option${nbrOptions}" onfocusout="commitText('labelOption'+${nbrOptions},document.getElementById('option${nbrOptions}').value)" placeholder="- info : petite description." style="border: 1px solid;" >` +
            '</div>');
        document.getElementById('BigContainerLabels').innerHTML +=
            `<label id="labelOption${nbrOptions}" style="cursor: default;font-weight: 900;">- info : petite description.</label><br id="br${nbrOptions}">`;
        nbrOptions++;
    }

    function suprimerDescription(option) {
        document.getElementById('ContainerOption' + option).remove();
        document.getElementById('labelOption' + option).remove();
        document.getElementById('br' + option).remove();
        nbrOptions--;
    }

    function commitText(id, text) {
        document.getElementById(id).innerHTML = text.replace('*', '&times;');
    }
</script>
<div id="content" class="p-4 p-md-5 pt-5">

    <div class="">
        <form action="" method="POST" autocomplete="off">
            @csrf
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
                <div class=" row form-group col-sm">
                    <div class="col">
                        <input type="color" style="border-radius: 7px;border: 3px solid;" value="#FEF4E8" />
                    </div>
                    <div class="col">
                        <input type="color" style="border-radius: 7px;border: 3px solid;" value="#DFC4BB" />
                    </div>
                    <div class="col">
                        <input type="color" style="border-radius: 7px;border: 3px solid;" value="#AD9A8B" />
                    </div>
                    <div class="col">
                        <input type="color" style="border-radius: 7px;border: 3px solid;" value="#4CB3F4" />
                    </div>
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
            <div class="button-container">
                <button type="submit" class="button">
                    <span>Enregistrer</span>
                </button>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout des options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col">
                            <small>exemple :</small>
                            <br>
                            <input type="radio" name="radioExemple" id="radioExemple">
                            <label for="radioExemple" id="labelExemple">270 &times; 100 cms</label>
                            <br>
                            <div id="BigContainerLabels">

                            </div>
                        </div>
                        <hr style="border-left: 5px solid; height : 100px;">
                        <div class="col">
                            <input type="text" placeholder="270 &times; 100 cms" id="texteOption" oninput="document.getElementById('labelExemple').innerHTML= document.getElementById('texteOption').value.replace('*', '&times;');">
                            <br>
                            <button id="btnLine" onclick="AjoutOptionItem()"><i class="fas fa-plus-circle"></i>Ligne</button>
                            <div id="BigContainerOption">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nbrTotalOptions" id="nbrTotalOptions">
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('nbrTotalOptions').value= nbrOptions;">Valider</button>
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

    });
</script>
@endsection
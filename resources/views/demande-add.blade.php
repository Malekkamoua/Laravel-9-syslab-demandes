@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @include('flash-message')
                                <h5>Informations du patient</h5>
                                <hr>
                                <form action="/store" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>N° carte patient</label>
                                                <input type="number" min=0 name="num_carte" class="form-control"
                                                    placeholder="Numéro carte patient" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nom" class="form-control"
                                                    placeholder="Nom du patient" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input type="text" name="prenom" class="form-control"
                                                    placeholder="Prenom du patient" required>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Numéro dossier interne</label>
                                                <input type="number" min=0 name="num_dossier" class="form-control"
                                                    placeholder="Num dossier interne" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Date de naissance</label>
                                                <input type="date" name="ddn" class="form-control" placeholder="Text"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Sexe</label>
                                                <select name="sexe" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="mt-5">Renseignement clinique - traitement </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date du prélevement</label>
                                                <input name="date_prelev" type="datetime-local" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre de tubes</label>
                                                <input type="number" name="nb_tubes" min=0 class="form-control"
                                                    required>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputCity">Température ambiante</label>
                                                    <input type=number name="t_ambiante" min=0 class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputZip"> Refrégeré</label>
                                                    <input type=number name="t_ref" min=0 class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputZip">Congelé</label>
                                                    <input type=number name="t_cong" min=0 class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Type dossier</label>
                                                        <select name="type_dossier" class="form-control" required>
                                                            <option value="Urgent">Urgent</option>
                                                            <option value="Normal">Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Analyses</label>
                                                        <select name="analyses[]" class="form-control selectpicker"
                                                            multiple data-live-search="true" style="height:50px;"
                                                            required>
                                                            <option value=""></option>
                                                            @foreach($analyses as $analyse)
                                                            <option value="{{$analyse->code}}"> {!!
                                                                Str::words($analyse->nom, 3,
                                                                ' ...') !!} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="mt-5">Trisomie 21</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date dernier rendez-vous</label>
                                                <input type="date" name="ddr" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Date début grosesse</label>
                                                <input type="date" name="ddg" class="form-control">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Nombre de foetus</label>
                                                    <input type="number" name="nb_foetus" class="form-control"
                                                        id="taille" placeholder="1">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Taille</label>
                                                    <input type="number" class="form-control" name="taille"
                                                        placeholder="160cm">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip">Poids</label>
                                                    <input type="number" class="form-control" name="poids"
                                                        placeholder="56Kg">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Commentaires
                                                    supplémentaires</label>
                                                <textarea class="form-control" name="commentaires" rows="3"></textarea>
                                            </div>

                                            <br>
                                            <input class="btn btn-success" style="float:right" type="submit"
                                                value="Enregistrer">
                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- [ Main Content ] end -->

        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection


<script>
$(documen t).ready(function() {
    $('select').selectpicker();
})
</script>

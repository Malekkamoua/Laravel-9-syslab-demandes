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
                                <h3>Informations du patient</h3>
                                <hr>
                                <form action="{{ route('store')  }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>N° carte patient</label>
                                                <input type="text" min=0 name="num_carte" class="form-control"
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
                                                <input type="text" min=0 name="num_dossier" class="form-control"
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


                                    <h3 class="mt-5">Renseignement clinique - traitement </h3>
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
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Température ambiante</label>
                                                    <input type=number name="t_ambiante" min=0 class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip"> Refrégeré</label>
                                                    <input type=number name="t_ref" min=0 class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
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

                                    <h3 class="mt-5">Trisomie 21</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date dernières regles</label>
                                                <input type="date" name="ddr" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Date début grosesse</label>
                                                <input type="date" name="ddg" class="form-control">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Nombre de foetus</label>
                                                    <input type="number" name="nb_foetus" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Taille patiente</label>
                                                    <input type="number" class="form-control" name="taille">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip">Poids patiente</label>
                                                    <input type="number" class="form-control" name="poids">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Type de grossesse</label>
                                                <select name="type_grossesse" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option value="Spontanée">Spontanée</option>
                                                    <option value="FIV">FIV</option>
                                                    <option value="ICSI">ICSI</option>
                                                    <option value="Dons d'ovule">Dons d'ovule</option>
                                                    <option value="Inconnu">Inconnu</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Date échographie</label>
                                                <input type="date" name="date_echo" class="form-control">
                                            </div>
                                            Age échographique <br>
                                            <div class="form-row" style="margin-top:7px">
                                                <div class=" form-group col-md-6">
                                                    <input type="number" name="age_echo_sem" class="form-control"
                                                        placeholder="semaines">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" name="age_echo_jours"
                                                        placeholder="jours">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputZip">Clarté nucale</label>
                                                    <input type="text" name="clarte_nuc" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputZip">LCC</label>
                                                    <input type="text" class="form-control" name="lcc">
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Commentaires
                                                    supplémentaires</label>
                                                <textarea class="form-control" name="commentaires" maxlength="135"
                                                    rows="3"></textarea>
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

@push('js')

<script>
$(documen t).ready(function() {
    $('select').selectpicker({
        noneSelectedText: 'Choisir le(s) analyses demandé(s)'
    });
})
</script>
@endpush
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
                                <h5>Informations du patient</h5>
                                <hr>
                                <form action="{{ url('/update/'.$demande->id) }}" method="post">
                                    {{ csrf_field() }}

                                    <div id="printableArea">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>N° carte patient</label>
                                                    <input type="number" min=0 name="num_carte" class="form-control"
                                                        value="{{ $demande->num_carte }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control"
                                                        value="{{ $demande->nom }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Prenom</label>
                                                    <input type="text" name="prenom" class="form-control"
                                                        value="{{ $demande->prenom }}">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Numéro dossier interne</label>
                                                    <input type="number" min=0 name="num_dossier" class="form-control"
                                                        value="{{ $demande->num_dossier }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date de naissance</label>
                                                    <input type="date" name="ddn" class="form-control"
                                                        value="{{ $demande->ddn }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Sexe</label>
                                                    <select name="sexe" class="form-control">

                                                        <option value="{{ $demande->sexe }}">{{ $demande->sexe }}
                                                        </option>
                                                        <option value="" disabled> -------- </option>
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
                                                        value="{{ $demande->date_prelev }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre de tubes</label>
                                                    <input type="number" name="nb_tubes" min=0 class="form-control"
                                                        value="{{ $demande->nb_tubes }}">
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputCity">Température ambiante</label>
                                                        <input type=number name="t_amb" min=0 class="form-control"
                                                            value="{{ $demande->t_ambiante }}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputZip"> Refrégeré</label>
                                                        <input type=number name="t_ref" min=0 class="form-control"
                                                            value="{{ $demande->t_ref }}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputZip">Congelé</label>
                                                        <input type=number name="t_cong" min=0 class="form-control"
                                                            value="{{ $demande->t_cong }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Type dossier</label>
                                                            <select name="type_dossier" class="form-control">
                                                                <option value="{{ $demande->type_dossier }}">
                                                                    {{ $demande->type_dossier }}
                                                                </option>
                                                                <option value="" disabled> -------- </option>
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
                                                                multiple data-actions-box="true">
                                                                @foreach($selected_analyses as $selected_analyse)
                                                                <option value="{{$selected_analyse->code}}" selected>
                                                                    {!!
                                                                    Str::words($selected_analyse->nom, 3,
                                                                    ' ...') !!} </option>
                                                                @endforeach
                                                                <option disabled> __________ </option>
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
                                                    <input type="date" name="ddr" class="form-control"
                                                        value="{{ $demande->ddr }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Date début grosesse</label>
                                                    <input type="date" name="ddg" class="form-control"
                                                        value="{{ $demande->ddg }}">
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Nombre de foetus</label>
                                                        <input type="number" name="nb_foetus" class="form-control"
                                                            value="{{ $demande->nb_foetus }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputCity">Taille</label>
                                                        <input type="number" class="form-control" name="taille"
                                                            value="{{ $demande->taille }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputZip">Poids</label>
                                                        <input type="number" class="form-control" name="poids"
                                                            value="{{ $demande->poids }}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Commentaires
                                                        supplémentaires</label>
                                                    <textarea class="form-control" name="commentaires"
                                                        rows="3">{{ $demande->commentaires }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div style="float:right">
                                        <a href=" {{ url('demande/pdf/'.$demande->id) }}" class="btn btn-info">
                                            PDF
                                        </a>

                                        <input class="btn btn-success" type="submit" value="Mettre à jour">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection

<script>
$(document).ready(function() {
    $('select').selectpicker({
        noneSelectedText: 'Choisir le(s) analyses demandé(s)'
    });
})
</script>
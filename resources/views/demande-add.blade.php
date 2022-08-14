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
                                <form>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>N° carte patient</label>
                                                <input type="number" min=0 name="carte" class="form-control"
                                                    placeholder="Numéro carte patient">
                                            </div>
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="lastname" class="form-control"
                                                    placeholder="Nom du patient">
                                            </div>
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input type="text" name="firstname" class="form-control"
                                                    placeholder="Prenom du patient">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Numéro dossier interne</label>
                                                <input type="number" min=0 name="dossier" class="form-control"
                                                    placeholder="Num dossier interne">
                                            </div>
                                            <div class="form-group">
                                                <label>Date de naissance</label>
                                                <input type="date" class="form-control" placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Sexe</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Homme</option>
                                                    <option>Femme</option>
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
                                                <input type="datetime-local" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre de tubes</label>
                                                <input type="number" min=0 class="form-control">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputCity">Température ambiante</label>
                                                    <input type=number name="t_amb" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputZip"> Refrégeré</label>
                                                    <input type=number name="t_ref" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputZip">Congelé</label>
                                                    <input type=number name="t_cong" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Type
                                                    dossier</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios"
                                                            id="gridRadios1" value="Urgent" checked>
                                                        <label class="form-check-label" for="gridRadios1">Urgent</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios"
                                                            id="gridRadios2" value="Normal">
                                                        <label class="form-check-label" for="gridRadios2">Normal</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Analyses</label>
                                                <input type="text" class="form-control" placeholder="Text">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="mt-5">Trisomie 21</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date dernier rendez-vous</label>
                                                <input type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Date début grosesse</label>
                                                <input type="date" class="form-control">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Nombre de foetus</label>
                                                    <input type="number" class="form-control" id="taille"
                                                        placeholder="1">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Taille</label>
                                                    <input type="number" class="form-control" id="taille"
                                                        placeholder="160cm">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputZip">Poids</label>
                                                    <input type="number" class="form-control" id="poids"
                                                        placeholder="56Kg">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Commentaires
                                                    supplémentaires</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
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
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
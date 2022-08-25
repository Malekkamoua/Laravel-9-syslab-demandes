<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

<center> <img src="https://barounilab.com/wp-content/uploads/2021/11/cropped-logo-BAROUNI.png" alt="logo"></center>
<h5 class="imgs">
    <center>Laboratoire Nejib Barouni<br> Menzah 6 (Tél: 23 707 465)</center>
</h5>
<h4>
    <center>Fiche patient: {{ $demande->nom }} {{ $demande->prenom }}</center>
</h4>
<br>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>N° carte patient:</b>
                                            {{ $demande->num_carte }}
                                        </div>
                                        <div class="form-group">
                                            <b>Nom:</b>
                                            {{ $demande->nom }}
                                        </div>
                                        <div class="form-group">
                                            <b>Prenom:</b>
                                            {{ $demande->prenom }}
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Numéro dossier interne:</b>
                                            {{ $demande->num_dossier }}
                                        </div>
                                        <div class="form-group">
                                            <b>Date de naissance:</b>
                                            {{ $demande->ddn }}
                                        </div>
                                        <div class="form-group">
                                            <b for="exampleFormControlSelect1">Sexe:</b>
                                            {{ $demande->sexe }}
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-5">Renseignements cliniques - traitements </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <b>Date du prélevement:</b>
                                            {{ $demande->date_prelev }}
                                        </div>
                                        <div class="form-group">
                                            <b>Nombre de tubes:</b>
                                            {{ $demande->nb_tubes }}
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <b for="inputCity">Température ambiante:</b>
                                                {{ $demande->t_ambiante }}
                                            </div>
                                            <div class="form-group col-md-3">
                                                <b for="inputZip"> Refrégeré:</b>
                                                {{ $demande->t_ref }}
                                            </div>
                                            <div class="form-group col-md-3">
                                                <b for="inputZip">Congelé:</b>
                                                {{ $demande->t_cong }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b for="exampleFormControlSelect1">Type dossier:</b>
                                                    {{ $demande->type_dossier }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-5">Analyses demandées</h5> <br>
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Libellé</th>
                                                <th scope="col">Nature</th>
                                                <th scope="col">Concervation</th>
                                                <th scope="col">Delais</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            @foreach($analyses as $analyse)
                                            <tr>
                                                <td> {!! Str::words($analyse->nom, 3, ' ...') !!} </td>
                                                <td>{!! Str::words($analyse->nature_cond, 3, ' ...') !!}</td>
                                                <td>{!! Str::words($analyse->concervation, 3, ' ...') !!} </td>
                                                <td>{{ $analyse->delai }} </td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="mt-5">Trisomie 21</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Date dernier rendez-vous:</b>
                                        {{ $demande->ddr }}

                                        <b>Date début grosesse:</b>
                                        {{ $demande->ddg }}

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <b>Nombre de foetus:</b>
                                                {{ $demande->nb_foetus }}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <b for="inputCity">Taille:</b>
                                                {{ $demande->taille }}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <b for="inputZip">Poids:</b>
                                                {{ $demande->poids }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <b for="exampleFormControlTextarea1">Commentaires
                                                supplémentaires:</b> <br>
                                            {{ $demande->commentaires }}
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
</div>
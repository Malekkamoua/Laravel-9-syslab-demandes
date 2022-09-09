@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<style>
.dataTables_filter {
    width: 60%;
    position: relative;
    left: 62%;
    margin-bottom: 1%;
}

.blink {
    animation: blinker 0.6s linear infinite;
    color: red;
    font-size: 30px;
    font-weight: bold;
    font-family: sans-serif;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}

.blink-one {
    animation: blinker-one 1s linear infinite;
}

@keyframes blinker-one {
    0% {
        opacity: 0;
    }
}
</style>

<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Demandes</h5>
                            <span class="h2 font-weight-bold mb-0">350,897</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0"> <a
                                    href=" {{ url('consulter/demandes/en%20cours') }}"> Demandes en cours </a></h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title text-uppercase text-muted mb-0"> <a
                                    href=" {{ url('consulter/demandes/finales') }}">
                                    <p class="blink blink-one" style="font-size:13px;"> Nouvelles demandes traitées</p>
                                </a></div>
                            <span class=" h2 font-weight-bold mb-0">924</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Liste demandes</h3>
                        </div>
                        <a href=" {{ url('demandes/ajouter') }}" style='position:relative; left:20%'
                            class="btn btn-info btn-sm">
                            Ajouter demande
                        </a>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive" style="width:100%; margin:1%">
                    <table id="example" class="display hover table align-items-center table-flush">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Num dossier</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Date prélévement</th>
                                <th scope="col">Type dossier</th>
                                <th scope="col">Etat dossier</th>
                                <th scope="col">Résultats</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                            <tr>
                                <td>{{$demande->id}}</td>
                                <td> {{$demande->num_dossier}} </td>
                                <td>{{$demande->nom}} {{$demande->prenom}} </td>
                                <td>{{$demande->date_prelev}}</td>
                                <td> {{$demande->type_dossier}} </td>
                                <td> {{$demande->etat_dossier}} </td>
                                <td> {{$demande->etat_dossier}} </td>
                                <td class="text-center" style="display: flex;">
                                    @if($demande->etat_dossier == 'en codurs')
                                    <a href=" {{ url('demande/edit/'.$demande->id) }}" class="btn btn-info btn-sm">
                                        update
                                    </a>
                                    <span>
                                        <form action="{{ url('/delete/'.$demande->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="post">

                                            <button class="btn btn-danger btn-sm">
                                                delete
                                            </button>
                                        </form>
                                    </span>
                                    @else
                                    <a href=" {{ url('demande/edit/'.$demande->id) }}" class="btn btn-success btn-sm">
                                        Consulter
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <br><br>
                    <div style="float:right">{!! $demandes->links() !!}</div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        paging: false,
        info: false,
        "language": {
            "sProcessing": "Traitement en cours ...",
            "sLengthMenu": "Afficher _MENU_ lignes",
            "sZeroRecords": "Aucun résultat trouvé",
            "sEmptyTable": "Aucune donnée disponible",
            "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
            "sInfoEmpty": "Aucune ligne affichée",
            "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
            "sInfoPostFix": "",
            "sSearch": "Recherche par mot clé ",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Chargement...",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": Trier par ordre croissant",
                "sSortDescending": ": Trier par ordre décroissant"
            }
        }
    });
});
</script>





@endpush
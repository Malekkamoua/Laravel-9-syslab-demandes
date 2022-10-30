@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                            @if (!$etat)
                            <h5 class="card-title text-uppercase text-muted mb-0"><a href=" {{ url('demandes') }}">Total
                                    Demandes</h5>
                            @else
                            <h5 class="card-title text-uppercase text-muted mb-0"><a>Total
                                    Demandes</h5>
                            @endif
                            <span class="h2 font-weight-bold mb-0">{{$total}}</span>

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
                            @if (!$etat)
                            <h5 class="card-title text-uppercase text-muted mb-0"> <a
                                    href=" {{ url('consulter/demandes/en%20cours') }}"> Demandes en cours </a></h5>
                            @else
                            <h5 class="card-title text-uppercase text-muted mb-0"> <a> Demandes en cours </a></h5>
                            @endif
                            <span class="h2 font-weight-bold mb-0">{{$en_cours}}</span>

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
                            @if ($final != 0 && !$etat)
                            <div class="card-title text-uppercase text-muted mb-0">
                                <a href=" {{ url('consulter/demandes/final') }}"
                                    class=" card-title text-uppercase text-muted mb-0 blink blink-one"
                                    style="font-size:13px;">
                                    Résultats prêts
                                </a>
                            </div>
                            @else
                            <div class="card-title text-uppercase text-muted mb-0">
                                <h5 class="card-title text-uppercase text-muted mb-0"> Résultats prêts</h5>
                            </div>
                            @endif
                            <span class=" h2 font-weight-bold mb-0">{{$final}}</span>
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
                            <h3 class="mb-0">Liste des demandes</h3>
                        </div>
                        @if(auth()->user()->role == "corr")
                        <a href=" {{ url('demandes/ajouter') }}" style='position:relative; left:20%'
                            class="btn btn-info btn-sm">
                            Ajouter demande
                        </a>
                        @endif
                    </div>
                </div>
                @include('flash-message')
                <!-- Light table -->
                <div class="table-responsive" style="width:100%; margin:1%">
                    <table id="example" class="display hover table align-items-center table-flush">
                        <thead>
                            <tr>


                                <th scope="col">ID</th>
                                @if(auth()->user()->role != "corr")
                                <th scope="col">LABO</th>
                                @endif
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
                                @if(auth()->user()->role != "corr")
                                <td><b>{{$demande->code_labo}}</b></td>
                                @endif
                                <td> {{$demande->num_dossier}} </td>
                                <td>{{$demande->nom}} {{$demande->prenom}} </td>
                                <td>{{$demande->date_prelev}}</td>
                                <td> {{$demande->type_dossier}} </td>
                                <td data-demande-status="{{$demande->id}}"> {{$demande->etat_dossier}} </td>
                                <td>
                                    @if($demande->resultats != null)
                                    @foreach (json_decode($demande->resultats) as $res)
                                    <a href="{{ $res }}" target="_blank" class="results"
                                        data-demande="{{$demande->id}}"> <i class="fa fa-file-pdf-o"
                                            style="font-size:25px;color:red"></i>
                                        @endforeach
                                        @endif
                                </td>
                                <td class="text-center" style="display: flex;">
                                    <a href=" {{ url('demande/pdf/'.$demande->id) }}" id="pdf_link"
                                        class="btn btn-success btn-sm">
                                        PDF
                                    </a>
                                    @if($demande->etat_dossier == 'en cours')
                                    <a href=" {{ url('demande/edit/'.$demande->id) }}" class="btn btn-info btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Mettre à jour">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <span>
                                        <form action="{{ url('/delete/'.$demande->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="post">

                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </span>
                                    @else
                                    <a href=" {{ url('demande/edit/'.$demande->id) }}" class="btn btn-success btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Consulter">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
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
        "ordering": false,
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

    $("a").click(function() {
        let data_id = $(this).data('demande')

        if (data_id != undefined) {
            var elements = document.querySelectorAll('[data-demande-status="' + data_id + '"]');
            elements[0].innerHTML = 'lu';

            $.get('http://127.0.0.1:8000/demande/edit/' + data_id, function(data) {
                console.log("done");
            })
        }
    });
});
</script>









@endpush
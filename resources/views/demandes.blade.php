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
</style>

<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Liste demandes</h3>
                        </div>
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
                                <th scope="col">Etat dossier</th>

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
                                <td class="text-center" style="display: flex;">
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
<script>
$('#editModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('id')
    console.log(recipient)
})
</script>
@endpush

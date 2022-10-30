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
                            <h3 class="mb-0">Liste des analyses disponibles</h3>
                        </div>
                        @if(auth()->user()->role != "corr")
                        <button type="button" style='position:relative; left:22%' class="btn btn-info btn-sm"
                            data-toggle="modal" data-target="#practice_modal">
                            Ajouter analyse
                        </button>
                        @endif
                    </div>
                </div>
                @include('flash-message')

                <form action="{{ route('searchAnalyses') }}" method="get">
                    <div class="form-group col-md-6" style="display:flex; float:right">
                        <input type="text" class="form-control" name="search" style="margin-right:1%; height:30px"
                            placeholder="Recherche par code ou libelle analyse" />
                        <button type=" submit" class="btn btn-sm btn-info" style="margin-right:1%;">Recherche</button>
                        <button class="btn btn-sm btn-info"><i class="fa fa-trash" aria-hidden="true"
                                data-toggle="tooltip" data-placement="top" title="Supprimer filtre"
                                onClick="location.reload();"></i></button>
                    </div>
                </form>

                <!-- Light table -->
                <div class="table-responsive" style="width:100%; margin:1%">
                    <table id="example" class="display hover table align-items-center table-flush">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Nature et condition</th>
                                <th scope="col">Concervation</th>
                                <th scope="col">delais</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($analyses as $analyse)
                            <tr>
                                <td>
                                    <a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal'
                                        data-id="{{ $analyse->id }}">{{ $analyse->code }}</a>
                                </td>
                                <td> {!! Str::words($analyse->nom, 2, ' ...') !!} </td>
                                <td>{!! Str::words($analyse->nature_cond, 2, ' ...') !!}</td>
                                <td>{!! Str::words($analyse->concervation, 2, ' ...') !!} </td>
                                <td>{{ $analyse->delai }} </td>
                                <td>
                                    @if(auth()->user()->role != "corr")
                                    <form action="{{ url('delete/analyse/'.$analyse->id) }}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="post">

                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                            title="Supprimer">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter analyse</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/analyse/add/') }}" method="post">
                                            {{ csrf_field() }}

                                            Code <input type="text" name="code" id="code" class="form-control" required>

                                            Libellé <input type="text" name="name" id="name" class="form-control"
                                                required>

                                            <label for="exampleFormControlTextarea1">Commentaires
                                                supplémentaires</label>

                                            <textarea class="form-control" id="nature_cond" name="nature_cond"
                                                rows="4"></textarea>

                                            Concervation <input type="text" name="concervation" id="concervation"
                                                class="form-control">

                                            Delais: <input type="text" id="delai" name="delai" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">enregistrer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </table>
                    <br><br>
                    <div style="float:right">{!! $analyses->links() !!}
                    </div>
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
    console.log("working")
    $("#example a").click(function() {
        let id = $(this).data('id');
        console.log(id)
        $('#exampleModalLabel').text("Mettre à jours");
        $.get('http://soustraitance.barounilab.com/public/analyse/' + id, function(data) {
            console.log(data);
            $('#practice_modal').modal('show');
            action = 'http://soustraitance.barounilab.com/public/analyse/update/' + id
            console.log(action)
            $('form').attr('action', action);
            $('#code').val(data.analyse.code);
            $('#name').val(data.analyse.nom);
            $('#nature_cond').val(data.analyse.nature_cond);
            $('#concervation').val(data.analyse.concervation);
            $('#delai').val(data.analyse.delai);
        })
    });
});
</script>

<script>
$(document).ready(function() {

    $('#example').DataTable({
        order: false,
        paging: false,
        info: false,
        searching: false,
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
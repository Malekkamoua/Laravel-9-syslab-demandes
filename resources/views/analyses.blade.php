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
                            <h3 class="mb-0">Liste analyses disponibles</h3>
                        </div>
                    </div>
                </div>
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
                                        data-id="{{ $analyse->code }}">{{ $analyse->code }}</a>
                                </td>
                                <td> {!! Str::words($analyse->nom, 3, ' ...') !!} </td>
                                <td>{!! Str::words($analyse->nature_cond, 3, ' ...') !!}</td>
                                <td>{!! Str::words($analyse->concervation, 3, ' ...') !!} </td>
                                <td>{{ $analyse->delai }} </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Informations</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Code: <input type="text" id="code" name="code" class="form-control" value="">
                                        Libellé <input type="text" name="name" id="name" value="" class="form-control">
                                        <label for="exampleFormControlTextarea1">Commentaires
                                            supplémentaires</label>
                                        <textarea class="form-control" id="nature_cond" name="nature_cond"
                                            rows="4"></textarea>

                                        Concervation <input type="text" name="concervation" id="concervation" value=""
                                            class="form-control">
                                        Delais: <input type="text" id="delai" name="delai" class="form-control"
                                            value="">
                                    </div>
                                </div>
                            </div>

                    </table>
                    <br><br>
                    <div style="float:right">{!! $analyses->links() !!}</div>
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
        let code = $(this).data('id');
        console.log(code)
        $.get('http://127.0.0.1:8000/analyse/' + code, function(data) {
            console.log(data);
            $('#practice_modal').modal('show');
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
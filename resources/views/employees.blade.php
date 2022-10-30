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
                            <h3 class="mb-0">Liste des correspondants</h3>
                        </div>

                        <button type="button" style='position:relative; left:17%' class="btn btn-info btn-sm"
                            data-toggle="modal" data-target="#practice_modal">
                            Ajouter correspondant

                        </button>
                    </div>
                </div>
                @include('flash-message')
                <form action="{{ route('searchCorrespondants') }}" method="get">
                    <div class="form-group col-md-7" style="display:flex; float:right">
                        <input type="text" class="form-control" name="search" style="margin-right:1%; height:30px"
                            placeholder="Recherche par libellé ou laboratoire" />
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
                                <th scope="col">ID</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Laboratoire</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center align-middle">Demandes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)

                            <tr>
                                <td> {{ $employee->id}} </td>
                                <td>
                                    <a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal'
                                        data-id="{{ $employee->id }}">{{ $employee->name}}</a>
                                </td>
                                <td> {{ $employee->code_labo}} </td>
                                <td> {{ $employee->email}}</td>
                                <td class="text-center align-middle">
                                    <a href=" {{ url('correspondants/'.$employee->id.'/demandes') }}"
                                        class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Consulter">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <br><br>
                    <div style="float:right">{!! $employees->links() !!}</div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter correspondant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="correspondants/add" method="post">
                        {{ csrf_field() }}
                        Libellé <input type="text" name="name" id="name" class="form-control" required>
                        Email <input type="text" name="email" id="email" class="form-control" required>
                        Code laboratoire <input type="text" id="code_labo" name="code_labo" class="form-control"
                            required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">enregistrer</button>
                </div>
                </form>

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
        $('#exampleModalLabel').text("Mettre à jours");
        $.get('http://soustraitance.barounilab.com/public/correspondant/' + id, function(data) {
            console.log(data);
            $('#practice_modal').modal('show');
            action = 'http://soustraitance.barounilab.com/public/correspondants/update/' + id
            console.log(action)
            $('form').attr('action', action);
            $('#code_labo').val(data.correspondant.code_labo);
            $('#name').val(data.correspondant.name);
            $('#email').val(data.correspondant.email);
        })
    });
});
</script>

@endpush

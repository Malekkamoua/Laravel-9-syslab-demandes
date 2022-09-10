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
                            data-toggle="modal" data-target="#exampleModal">
                            Ajouter correspondant

                        </button>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive" style="width:100%; margin:1%">
                    <table id="example" class="display hover table align-items-center table-flush">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Laboratoire</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center align-middle">Demandes realisées</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)

                            <tr>
                                <td> {{ $employee->id}} </td>
                                <td> {{ $employee->code_labo}} </td>
                                <td> {{ $employee->email}}</td>
                                <td class="text-center align-middle">
                                    <a href=" {{ url('correspondants/'.$employee->id.'/demandes') }}"
                                        class="btn btn-info btn-sm">
                                        Consulter
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="text" value="none" name="name" class="form-control" hidden>
                        Email <input type="text" name="email" id="name" class="form-control">
                        Code laboratoire: <input type="text" id="nature_cond" name="code_labo" class="form-control">
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



@endpush

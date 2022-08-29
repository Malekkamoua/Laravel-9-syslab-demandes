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
                                <th scope="col">ID</th>
                                <th scope="col">Nom prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Laboratoire</th>
                                <th scope="col" class="text-center align-middle">Demandes realisées</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)

                            <tr>
                                <td> {{ $employee->id}} </td>
                                <td> {{ $employee->name}}</td>
                                <td> {{ $employee->email}}</td>
                                <td> 58889750 </td>
                                <td> Labo x </td>
                                <td class="text-center align-middle">
                                    <a href=" {{ url('employee/'.$employee->id.'/demandes/') }}"
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


    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

@endpush
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

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
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
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
                    <br>

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
@endpush
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
                                    <!-- Button trigger modal -->
                                    <a data-toggle="modal" data-id="{{ $analyse->id }}"
                                        data-target="#editModal{{$analyse->id}}">
                                        <b> {!! Str::words($analyse->code, 3, ' ...') !!} </b></a>

                                </td>
                                <td>
                                    {!! Str::words($analyse->nom, 3, ' ...') !!}

                                </td>
                                <td>{!! Str::words($analyse->nature_cond, 3, ' ...') !!}</td>
                                <td>{!! Str::words($analyse->concervation, 3, ' ...') !!} </td>
                                <td>{{ $analyse->delai }} </td>


                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal{{$analyse->id}}" tabindex="-1" role="dialog"
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
                                            <b>Code</b>: {{$analyse->code}} <br>
                                            <hr>
                                            <b>Libelé</b>: {{$analyse->nom}} <br>
                                            <b>Nature et conditions</b>: {{$analyse->nature_cond}} <br>
                                            <b>Concervation</b>: {{$analyse->concervation}} <br>
                                            <b>Delais</b>: {{$analyse->delai}} <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">x</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

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
@endpush
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($analyses as $analyse)
                            <tr>
                                <td>{{ $analyse->nom }}</td>
                                <td> {{$analyse->code}}</td>
                                <td>
                                    <a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal'
                                        data-id="{{ $analyse->code }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="practice_modal">
                        <div class="modal-dialog">
                            <form id="companydata">
                                <div class="modal-content">
                                    <input type="text" id="color_id" name="color_id" value="">
                                    <div class="modal-body">
                                        <input type="text" name="name" id="name" value="" class="form-control">
                                    </div>
                                    <input type="submit" value="Submit" id="submit"
                                        class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $("a").click(function() {
        let code = $(this).data('id');
        console.log(code)
        $.get('http://127.0.0.1:8000/analyse/' + code, function(data) {
            console.log(data);
            $('#userCrudModal').html("Edit category");
            $('#submit').val("Edit category");
            $('#practice_modal').modal('show');
            $('#color_id').val(data.analyse.code);
            $('#name').val(data.analyse.nom);
        })
    });
});
</script>
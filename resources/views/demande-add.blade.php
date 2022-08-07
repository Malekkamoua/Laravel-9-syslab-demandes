@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Informations du patient</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form>
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="lastname" class="form-control"
                                                    placeholder="Nom du patient">
                                            </div>
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input type="text" name="firstname" class="form-control"
                                                    placeholder="Prenom du patient">
                                            </div>
                                            <div class="row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">Civilité</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="civ" type="radio"
                                                            value="Celibataire" checked>
                                                        <label class="form-check-label"
                                                            for="Celibataire">Celibataire</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="civ" type="radio"
                                                            value="Marié">
                                                        <label class="form-check-label" for="Marié">Marié(e)</label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input" name="civ" type="radio"
                                                            value="Veuf">
                                                        <label class="form-check-label" for="Veuf">Veuf(ve)</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input type="text" class="form-control" placeholder="Text">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sexe</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Homme</option>
                                                <option>Femme</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <h5 class="mt-5">Analyses</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form>
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" placeholder="Nom du patient">
                                            </div>
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input type="text" class="form-control" placeholder="Prenom du patient">
                                            </div>
                                            <div class="row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">Civilité</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios"
                                                            id="gridRadios1" value="option1" checked>
                                                        <label class="form-check-label"
                                                            for="gridRadios1">Celibataire</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios"
                                                            id="gridRadios2" value="option2">
                                                        <label class="form-check-label"
                                                            for="gridRadios2">Marié(e)</label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input" type="radio" name="gridRadios"
                                                            id="gridRadios3" value="option3">
                                                        <label class="form-check-label"
                                                            for="gridRadios3">Veuf(ve)</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input type="text" class="form-control" placeholder="Text">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sexe</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Homme</option>
                                                <option>Femme</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <h5 class="mt-5">Trisomie 21</h5>
                                <hr>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Address 2</label>
                                        <input type="text" class="form-control" id="inputAddress2"
                                            placeholder="Apartment, studio, or floor">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">State</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>select</option>
                                                <option>Large select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Zip</label>
                                            <input type="text" class="form-control" id="inputZip">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">Check me out</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mt-5">Horizontal Form</h5>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="inputEmail3"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputPassword3"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-3 col-form-label">Radios</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gridRadios" id="gridRadios1" value="option1"
                                                                checked>
                                                            <label class="form-check-label" for="gridRadios1">First
                                                                radio</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gridRadios" id="gridRadios2" value="option2">
                                                            <label class="form-check-label" for="gridRadios2">Second
                                                                radio</label>
                                                        </div>
                                                        <div class="form-check disabled">
                                                            <input class="form-check-input" type="radio"
                                                                name="gridRadios" id="gridRadios3" value="option3"
                                                                disabled>
                                                            <label class="form-check-label" for="gridRadios3">Third
                                                                disabled radio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-3">Checkbox</div>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                        <label class="form-check-label" for="gridCheck1">Example
                                                            checkbox</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mt-5">Horizontal Form Label Sizing</h5>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control form-control-sm"
                                                        id="colFormLabelSm" placeholder="col-form-label-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="colFormLabel"
                                                        placeholder="col-form-label">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="colFormLabelLg"
                                                    class="col-sm-3 col-form-label col-form-label-lg">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="col-form-label-lg">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="form-group row" style="float:right">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                            </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- [ Main Content ] end -->

        </div>
    </div>
</div>
</div>

@include('layouts.footers.auth')
</div>
@endsection
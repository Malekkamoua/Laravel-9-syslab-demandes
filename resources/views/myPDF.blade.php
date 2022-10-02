<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Demande</title>
    <style>
    .invoice-box {
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        /*text-align:left;*/
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }


    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: right;
            float: right;
        }
    }

    .habitat_address {
        text-align: right;
        margin-top: 10px;
    }

    .vendor_info {
        text-align: right;
    }

    .order_date {
        /*width: 40px;*/
        flex:
    }

    td {
        font-size: 14px;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="5" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="10">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="https://barounilab.com/wp-content/uploads/2021/11/cropped-logo-BAROUNI.png"
                                        style="width: 100%; max-width: 120px" />
                                </td>
                                <td class="habitat_address">
                                    Laboratoire Mohamed Nejib Barouni<br>
                                    Complex medical Farabi, El Menzah 6<br>
                                    Tél: 23 707 465
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Demande #: {{ $demande->id }}<br>
                                    Date creation: {{ $created_at}}<br>
                                    Type dossier: <b>{{ $demande->type_dossier }} </b><br>

                                </td>
                                <td class="vendor_info">
                                    <strong>{{$correspondant->name}} - {{$correspondant->code_labo}}
                                    </strong><br>
                                    <small> {{$correspondant->email}} </small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <div class="card">
            <div class="card-body">
                <strong style="color: #0d3b66">Informations du patient</strong>
                <hr>
                <table cellpadding="5" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="10">
                                <table>
                                    <tr>
                                        <td>
                                            N° carte patient<br>
                                            Nom <br>
                                            Prenom <br>
                                            N° carte patient <br>
                                            Date de naissance <br>
                                            Sexe <br>
                                        </td>
                                        <td class="vendor_info">
                                            {{ $demande->num_carte }} <br>
                                            {{ $demande->nom }} <br>
                                            {{ $demande->prenom }} <br>
                                            {{ $demande->num_dossier }} <br>
                                            {{ $ddn }} <br>
                                            {{ $demande->sexe }} <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <strong class="mt-5" style="color: #0d3b66">Renseignements cliniques - traitements </strong>
                <hr>

                <table cellpadding="5" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="10">
                                <table>
                                    <tr>
                                        <td>
                                            Date du prélevement<br>
                                            Nombre de tubes <br>
                                            @if($demande->t_ambiante != 0)
                                            Température ambiante <br>
                                            @endif
                                            @if($demande->t_ref != 0)
                                            Refrégeré <br>
                                            @endif
                                            @if($demande->t_cong != 0)
                                            Congelé <br>
                                            @endif
                                        </td>

                                        <td class="vendor_info">
                                            {{ $date_prelev }} <br>
                                            {{ $demande->nb_tubes }} <br>
                                            @if($demande->t_ambiante != 0)
                                            {{ $demande->t_ambiante }} <br>
                                            @endif
                                            @if($demande->t_ref != 0)
                                            {{ $demande->t_ref }} <br>
                                            @endif
                                            @if($demande->t_cong != 0)
                                            {{ $demande->t_cong }} <br>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <strong class="mt-5" style="color: #0d3b66">Analyses demandées</strong> <br>
                <div class="row">

                    @foreach($analyses as $analyse)

                    <table cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="10">
                                    <table>
                                        <tr>
                                            <td>
                                                Libellé<br>
                                                Nature et condition<br>
                                                Concervation <br>
                                                Delais <br>
                                            </td>
                                            <td class="vendor_info">
                                                {{ $analyse->nom }} <br>
                                                {{ $analyse->nature_cond }} <br>
                                                {{ $analyse->concervation }} <br>
                                                {{ $analyse->delai }} <br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @endforeach
                </div>
                <br>
                @if($demande->nb_foetus != 0)
                <strong class="mt-5" style="color: #0d3b66">Trisomie 21</strong>
                <hr>

                <table cellpadding="5" cellspacing="0">
                    <tbody>
                        <tr>
                            <td colspan="10">
                                <table>
                                    <tr>
                                        <td>
                                            Date dernières regles<br>
                                            Date début grosesse<br>
                                            Nombre de foetus <br>
                                            Taille <br>
                                            Poids
                                        </td>
                                        <td class="vendor_info">
                                            {{ $ddr }} <br>
                                            {{ $ddg }} <br>
                                            {{ $demande->nb_foetus }} <br>
                                            {{ $demande->taille }} <br>
                                            {{ $demande->poids }} <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @endif

                @if($demande->commentaires != NULL)
                <strong class="mt-5" style="color: #0d3b66">Commentaires supplémentaires</strong>
                <hr>
                <p>{{ $demande->commentaires }} </p>

                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>
@extends('layout')

@section('content')
    <div class="divPage divQuote show">
        <div class="quote-data">
            <div class="top">
                <div class="left">
                    <h1 class="name text-uppercase">{{ $mission->client->user->name }}</h1>
                    <p class="email">
                        <a href="mailto:{{ $mission->client->user->email }}" title="Envoyer un mail à {{ $mission->client->user->name }}">{{ $mission->client->user->email }}</a>
                    </p>
                    <p class="phone">{{ $mission->client->user->phone }}</p>
                    <p class="address">{{ $mission->client->user->company_address }}</p>
                    <p></p>
                </div>
                <div class="right">
                    <table>
                        <thead>
                            <tr>
                                <th class="bold text-center" colspan="2">Devis n°</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="reference bold">Devis n°</td>
                                <td>{{ $mission->client->reference }}-{{ $mission->reference }}-DE</td>
                            </tr>
                            <tr>
                                <td class="date bold">Date</td>
                                <td>
                                    @php
                                    $date = new DateTime();
                                    echo $date->format('d/m/Y');
                                @endphp
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <div class="left">
                    <p class="mission-title bold">Mission : {{ $mission->title }}</p>
                </div>
                <div class="right">
                    <p class="bold">A destination de :</p>
                    <p class="client-name text-uppercase">{{ $mission->client->name }}</p>
                    <p class="client-address">{{ $mission->client->company_address }}</p>
                    <p class="client-siret">SIRET : {{ $mission->client->company_siret }}</p>
                </div>
            </div>
        </div>
        <div class="main">
            <table>
                @php
                    $totalTTC = 0;
                @endphp
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-center">Prix unitaire<span class="little">TTC</span></th>
                        <th class="text-center">Total<span class="little">TTC</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mission->missionLines as $missionLine)
                    <tr>
                        <td>{{ $missionLine->title }}</td>
                        <td class="text-center">{{ $missionLine->quantity }}</td>
                        <td class="text-center">{{ $missionLine->unit_price }} €</td>
                        <td class="text-center">{{ $missionLine->total_ttc }} €</td>
                        @php
                            $totalTTC += $missionLine->total_ttc;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <p class="bold">Total TTC {{ $totalTTC }} €</p>
            </div>
        </div>
        <div class="payment">
            <p class="modalite bold">Modalité de paiement :</p>
            <p>{{ $mission->advance }}% d'accompte à la signature, solde à la livraison.</p>
            <div class="bank">
                <div class="left">
                    <table>
                        <tbody>
                            <tr>
                                <td class="bold text-italic">Coordonnées bancaires :</td>
                            </tr>
                            <tr>
                                <td class="text-italic">Titulaire du compte</td>
                               <td>{{ $mission->client->user->bank_incumbent }}</td>
                            </tr>
                            <tr>
                                <td class="text-italic">Domiciliation</td>
                               <td>{{ $mission->client->user->bank_domiciliation }}</td>
                            </tr>
                            <tr>
                                <td class="text-italic">RIB</td>
                               <td>{{ $mission->client->user->bank_rib }}</td>
                            </tr>
                            <tr>
                                <td class="text-italic">IBAN</td>
                               <td>{{ $mission->client->user->bank_iban }}</td>
                            </tr>
                            <tr>
                                <td class="text-italic">BIC</td>
                               <td>{{ $mission->client->user->bank_bic }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="bottom">
                        <p class="text-italic">
                            En cas de retard de paiement, seront exigibles, conformément à l'article L 441-6 du 
                            code du commerce, une indemnité calculée sur la base de trois fois le taux de 
                            l'intéret légal en vigueur ainsi qu'une indemnité forfaitaire pour frais de recouvrement 
                            de 40 euros.
                        </p>
                    </div>
                </div>
                <div class="right">
                    <div class="signature">
                        <p class="bold">Date et signature, précédées de la mention : "Bon pour accord".</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer text-center">
            <p class="text-uppercase text-italic">Micro-entreprise {{ $mission->client->user->name }}</p>
            <p class="text-uppercase text-italic">SIRET {{ $mission->client->user->company_siret }} | APE {{ $mission->client->user->company_ape }}</p>
            <p class="text-italic">En franchise base TVA. TVA non applicable, art 293-B du CGI</p>
            <p class="text-italic">
                Référencé organisme de formation, déclaration d’activité enregistrée sous le numéro 84691783769 auprès du 
                préfet de région Auvergne-Rhône-Alpes
            </p>
        </div>
    </div>
@endsection

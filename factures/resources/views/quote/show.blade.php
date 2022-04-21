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
                                <td class="text-right">{{ $mission->client->reference }}-{{ $mission->reference }}-DE</td>
                            </tr>
                            <tr>
                                <td class="date bold">Date</td>
                                <td class="text-right">
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
                    <p class="mission-title"><span class="bold">Mission :</span> {{ $mission->title }}</p>
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
                        <th class="text-left">Désignation</th>
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
            <div class="text-right total">
                <p class="bold"><span>Total TTC</span> {{ $totalTTC }} €</p>
            </div>
        </div>
        <div class="payment">
            <p class="modalite"><span class="bold">Modalité de paiement :</span> {{ $mission->advance }}% d'accompte à la signature, solde à la livraison.</p>
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
                </div>
                <div class="right">
                    <div class="signature">
                        <p class="bold">Date et signature, précédées de la mention : "Bon pour accord".</p>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p class="text-italic">
                    En cas de retard de paiement, seront exigibles, conformément à l'article L 441-6 du 
                    code du commerce, une indemnité calculée sur la base de trois fois le taux de 
                    l'intéret légal en vigueur ainsi qu'une indemnité forfaitaire pour frais de recouvrement 
                    de 40 euros.
                </p>
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

    <style>
        div.divQuote{
            font-size: 13px;
            padding-bottom: 100px;
            position: relative;
            font-family: Arial, Helvetica, sans-serif
        }

        div.left, div.right {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        .bold{
            font-weight: bold;
        }

        .text-center{
            text-align: center;
        }

        .text-right{
            text-align: right;
        }

        .text-uppercase{
            text-transform: uppercase;
        }

        .text-italic{
            font-style: italic;
        }
        h1{
            margin: 0;
        }
        a{
            color: #000;
        }
        p{
            margin: 5px 0;
            line-height: 1.5;
        }
        table{
            width: 100%;
            border-spacing:0;
            border-collapse: collapse;
        }
        table thead{
            background-color: #383D41;
            color: #FFF;
            font-size: 15px;    
        }
        .little{color: #FFF; font-size: 10px; display: block}
        th, td{
             padding: 5px 10px;
        }
        th{
            font-weight: 400;
            font-size: 12px;
        }
        div.quote-data div.top{
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }          
        div.quote-data div.top .right{
            width: 270px;        
            float: right;
        }
        div.quote-data div.top table{
            border: 2px solid #E2E3E5;
        }
        div.quote-data div.bottom{
            margin: 20px 0;
        }
        div.main{
            margin: 20px 0;   
        }
        div.main table td{
            padding: 7px 10px;
        }
        div.main .total{
            margin-top: 5px;
            padding-top: 5px;
            border-top: 2px solid #383D41;
        }
        div.main .total span{
            margin-right: 1rem;
        }
        div.payment .bottom{
            font-size: 10px
        }
        div.bank{
            margin: 40px 0;
            min-height: 150px;
        }
        div.bank .left{
            width: 50%;
        }
        div.bank .right{
            border: 2px solid #E2E3E5;
            padding: 10px;
            height: 150px;
            width: 40%;
            float: right;
        }
        div.footer{
            height: 100px;
            font-size: 10px;
            border-top: 2px solid #E2E3E5;
            padding-top: 10px;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            bottom: 0;
            width: 100%;
        }
    </style>

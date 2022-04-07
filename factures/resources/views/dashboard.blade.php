@extends('layout')

@section('content')
    <div class="divPage divDashboard">
        <div class="left">
            <h2>Choisissez un modèle :</h2>
            <nav>
                <ul>
                    <div class="top">
                        <li>
                            <a href="{{ route('missions.create') }}" title="Devis">Devis</a>
                        </li>
                        <li>
                            <a href="" title="Facture accompte">Facture accompte</a>
                        </li>
                        <li>
                            <a href="" title="Facture sans devis">Facture sans devis</a>
                        </li>
                        <li>
                            <a href="" title="Facture solde">Facture solde</a>
                        </li>
                    </div>
                    <div class="bottom">
                        <li>
                            <a href="{{ route('user.index') }}" title="Mon compte" class="account">
                                <img src="{{ asset('data/images/user.png') }}" title="Mon compte"/>
                                Mon compte</a>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
        <div class="right">
            <h1>Mes documents</h1>
            <section class="devis">
                <h2>Devis</h2>

            </section>

            <section class="facture-accompte">
                <h2>Facture accompte</h2>

            </section>

            <section class="facture-sans-devis">
                <h2>Facture sans devis</h2>

            </section>

            <section class="facture-solde">
                <h2>Facture solde</h2>

            </section>
        </div>
    </div>
@endsection

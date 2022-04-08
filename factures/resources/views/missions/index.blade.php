@extends('layout')

@section('content')
    <div class="divPage divMissions">
        <h1>Mes missions</h1>
        <a href="{{ route('missions.create') }}" title="Ajouter une mission" class="button pink">Ajouter une mission</a>

        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Référence</th>
                <th>Accompte</th>
            </tr>
            </thead>
            <tbody>
            @foreach($missions as $mission)
                <tr>
                    <td>{{ $mission->title }}</td>
                    <td>{{ $mission->reference }}</td>
                    <td>{{ $mission->advance }}</td>
                    <td>
                        <a href="{{ route('missions.edit', $mission) }}" title="Modifier la mission" class="button blue">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('missions.destroy', $mission) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" id="destroy" name="destroy" value="Supprimer"
                                   class="button danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

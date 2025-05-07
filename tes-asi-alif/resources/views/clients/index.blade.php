@extends('layouts.app')
@section('content')
<h2>Client List</h2>
<a href="{{ route('clients.create') }}">Add New Client</a>
<table>
    <thead>
        <tr>
            <th>Name</th><th>Slug</th><th>Logo</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->slug }}</td>
            <td><img src="{{ $client->client_logo }}" width="80"></td>
            <td>
                <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

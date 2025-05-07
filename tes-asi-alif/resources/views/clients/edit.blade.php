@extends('layouts.app')

@section('content')
<h2>Edit Client: {{ $client->name }}</h2>

<form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="name" value="{{ $client->name }}" required><br>

    <label>Slug:</label>
    <input type="text" name="slug" value="{{ $client->slug }}" required><br>

    <label>Is Project (0/1):</label>
    <select name="is_project">
        <option value="0" {{ $client->is_project == '0' ? 'selected' : '' }}>Tidak</option>
        <option value="1" {{ $client->is_project == '1' ? 'selected' : '' }}>Ya</option>
    </select><br>

    <label>Self Capture (1/0):</label>
    <select name="self_capture">
        <option value="1" {{ $client->self_capture == '1' ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ $client->self_capture == '0' ? 'selected' : '' }}>Tidak</option>
    </select><br>

    <label>Client Prefix:</label>
    <input type="text" name="client_prefix" value="{{ $client->client_prefix }}" maxlength="4" required><br>

    <label>Logo Saat Ini:</label><br>
    <img src="{{ $client->client_logo }}" width="100"><br>

    <label>Ganti Logo:</label>
    <input type="file" name="client_logo"><br>

    <label>Alamat:</label>
    <textarea name="address">{{ $client->address }}</textarea><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="phone_number" value="{{ $client->phone_number }}"><br>

    <label>Kota:</label>
    <input type="text" name="city" value="{{ $client->city }}"><br>

    <button type="submit">Update</button>
</form>
@endsection

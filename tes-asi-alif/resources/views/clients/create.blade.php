@extends('layouts.app')

@section('content')
<h2>Tambah Client Baru</h2>

<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" required><br>

    <label>Slug:</label>
    <input type="text" name="slug" required><br>

    <label>Is Project (0/1):</label>
    <select name="is_project">
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select><br>

    <label>Self Capture (1/0):</label>
    <select name="self_capture">
        <option value="1">Ya</option>
        <option value="0">Tidak</option>
    </select><br>

    <label>Client Prefix:</label>
    <input type="text" name="client_prefix" maxlength="4" required><br>

    <label>Logo (Upload):</label>
    <input type="file" name="client_logo"><br>

    <label>Alamat:</label>
    <textarea name="address"></textarea><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="phone_number"><br>

    <label>Kota:</label>
    <input type="text" name="city"><br>

    <button type="submit">Simpan</button>
</form>
@endsection

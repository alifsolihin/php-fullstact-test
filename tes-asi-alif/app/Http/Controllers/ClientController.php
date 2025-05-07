<?php

namespace App\Http\Controllers;

use App\Models\MyClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index() {
        $clients = MyClient::whereNull('deleted_at')->get();
        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $path = $file->store('client-logos', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $data['client_logo'] = Storage::disk('s3')->url($path);
        }

        $client = MyClient::create($data);
        Redis::set($client->slug, json_encode($client));
        return redirect()->route('clients.index');
    }

    public function edit($id) {
        $client = MyClient::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id) {
        $client = MyClient::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $path = $file->store('client-logos', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $data['client_logo'] = Storage::disk('s3')->url($path);
        }

        $client->update($data);
        Redis::del($client->slug);
        Redis::set($client->slug, json_encode($client));
        return redirect()->route('clients.index');
    }

    public function destroy($id) {
        $client = MyClient::findOrFail($id);
        $client->update(['deleted_at' => now()]);
        Redis::del($client->slug);
        return redirect()->route('clients.index');
    }
}

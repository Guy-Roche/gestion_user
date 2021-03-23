<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('admin.clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             //
             return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $client = Client::create($request->all());
                //on verifie si notre requete contient
        // un imput de type file dont le name est image
        if ($request->hasFile('photo') ) {
            $photo = $request->file('photo');
            //15453005.png
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(storage_path('app/public/images/clients/'.$filename));
            $client->photo = $filename;
            $client->save();
        }
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return view('admin.clients.show', ['client' => $client]);
    }

    public function validator()
    {
        return ;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('admin.clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->update($request->all());
        //on verifie si notre requete contient
        // un imput de type file dont le name est image
        if ($request->hasFile('photo') ) {
            $photo = $request->file('photo');
            //15453005.png
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(storage_path('app/public/images/clients/'.$filename));
            $client->photo = $filename;
            $client->save();
        }
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}

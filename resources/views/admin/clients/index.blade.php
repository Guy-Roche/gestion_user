@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste des clients') }}</div>
                <div class="text-md-right mt-3 mr-3">
                    <a href="{{ route('admin.clients.create')}}"><button type="submit" class="btn btn-success">Nouveau un client</button></a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }} </th>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->lastname }}</td>
                                <td>{{ $client->numero }}</td>
                                <td><img src="/storage/images/clients/{{$client->photo}}" width="40px"  style="border-radius: 100%;" alt=""></td>
                                <td>{{ $client->sexe }}</td>
                                <td style="display:inline-flex">
                                    @can('manager-clients')
                                        <a href="{{ route('admin.clients.edit', $client->id) }}"><i class="fas fa-user-edit"  style='font-size:20px;'></i></a>
                                    @endcan

                                   @can('manager')
                                        <form action="{{ route('admin.clients.destroy', $client->id) }}" method="post" class="d-inline">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warring"><i class="fas fa-user-minus" style='font-size:20px;  color:orange;'></i></button>
                                        </form>
                                   @endcan

                                </td>
                              </tr>
                            @endforeach


                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

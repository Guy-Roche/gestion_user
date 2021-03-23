@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste des utilisateurs') }}</div>
                <div class="text-md-right mt-3 mr-3">

                    <a href="{{ route('register')}}"><button type="submit" class="btn btn-success">Ajouter user</button></a>

                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }} </th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray() )}}</td>
                                <td>

                                        <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-user-edit"  style='font-size:20px;'></i></a>

                                        &nbsp;
                                   &nbsp;

                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="d-inline">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warring"><i class="fas fa-user-minus" style='font-size:20px;  color:orange;'></i></button>
                                        </form>


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

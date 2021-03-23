@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier un client <strong>{{ $client->name }}</strong></strong></div>

                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('admin.clients.update', $client)}}" method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label ">{{ __('Lastname') }}</label>

                            <div class="col-md-12">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $client->lastname}}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label ">{{ __('numero') }}</label>

                            <div class="col-md-12">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') ?? $client->numero}}" required autocomplete="numero" autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label ">{{ __('photo') }}</label>

                            <div class="col-md-12">
                                <img src="/storage/images/clients/{{$client->photo}}" alt="">

                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="lieu_naissance" class="col-md-4 col-form-label ">{{ __('lieu de naissance') }}</label>

                            <div class="col-md-12">
                                <input id="lieu_naissance" type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" name="lieu_naissance" value="{{ old('lieu_naissance') ?? $client->lieu_naissance}}" required autocomplete="lieu_naissance" autofocus>

                                @error('lieu_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                                <label for="date_naissance" class="col-md-4 col-form-label ">{{ __('date de naissance') }}</label>

                                <div class="col-md-12">
                                    <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance') ?? $client->date_naissance}}" required autocomplete="date_naissance" autofocus>

                                    @error('date_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        </div>


                            <div class="form-group form-check">

                                <input type="radio" class="form-check-input" name="sexe" value="F" id="f" @if ($client->sexe =='F')   checked @endif>

                                <label for="sexe" class="form-check-label">Feminin</label>

                            </div>

                        <div class="form-group form-check">

                            <input type="radio" class="form-check-input" name="sexe" value="M" id="m"  @if ($client->sexe =='M')   checked @endif>

                            <label for="sexe" class="form-check-label">Masculin</label>

                        </div>







                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

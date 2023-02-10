@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- name --}}
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-6">
                                    <input required id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                <div class="col-md-6">
                                    <input required id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input required id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- confirm pass --}}
                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input required id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- DATI RISTORANTI --}}
                            {{-- nome --}}
                            <h4>Enter restaurant data</h4>

                            <div class="mb-4 row">
                                <label for="name_restaurant"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name of the Restaurant*') }}</label>
                                <div class="col-md-6">
                                    <input required id="name_restaurant" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name_restaurant"
                                        required autocomplete="name_restaurant">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- telefono ristorante --}}
                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant phone number') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" required
                                        autocomplete="phone">
                                </div>
                            </div>

                            {{-- PIVA --}}
                            <div class="mb-4 row">
                                <label for="piva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant vat number*') }}</label>
                                <div class="col-md-6">
                                    <input required id="piva" type="text" class="form-control" name="piva"
                                        required autocomplete="piva">
                                    @error('piva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Indirizzo --}}
                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required
                                        autocomplete="address">
                                </div>
                            </div>

                            {{-- Tipologie --}}
                            <div class="mb-4 row">
                                <label for="types"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Choose the types of your restaurant') }}</label>
                                <div class="col-md-6">
                                    <select class="dropdown" multiple name="types[]">
                                        @forelse($tipologies as $tipology)
                                            <option title="{{ $tipology->name }}" value="{{ $tipology->id }}">
                                                {{ $tipology->name }}</option>
                                        @empty

                                            <h5>Sorry, there are no types to add right now</h5>
                                        @endforelse
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3">
                                <small id="priceHelper" class="text-muted">* Campo obbligatorio</small>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

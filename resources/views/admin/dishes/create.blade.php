@extends('layouts.app')



@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('admin.partials.navbar')

            <div class="col mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container">
                    <h1 class="text-center my-4">Aggiungi un nuovo piatto al tuo ristorante</h1>
                    <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Dish cover_image --}}
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Immagine del piatto</label>
                            <input type="file" name="cover_image" id="cover_image"
                                class="form-control @error('cover_image') is-invalid @enderror"
                                placeholder="Add a cover image" aria-describedby="coverImageHelper">
                        </div>
                        {{-- /Dish cover_image --}}

                        {{-- Dish name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input required type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Carbonara"
                                aria-describedby="nameHelper" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish name --}}

                        {{-- Dish desc --}}
                        <div class="mb-3">
                            <label for="description" class="form-label @error('description') is-invalid @enderror">Aggiungi
                                la
                                descrizione
                                del piatto</label>
                            <textarea required class="form-control" name="description" id="description" rows="5"
                                value="{{ old('description') }}"></textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish desc --}}

                        {{-- Dish price --}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input required type="number" class="form-control @error('price') is-invalid @enderror"
                                name="price" id="price" aria-describedby="priceHelper" placeholder="" step="0.01"
                                value="{{ old('price') }}">
                        </div>
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish price --}}


                        {{-- Dish visibility --}}
                        <div class="form-check">
                            <input type="hidden" name="visible" value="0" id="visible">
                            <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible">
                            <label class="form-check-label" for="visible">
                                Piatto disponibile
                            </label>
                        </div>
                        @error('visible')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish visibility --}}

                        <div class="mt-3">
                            <small id="priceHelper" class="text-muted">Campo obbligatorio</small>
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Aggiungi piatto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

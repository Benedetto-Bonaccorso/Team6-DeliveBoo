@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')
            <div class="col">
                <h1 class="text-center">Aggiungi un nuovo piatto al tuo ristorante</h1>
                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Dish cover_image --}}
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine del piatto</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control @error('cover_image') is-invalid @enderror" placeholder="Add a cover image"
                            aria-describedby="coverImageHelper">
                        <small id="coverImageHelper" class="text-muted">Aggiungi una foto del piatto</small>
                    </div>
                    {{-- /Dish cover_image --}}

                    {{-- Dish name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Carbonara"
                            aria-describedby="nameHelper" value="{{ old('name') }}">
                        <small id="nameHelper" class="text-muted">Inserisci un nome per il tuo nuovo piatto</small>
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- /Dish name --}}

                    {{-- Dish desc --}}
                    <div class="mb-3">
                        <label for="description" class="form-label @error('description') is-invalid @enderror">Aggiungi la
                            descrizione
                            del piatto</label>
                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
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
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" aria-describedby="priceHelper" placeholder="" step="0.01">
                        <small id="priceHelper" class="form-text text-muted">Scegli il prezzo del piatto</small>
                    </div>
                    @error('price')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- /Dish price --}}

                    {{-- Dish visibility --}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="1 {{ old('visible') ? 'checked="checked"' : '' }}" id="visible">
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

                    <button type="submit" class="btn btn-primary">Aggiungi piatto</button>
                </form>
            </div>
        </div>
    </div>
@endsection

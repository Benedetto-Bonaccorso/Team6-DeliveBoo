@extends('layouts.app')



@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('admin.partials.navbar')

            <div class="col">
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
                    <h1 class="text-center my-4">Add a new dish to your restaurant</h1>
                    <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Dish cover_image --}}
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Dish Image</label>
                            <input type="file" name="cover_image" id="cover_image"
                                class="form-control @error('cover_image') is-invalid @enderror"
                                placeholder="Add a cover image" aria-describedby="coverImageHelper">
                            <small id="coverImageHelper" class="text-muted">Add an image for your dish</small>
                        </div>
                        {{-- /Dish cover_image --}}

                        {{-- Dish name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Carbonara"
                                aria-describedby="nameHelper" value="{{ old('name') }}">
                            <small id="nameHelper" class="text-muted">Insert a name for your dish</small>
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish name --}}

                        {{-- Dish desc --}}
                        <div class="mb-3">
                            <label for="description" class="form-label @error('description') is-invalid @enderror">
                                Description*
                            </label>
                            <textarea class="form-control" name="description" id="description" rows="5" value="{{ old('description') }}"></textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish desc --}}

                        {{-- Dish price --}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Price*</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                id="price" aria-describedby="priceHelper" placeholder="" step="0.01"
                                value="{{ old('price') }}">
                            <small id="priceHelper" class="form-text text-muted">Insert a price for your dish</small>
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
                                Dish Available
                            </label>
                        </div>
                        @error('visible')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish visibility --}}

                        <button type="submit" class="btn btn-primary my-3">Add Dish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

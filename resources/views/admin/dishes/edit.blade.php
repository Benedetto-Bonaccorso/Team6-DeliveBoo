@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')


            <div class="col mt-5">

                <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <h3 class="text-center my-3">Edit "{{ $dish->name }}" data</h3>

                    <div class="form-group container my-4">
                        <label class="form-label" for="cover_image">Cover Image</label>
                        <input class="mb-1 form-control @error('cover_image') is-invalid @enderror" type="file"
                            class="form-control-file" name="cover_image" id="cover_image" placeholder="Add a cover image"
                            aria-describedby="cover_imageImgHelper">
                        @error('cover_image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <label class="form-label"for="name">Name</label>
                        <input class="mb-1 form-control @error('name') is-invalid @enderror" type="text" title="name"
                            name="name" id="name" value="{{ old('name', $dish->name) }}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <label class="form-label" for="description">Description</label>
                        <input class="mb-1 form-control @error('description') is-invalid @enderror" type="text"
                            title="description" name="description" id="description"
                            value="{{ old('description', $dish->description) }}">
                        @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror


                        <label class="form-label" for="price">Price</label>
                        <input class="mb-1 form-control @error('price') is-invalid @enderror" type="text" title="price"
                            name="price" id="price" value="{{ old('price', $dish->price) }}">
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Dish visibility --}}
                        <div class="form-check">
                            @if ($dish->visible)
                                <input type="hidden" name="visible" value="0" id="visible">
                                <input checked class="form-check-input" type="checkbox" value="1" id="visible"
                                    name="visible">
                            @else
                                <input type="hidden" name="visible" value="0" id="visible">
                                <input class="form-check-input" type="checkbox" value="1" id="visible"
                                    name="visible">
                            @endif
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

                        <button class="btn btn-primary my-2" type="submit">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

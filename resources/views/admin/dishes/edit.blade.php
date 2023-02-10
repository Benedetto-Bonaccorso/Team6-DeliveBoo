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
                        <div class="mb-3">
                            <label class="form-label" for="cover_image">Image</label>
                            <input class="mb-1 form-control @error('cover_image') is-invalid @enderror" type="file"
                                class="form-control-file" name="cover_image" id="cover_image"
                                placeholder="Add a cover image" aria-describedby="cover_imageImgHelper">
                            @error('cover_image')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"for="name">Name</label>
                            <input required class="mb-1 form-control @error('name') is-invalid @enderror" type="text"
                                title="name" name="name" id="name" value="{{ old('name', $dish->name) }}">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <input required class="mb-1 form-control @error('description') is-invalid @enderror"
                                type="text" title="description" name="description" id="description"
                                value="{{ old('description', $dish->description) }}">
                            @error('description')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="price">Price</label>
                            <input required class="mb-1 form-control @error('price') is-invalid @enderror" type="text"
                                title="price" name="price" id="price" value="{{ old('price', $dish->price) }}">
                            @error('price')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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
                                Available
                            </label>
                        </div>
                        @error('visible')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- /Dish visibility --}}

                        <br>

                        <div class="mb-3">
                            <small id="priceHelper" class="text-muted">* Required Field</small>
                        </div>


                        <button class="btn btn-primary my-2" type="submit">Edit dish</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')

            <div class="col table-responsive d-flex flex-column align-items-center mx-5">

                <a class="btn btn_orange m-4" href=" {{ route('admin.dishes.create') }}">
                    <h6 class="mx-4">Aggiungi Nuovi Piatti</h6>
                </a>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-orange">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Visible</th>
                            <th scope="col">Immagine</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr class="">
                                <td scope="row">{{ $dish->id }}</td>
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->slug }}</td>
                                <td>{{ $dish->description }}</td>
                                <td>{{ $dish->price }}</td>
                                <td>
                                    @if ($dish->visible)
                                        'Visible'
                                    @else
                                        'Hidden'
                                    @endif
                                </td>
                                <td><img width="200" src="{{ asset('storage/' . $dish->cover_image) }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                        class="btn bg-primary text-white w-100 my-2">View</a>

                                    <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                        class="btn bg-dark text-white w-100 my-2">Edit</a>

                                    {{-- Modal trigger button for delete --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete_dish_{{ $dish->id }}">
                                        Delete
                                    </button>

                                    {{-- Modal body --}}
                                    @include('admin.partials.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

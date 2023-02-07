@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">ID_Category</th>
                        <th scope="col">ID_Reastaurant</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">visible</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr class="">
                            <td scope="row">{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->id_category }}</td>
                            <td>{{ $dish->id_restaurant }}</td>
                            <td>{{ $dish->slug }}</td>
                            <td>{{ $dish->description }}</td>
                            <td>{{ $dish->price }}</td>
                            <td>{{ $dish->visible }}</td>
                            <td>{{ $dish->cover_image }}</td>
                            <td>
                                <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                    class="btn bg-primary text-white w-100 my-2">View</a>

                                <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                    class="btn bg-dark text-white w-100 my-2">Edit</a>

                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post"
                                    class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-danger text-white w-100 my-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

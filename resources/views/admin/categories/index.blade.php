@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('admin.partials.navbar')

        <div class="ms-sm-auto col-lg-5 px-md-4">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="me-5">
                        <input name="name" type="text" id="name" class="form-control" type="text"
                            placeholder="New category...">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Add category</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="ms-sm-auto col-lg-5 px-md-4">

            <div class="table-responsive-sm">
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($categories as $category)
                            <tr class="">
                                <td scope="row">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h3>No categories found</h3>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection

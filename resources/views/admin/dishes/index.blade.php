@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')


            <div class="col table-responsive d-flex flex-column align-items-center mx-5">
                <a class="btn btn-primary m-4" href=" {{ route('admin.dishes.create') }}">Add a new dish</a>


                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-orange">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($dishes as $dish)
                            <tr class="">
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->price }}</td>
                                <td>
                                    @if ($dish->visible)
                                        'Available'
                                    @else
                                        'Not Available'
                                    @endif
                                </td>
                                <td><img width="150" src="{{ asset('storage/' . $dish->cover_image) }}" alt="">
                                </td>
                                <td class="align-middle text-center">
                                    <a class="btn btn-primary text-white"
                                        href="{{ route('admin.dishes.show', $dish->slug) }}" role="button"><i
                                            class="fas fa-eye fa-sm fa-fw"></i></a>
                                    <a class="btn btn-primary text-white"
                                        href="{{ route('admin.dishes.edit', $dish->slug) }}" role="button"><i
                                            class="fas fa-pencil fa-sm fa-fw"></i></a>

                                    {{-- Modal trigger button for delete --}}
                                    <button type="button" class="btn btn-danger text-white btn-md" data-bs-toggle="modal"
                                        data-bs-target="#delete_dish_{{ $dish->id }}">
                                        <i class="fas fa-trash fa-sm fa-fw"></i>
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

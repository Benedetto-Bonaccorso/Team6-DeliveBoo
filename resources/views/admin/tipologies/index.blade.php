@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('admin.partials.navbar')

        <div class="ms-sm-auto col-lg-5 px-md-4">
            <form action="{{ route('admin.tipologies.store') }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="me-5">
                        <input name="name" type="text" id="name" class="form-control" type="text"
                            placeholder="New tipology...">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Add tipology</button>
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

                        @forelse ($tipologies as $tipology)
                            <tr class="">
                                <td scope="row">{{ $tipology->id }}</td>
                                <td>{{ $tipology->name }}</td>
                                <td>
                                    <form action="{{ route('admin.tipologies.destroy', $tipology->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h3>Not tipologies found</h3>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection

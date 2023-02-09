@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')
            <div class="col mt-5">
                <div class="card mt-3" style="width: 18rem;">
                    {{-- Check if there is a cover image --}}
                    @if ($dish->cover_image)
                        <img class="card-img-top" src="{{ asset('storage/' . $dish->cover_image) }}" alt="{{ $dish->name }}">
                    @else
                        <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                            style="width:100px">
                            Placeholder</div>
                    @endif
                    <div class="card-body">
                        {{-- Show the dish name --}}
                        <h5 class="card-title">{{ $dish->name }}</h5>

                        {{-- Show the dish description --}}
                        <p class="card-text">{{ $dish->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">

                        {{-- Show the dish price --}}
                        <li class="list-group-item">{{ $dish->price }}&euro;</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

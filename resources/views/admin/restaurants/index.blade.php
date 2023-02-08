@extends('layouts.app')


@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.104.2">
        <title>Dashboard Template · Bootstrap v5.2</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">





        <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
        <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#712cf9">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                @include('admin.partials.navbar')

                <div class="col">
                    <div class="text-center">
                        <h1>{{ $restaurants->name }}</h1>
                        <img width="300" src="{{ $restaurants->cover_image }}" alt="">
                    </div>

                    <form class="m-5" action="{{ route('admin.restaurants.update', $restaurants->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <h3>Edit your restaurant data</h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="learn laravel 9"
                                aria-describedby="nameHelper" value="{{ old('name', $restaurants->name) }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mb-3 d-flex gap-4">
                            <div>
                                <label for="cover_image" class="form-label">Replace Cover Image</label>
                                <input type="file" name="cover_image" id="cover_image"
                                    class="form-control  @error('cover_image') is-invalid @enderror" placeholder=""
                                    aria-describedby="coverImageHelper">
                            </div>
                            <img width="140" src="{{ asset('storage/' . $restaurants->cover_image) }}" alt="">
                        </div>
                        <!-- TODO: Add validation errors -->
                        @error('cover_image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone</label>
                            <input type="text" name="phone_number" id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="learn laravel 9" aria-describedby="phone_numberHelper"
                                value="{{ old('phone_number', $restaurants->phone_number) }}">
                        </div>
                        @error('phone_number')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mb-3">
                            <label for="piva" class="form-label">Partita Iva</label>
                            <input type="text" name="piva" id="piva"
                                class="form-control @error('piva') is-invalid @enderror" placeholder="learn laravel 9"
                                aria-describedby="pivaHelper" value="{{ old('piva', $restaurants->piva) }}">
                        </div>
                        @error('piva')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" placeholder="learn laravel 9"
                                aria-describedby="addressHelper" value="{{ old('address', $restaurants->address) }}">
                        </div>

                        @error('address')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Tipologie --}}
                        <div class="mb-4 row">
                            <label for="tipologies"
                                class="col-md-4 col-form-label text-md-right">{{ __('Choose the tipology of your restaurant') }}</label>
                            <div class="col-md-6">
                                <select class="dropdown" multiple name="tipologies[]">
                                    @forelse ($tipologies as $tipology)
                                        @if ($errors->any())
                                            <!-- Pagina con errori di validazione, deve usare old per verificare quale id di tipology preselezionare -->
                                            <option value="{{ $tipology->id }}"
                                                {{ in_array($tipology->id, old('tipologies', [])) ? 'selected' : '' }}>
                                                {{ $tipology->name }}</option>
                                        @else
                                            <!-- Pagina caricate per la prima volta: deve mostrarare i tipology preseleziononati dal db -->
                                            <option value="{{ $tipology->id }}"
                                                {{ $restaurants->tipologies->contains($tipology->id) ? 'selected' : '' }}>
                                                {{ $tipology->name }}</option>
                                        @endif
                                    @empty
                                        <option value="" disabled>Sorry 😥 no tipologies in the system</option>
                                    @endforelse
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>





        <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
        </script>
        <script src="dashboard.js"></script>
    </body>

    </html>
@endsection

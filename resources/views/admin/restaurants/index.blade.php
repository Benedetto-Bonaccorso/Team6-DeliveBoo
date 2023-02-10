@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')

            <div class="col mt-5">
                <div class="text-center">
                    <h1>{{ $restaurants->name }}</h1>
                    <img width="300" src="{{ $restaurants->cover_image }}" alt="">
                </div>

                <form class="m-5" action="{{ route('admin.restaurants.update', $restaurants->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

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
                        <label for="name" class="form-label">Restaurant's name</label>
                        <input required type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelper"
                            value="{{ old('name', $restaurants->name) }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3 d-flex gap-4">
                        <div>
                            <label for="cover_image" class="form-label">Choose an image for your restaurant</label>
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
                            aria-describedby="phone_numberHelper"
                            value="{{ old('phone_number', $restaurants->phone_number) }}">
                    </div>
                    @error('phone_number')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="piva" class="form-label">Vat number</label>
                        <input required type="text" name="piva" id="piva"
                            class="form-control @error('piva') is-invalid @enderror" aria-describedby="pivaHelper"
                            value="{{ old('piva', $restaurants->piva) }}">
                    </div>
                    @error('piva')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address"
                            class="form-control @error('address') is-invalid @enderror" aria-describedby="addressHelper"
                            value="{{ old('address', $restaurants->address) }}">
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
                                        <option title="{{ $tipology->name }}" value="{{ $tipology->id }}"
                                            {{ in_array($tipology->id, old('tipologies', [])) ? 'selected' : '' }}>
                                            {{ $tipology->name }}</option>
                                    @else
                                        <!-- Pagina caricate per la prima volta: deve mostrarare i tipology preseleziononati dal db -->
                                        <option title="{{ $tipology->name }}" value="{{ $tipology->id }}"
                                            {{ $restaurants->tipologies->contains($tipology->id) ? 'selected' : '' }}>
                                            {{ $tipology->name }}</option>
                                    @endif
                                @empty
                                    <option value="" disabled>Sorry 😥 no tipologies in the system</option>
                                @endforelse
                            </select>
                        </div>

                    </div>

                    <div class="mb-3">
                        <small id="priceHelper" class="text-muted">* Campo obbligatorio</small>
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

@endsection

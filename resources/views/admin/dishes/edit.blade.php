@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="py-2 bg-warning my-2">
            @foreach ($errors->all() as $error)
                <p class="mx-5 mt-4">{{ $error }}</p>
            @endforeach
    </div>
@endif

<form action="{{route('admin.dishes.update', $dish->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="cover">Cover Image</label>
            <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">
            <br>
            <label for="name">name</label>
            <input type="text" title="name" name="name" id="name" value="{{old('name')}}">
            <br>
            <label for="description">description</label>
            <input type="text" title="description" name="description" id="description" value="{{old('description')}}">
            <br>
            <label for="price">price</label>
            <input type="text" title="description" name="price" id="price" value="{{old('price')}}">
            <br>
            <label for="visible">visible</label>
            <input type="checkbox" name="visible" id="visible" class="switch-input" value="1" {{ old('visible') ? 'checked="checked"' : '' }}/>
            <br>
            <button type="submit">send</button>
        </div>

    </form>
@endsection
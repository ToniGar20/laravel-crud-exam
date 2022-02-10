@extends('layouts.base-layout')

@section('title','Posts')

@section('content')

    <div>

    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ trans($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <div>
            <h1>Crear publicación</h1>
        </div>
        <form>

        </form>
    </div>

@endsection

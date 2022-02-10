@extends('layouts.base-layout')

@section('title','Posts')

@section('content')

    <div class="align-items-start p-5">
        <div>
            <h1>POSTS</h1>
            <h2>Crear post</h2>
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
            <form class="d-flex flex-column w-50" method="post" action="/posts">
                <!--  Token generation -->
            @csrf
            @method('POST')
                <div class="form-group mt-4">
                    <label>@lang('Título de la publicación')</label>
                    <input class="form-control" type="text" name="title" placeholder="@lang('Introduce el título')" value="{{ old('title' ?? '') }}" required/>
                </div>
                <div class="form-group mt-4">
                    <label>@lang('Extracto publicación')</label>
                    <input class="form-control" type="text" name="heading" placeholder="@lang('Introduce el extracto')" value="{{ old('heading' ?? '') }}" required/>
                </div>
                <div class="form-group mt-4">
                    <label>@lang('Contenido publicación')</label>
                    <textarea class="form-control" type="text" name="body" placeholder="@lang('Introduce el contenido')" required>{{ old('body' ?? '') }}</textarea>
                </div>
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" name="commentable" value="true" {{ (old('commentable')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="commentable">@lang('Comentable')</label>
                </div>
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" name="expires" value="true" {{ (old('expires')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="expires">@lang('Caducable')</label>
                </div>
                <div class="form-check mt-4">
                    <label for="access">Acceso</label>
                    <select name="access" form="access" required>
                        <option value="private">Privado</option>
                        <option value="no-private">Público</option>
                    </select>
                </div>
                <button class="send-but bg-primary mt-4 text-white btn-md rounded-2 px-3" type="submit">@lang('Enviar Post')</button>
            </form>
        </div>
    </div>

@endsection

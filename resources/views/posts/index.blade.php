@extends('layouts.base-layout')

@section('title','Posts')

@section('content')

    <div class="align-items-start p-5">
        @if(sizeof($currentPosts) === 0)
            <p>No hay posts para mostrar. ¡Añade el primero!</p>
        @else

            <div class="mb-4">
                <form class="mt-4" method="get" action="{{ route('posts.create') }}">
                    @csrf
                    @method('GET')
                    <button class="bg-warning text-white btn-md rounded-2 px-3" type="submit">+ Añadir post</button>
                </form>
            </div>

            <table class="table table-dark">
                <tbody>
                <tr>
                    <th class="bg-primary text-white">Título</th>
                    <th class="bg-primary text-white">Extracto</th>
                    <th class="bg-primary text-white">Autor</th>
                    <th class="bg-primary text-white">Fecha de publicación</th>
                    <th class="bg-primary text-white">Acciones</th>
                </tr>
                @foreach ($currentPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->heading }}</td>
                        <td>{{ Auth::user()->name }}</td>
                        <td><?php
                            $split = explode(" ", $post->updated_at);
                            echo $split[0];
                            ?>
                        </td>
                        <td class="d-flex d-row">
                            <form method="get" action="/posts/{{ $post->id }}/edit">
                                @csrf
                                @method('GET')
                                <li class="list-inline-item">
                                    <button class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
                                </li>
                            </form>
                            <form method="post" action="/posts/{{ $post->id }}">
                                @csrf
                                @method('DELETE')
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></button>
                                </li>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

            <div class="mt-4"><!-- Logout -->
                <form method="POST" action="/logout">
                    @csrf
                    <button class="bg-info text-white btn-md rounded-2 px-3" type="submit">Cerrar sesión</button>
                </form>
            </div>

    </div>

@endsection

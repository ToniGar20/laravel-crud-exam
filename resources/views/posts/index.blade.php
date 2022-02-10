@extends('layouts.base-layout')

@section('title','Posts')

@section('content')

    <div class="d-flex col-8 justify-content-start align-items-start p-5">
        @if(sizeof($currentPosts) === 0)
            <p>No hay posts para mostrar. ¡Añade el primero!</p>
        @else
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
    </div>

@endsection

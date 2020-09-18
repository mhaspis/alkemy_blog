@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.message')

            <div class="card">
                <div class="card-header">Posts</div>
                <br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                        <th scope="row">{{ $blog->title }}</th>
                        <td><a href="{{ route('blog.detail', ['id'=>$blog->id] ) }}" class="btn btn-success">Ver</a></td>
                        <td><a href="{{ route('blog.edit', ['id'=>$blog->id] ) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                        <form action="{{ route('blog.delete', ['id'=>$blog->id] ) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="submit" class="btn btn-primary" value="Borrar">
                            </form>
                        </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

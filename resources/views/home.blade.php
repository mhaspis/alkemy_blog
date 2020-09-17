@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.message')

            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Titulo</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Ver</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Editar</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Borrar</strong>
                        </div>
                    </div>
                    @foreach($blogs as $blog)
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ $blog->title }}</strong>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('blog.detail', ['id'=>$blog->id] ) }}">Ver</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('blog.edit', ['id'=>$blog->id] ) }}">Editar</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('blog.delete', ['id'=>$blog->id] ) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="submit" class="btn btn-primary" value="Borrar">
                            </form>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

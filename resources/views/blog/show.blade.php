@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(!isset($blog))

                @else
                <div class="card-header">{{ $blog->title }}</div>

                <div class="card-body">

                    <div class="form-group row">
                         <div class="col-md-7">
                         <strong>Categoria:</strong> {{ $category->name }}
                        </div>
                    </div>
                    <div class="form-group row">
                         <div class="col-md-7">
                         <strong>Contenido:</strong> {{ $blog->content }}
                        </div>
                    </div>
                    

                    <div class="form-group row">                      
                        <div class="col-md-7">
                        <img src="{{ route('blog.getImage',['image_path' => $blog->image_path]) }}" /> 	
                        </div>
                    </div>

                    <div class="form-group row">                      
                        <div class="col-md-7">
                        <strong>Fecha: </strong>{{ $blog->created_at}}	
                        </div>
                    </div>

				</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
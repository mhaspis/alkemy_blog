@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Blog</div>

                <div class="card-body">

					<form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
						@csrf

                        <div class="form-group row">
							<label for="title" class="col-md-3 col-form-label text-md-right">Titulo</label>
							<div class="col-md-7">
								<input id="title" type="text" name="title" class="form-control" required/>	
							</div>
						</div>

                        <div class="form-group row">
							<label for="content" class="col-md-3 col-form-label text-md-right">Contenido</label>
							<div class="col-md-7">
								<textarea id="content" name="content" class="form-control" required></textarea>	
							</div>
						</div>
                        <div class="form-group row">
							<label for="category" class="col-md-3 col-form-label text-md-right">Categoria</label>
                            <div class="col-md-7">
                                <select name="category" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>	
							</div>
						</div>

						<div class="form-group row">
							<label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
							<div class="col-md-7">
								<input id="image_path" type="file" name="image_path" class="form-control" required/>	
							</div>
						</div>

						<div class="form-group row">
							
							<div class="col-md-6 offset-md-3">
								<input type="submit" class="btn btn-primary" value="Publicar">
							</div>
						</div>


					</form>

				</div>
            </div>
        </div>
    </div>
</div>
@endsection
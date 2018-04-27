@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>Livro</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ $action or url('livros') }}">
                        {{csrf_field()}}
                        @isset($livro) {{method_field('patch')}} @endisset
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>
                            <div class="col-md-6">
                                <input id="titulo" class="form-control" name="titulo" type="text" value="{{ $livro->titulo or ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Autor</label>
                            <div class="col-md-6">
                                <input id="autor" class="form-control" name="autor" type="text" value="{{ $livro->autor or ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edicao" class="col-md-4 col-form-label text-md-right">Edição</label>
                            <div class="col-md-6">
                                <input id="edicao" class="form-control" name="edicao" type="text" value="{{ $livro->edicao or ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" class="form-control" name="isbn" type="text" value="{{ $livro->isbn or ''}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

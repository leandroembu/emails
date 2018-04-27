@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Livros</h2>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Livro</th>
                            <th>Autor</th>
                            <th>Edição</th>
                            <th>ISBN</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($livros as $livro)
                        <tr>
                            <td><a href="livros/{{ $livro->id }}">{{ $livro->titulo }}</a></td>
                            <td>{{ $livro->autor }}</td>
                            <td>{{ $livro->edicao }}</td>
                            <td>{{ $livro->isbn }}</td>
                            <td>
                                <a href="{{action('LivroController@edit', $livro->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{action('LivroController@destroy', $livro->id)}}" method="post">
                                  {{csrf_field()}} {{ method_field('delete') }}
                                  <button class="delete-item btn btn-danger" type="submit">Deletar</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

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
            <h3>{{ $livro->titulo }} </h3>

            <div class="card">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Autor: <strong>{{ $livro->autor }}</strong></li>
                <li class="list-group-item"><b>Edição:</b> {{ $livro->edicao }}</li>
                <li class="list-group-item"><b>ISBN:</b> {{ $livro->isbn }}</li>
              </ul>
            </div>
            <hr>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@endsection

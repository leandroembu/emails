# Formulário de Contato, Controller e Rotas

## Criar o formulário de contato
Criar o arquivo resources/views/forms/contato.blade.php
```php
@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3>Contato</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ url('contato') }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" class="form-control" name="nome" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" class="form-control" name="email" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mensagem" class="col-md-4 col-form-label text-md-right">Mensagem</label>
                            <div class="col-md-6">
                                <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
```

## Criar o controller
- Rodar o comando ``` php artisan make:controller ContatoController ```
- Em app/Http/Controllers/ContatoController
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        return view('forms.contato');
    }

    public function enviaEmail(Request $request)
    {
        $validacao = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
        ]);

        // Implementar método aqui
        $request->session()->flash('alert-success', 'Só falta enviarmos de verdade agora!');
        return redirect()->back();
    }
}
```

## Criar as rotas para o controller

- routes/web.php
```php
// Rotas para o contato
Route::get('contato', 'ContatoController@index');
Route::post('contato', 'ContatoController@enviaEmail');
```
- Rodar a aplicação em http://localhost:8000/contato

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoContato;

class ContatoController extends Controller
{
    public function index()
    {
        return view('forms.contato');
    }

    public function enviaEmail(Request $request)
    {
        $validacao = $request->validate([
            'mensagem' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
        ]);

        $nome = $request->nome;
        $email = $request->email;
        $mensagem = $request->mensagem;

        // Enviando o e-mail
        Mail::to('leandroramos@usp.br')->send(new NovoContato($nome, $email, $mensagem));

        $request->session()->flash('alert-success', 'Sua mensagem foi enviada, obrigado!');
        return redirect()->back();
    }
}

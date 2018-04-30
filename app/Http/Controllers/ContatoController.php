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

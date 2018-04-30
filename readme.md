# Criando o Mailer

## Instalar drivers necessários
Rodar o comando ```composer require guzzlehttp/guzzle```

## Criar o Mailer
Rodar o comando ```php artisan make:mail NovoContato```

## Configurar o Mailer

Código do arquivo app/Mail/NovoContato.php

**Não se esqueça de colocar o namespace**
```php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovoContato extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $email;
    public $mensagem;

    public function __construct($nome, $email, $mensagem)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->mensagem = $mensagem;
    }

    public function build()
    {
        return $this->from('leandroembu@gmail.com')
                    ->subject('Mensagem enviada pelo site.')
                    ->view('emails.contato');
    }
}
```

## Aplicar o Mailer no Controller de contato

Código completo do arquivo app\Http\Controllers\ContatoController
```php
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
```

## Criar a view da mensagem
Criar arquivo resources/views/emails/contato.blade.php
```php
<!DOCTYPE html>
<html>
<head>
    <title>Mensagem enviada pelo site</title>
    <meta charset="utf-8">
    <style>
        body{
            width:510px;
            margin:0;
            padding:0 20px;
            font-family:"Raleway", sans-serif;
            font-size:12px;
        }
        h1{
            font-size:20px;
        }
        h2{
            font-size:16px;
        }
    </style>
</head>
<body>
<h1>
    Nova mensagem enviada pelo site
</h1>
<hr>
<p>
    <strong>Nome:</strong> {{$nome}}<br>
    <strong>E-mail:</strong> {{$email}}<br>
    <strong>Mensagem:</strong><br> <?php echo nl2br($mensagem); ?>
</p> 
<hr>
<div>
    <p>
        <a href="http://localhost:8000" title="Editora X">
        Editora X Ltda.
        </a>
        <br>
        Av. Nova, 1265<br>
        Cidade Fantasma – CEP 023657-110<br>
        Cidade Nova – SP – Brasil<br>
        Tel.: +55 11 5252-2525
    </p>
</div>
</body>
</html>  
```

## Configurar a conta de e-mail
No arquivo .env
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@gmail.com
MAIL_PASSWORD=suasenha
MAIL_ENCRYPTION=tls
```

## Referências para saber mais
- Templates de e-mail - [Foundation for Emails](https://foundation.zurb.com/emails.html)
- [Laravel 5.6 - Mail](https://laravel.com/docs/5.6/mail)

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
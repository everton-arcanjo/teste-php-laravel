<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação Bem-Sucedida</title>
    <!-- Adicione os links para os estilos do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Importação Bem-Sucedida!</h4>
        <p>A importação do Redis para o banco de dados foi realizada com sucesso.</p>
        <hr>
        <p class="mb-0">Obrigado por usar nosso serviço!</p>
    </div>

    <a href="{{ route('import.form') }}" class="btn btn-primary mt-3">Voltar para o Formulário de Importação</a>
</body>
</html>

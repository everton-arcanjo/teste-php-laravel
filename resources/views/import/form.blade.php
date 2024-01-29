<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de Documentos</title>
    <!-- Adicione os links para os estilos do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <h1>Importar Documentos</h1>

    @if(isset($importedRecords))
        <h2>Registros Importados:</h2>
        <ul class="list-group">
            @foreach($importedRecords as $record)
                <li class="list-group-item">{{ $record['categoria'] }} - {{ $record['titulo'] }} - {{ $record['conteúdo'] }}</li>
            @endforeach
        </ul>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <form action="{{ route('import.addToQueue') }}" method="post" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file" accept=".json" required>
            <label class="custom-file-label" for="customFile">Escolher arquivo JSON</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Importar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        document.getElementById('customFile').addEventListener('change', function (e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
</body>
</html>

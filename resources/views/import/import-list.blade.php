<html>
<head>
    <title>Registros para Importação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Registros para Importação</h1>

    @if(isset($importedRecords))
        <h2>Registros Importados:</h2>
        <ul class="list-group">
            @foreach($importedRecords as $recordId => $record)
                <li class="list-group-item">
                    {{ $recordId }} - {{ $record['categoria'] }} - {{ $record['titulo'] }} - {{ $record['conteúdo'] }}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('import.processAllFromQueue') }}" method="post" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-primary">Processar Importação</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

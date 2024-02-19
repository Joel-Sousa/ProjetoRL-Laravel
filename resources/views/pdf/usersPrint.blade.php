<!DOCTYPE html>
<html>

<head>

</head>

<body>
    {{-- {{ var_dump($userData ?? '') }} --}}
    <div>
    <h3>Lista de usuarios</h3>
        <table border='1'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>Email</th>
                    <th>Criado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userData as $e)
                    <tr>
                        <td>{{$e->name}}</td>
                        <td>{{$e->user->role->name}}</td>
                        <td>{{$e->user->email}}</td>
                        <td>{{$e->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

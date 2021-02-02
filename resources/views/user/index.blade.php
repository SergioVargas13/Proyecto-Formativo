<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Lista de Usuarios</h1>
    <table border="1">
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role Name</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->roles()->first()->name}}</td>
            <td>
            <form action="{{ route('user.show',['user'=>$user->id]) }}">
            <input type="submit" value="Ver Usuario" />
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>
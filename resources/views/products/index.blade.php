@extends('products.base')
@section('content')

@if (Session::has('Message')){{
    Session::get('Message')
}} 
@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->Name}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$item->Image_path}}" width="200" height="200" alt="{{$item->Name}}">
            </td>
            <td>{{$item->Description}}</td>
            <td>{{$item->Category}}</td>
            <td>{{$item->Amount}}</td>
            <td>
                <a href="{{ route('edit', $item->id) }}">Editar</a>
                <form action="{{ route('destroy', $item->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
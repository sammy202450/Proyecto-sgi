@extends('layout/template')

@section('titulo','Create Equipment')

@section('contenido')

<h3>Create Equipment </h3>

<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/inventario')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row row-cols-2">
        <div class="mb-3">
            <label for="codigo" class="form-label">Code</label>
            <input type="text" class="form-control" name="codigo"  id="codigo" placeholder="JABA-0100" value="{{old('codigo')}}">
        </div>
        <div class="mb-3">
            <label for="oficina" class="form-label">Office</label>
            <select class="form-select" name="oficina" aria-label="Default select example" value="{{old('oficina')}}">
                <option selected>Open this select menu</option>
                <option value="OR CDMX">OR CDMX</option>
                <option value="OR ENS">OR ENS</option>
                <option value="OR HGO">OR HGO</option>
                <option value="OR JAL">OR JAL</option>
                <option value="OR MXL">OR MXL</option>
                <option value="OR SON">OR SON</option>
                <option value="OR TIJ END">OR TIJ END</option>
                <option value="OR TIJ MAL">OR TIJ MAL</option>
                <option value="OR TIJ PROY">OR TIJ PROY</option>
                <option value="OR BIG">BIG-CONSULTORES</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="equipo" class="form-label">Equipment</label>
            <select class="form-select" name="equipo"  id="equipo" aria-label="Default select example"  value="{{old('equipo')}}">
                <option selected>Elige una opcion</option>
                <option value="Computadora de escritorio">Computadora de escritorio</option>
                <option value="Computadora AIO">Computadora AIO</option>
                <option value="Monitor">Monitor</option>
                <option value="Teclado">Teclado</option>
                <option value="Mouse">Mouse</option>
                <option value="Regulador con bateria">Regulador con bateria</option>
                <option value="Laptop">Laptop</option>
                <option value="Impresora">Impresora</option>
                <option value="CPU">CPU</option>
                <option value="Servidor">Servidor</option>
                <option value="Accesorios">Accesorios</option>
                <option value="Video-vigilancia">Video-vigilancia</option>
                <option value="Proyector">Proyector</option>
                <option value="Disco Externo">Disco Externo</option>
                <option value="Router">Router (Modem)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Manufacturer</label>
            <input type="text" class="form-control" name="marca" id="marca" placeholder="AOC" value="{{old('marca')}}">
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Model</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="917SW" value="{{old('modelo')}}">
        </div>
        
        
        <div class="mb-3">
            <label for="serie" class="form-label">Series</label>
            <input type="text" class="form-control" name="serie" id="serie" placeholder="GFQH1HA002859" value="{{old('serie')}}">
        </div>
        
    </div>
    <div class="row row-cols-2">
        <div class="mb-3">
            <label for="descripcion" class="form-label">Features</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{old('descripcion')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Stock</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="1" value="{{old('cantidad')}}">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">images</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
        </div>
        
        <div class="mb-3">
            <label for="depto" class="form-label">Office/Dpto/Area</label>
            <select class="form-select" name="depto" aria-label="Default select example" value="{{old('oficina')}}">
                <option selected>Open this select menu</option>
                <option value="Coord. Administrativo">Coord. Administrativo</option>
                <option value="Contabilidad">Contabilidad</option>
                <option value="Recepcion">Recepcion</option>
                <option value="Ofna Gerente">Ofna Gerente</option>
                <option value="Ingenieros de Campo">Ingenieros de Campo</option>
                <option value="Coord. Calidad">Coord. Calidad</option>
                <option value="Coord. Operaciones">Coord. Operaciones</option>
                <option value="Coord. Coorporativa">Calidad Coorporativa</option>
                <option value="Tecnologias de la Informacion">Tecnologias de la Informacion</option>
                <option value="Oficina">Oficina</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="resp" class="form-label">Responsible</label>
            <input class="form-control" name="resp" id="resp" rows="3" value="{{old('resp')}}">
        </div>
        <div class="mb-3">
            <label for="fecha_compra" class="form-label">Date</label>
            <input type="date" class="form-control" name="fecha_compra" id="fecha_compra" placeholder="1" value="{{old('fecha_compra')}}">
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Notes</label>
            <textarea class="form-control" name="nota" id="nota" rows="3">{{old('nota')}}</textarea>
        </div>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Save">
    <a class="btn btn-secondary" href="{{url('/inventario')}}">back</a>
</form>
@endsection
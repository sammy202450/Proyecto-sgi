@extends('layout/template')

@section('titulo','home')

@section('contenido')
<div class="container text-center" >
<h4 >Computer equipment inventory</h4>
</div>


<hr>

<!--nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="{{url('/oficinas')}}">Oficinas</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
      </div>
    </div>
  </div>
</nav-->

@if(!empty($msg))
  <div class="alert alert-primary">
          <ul>
            <li>{{$msg}}</li> 
          </ul>
  </div>
@endif



<a class="btn btn-primary" href="{{url('/inventario/create')}}">Create</a>
<br>
@if(!empty($inventro))
<input type="hidden" value="{{$i=0}}">
<table class="table table-light border-primary table-striped table-hover table-bordered">
<thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Office</th>
      <th scope="col">Equipment</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Series</th>
      <th scope="col">Features</th>
      <th scope="col">Stock</th>
      <th scope="col">Image</th>
      <th scope="col">Department</th>
      <th scope="col">Responsible</th>
      <th scope="col">Date of inventory</th>
      <th scope="col">Note</th>
      <th scope="col">Edit/Del</th>
    </tr>
  </thead>
  <tbody>
    @foreach($inventro as $inv)
        <tr>
        <th scope="row">{{$inv->codigo}}</th>
        <td>{{$inv->oficina}}</td>
        <td>{{$inv->equipo}}</td>
        <td>{{$inv->marca}}</td>
        <td>{{$inv->modelo}}</td>
        <td>{{$inv->serie}}</td>
        <td>{{$inv->descripcion}}</td>
        <td>{{$inv->cantidad}}</td>
        <td><img src="{{url('storage/'.$inv->imagen)}}" width="100px" alt=""></td>
        <td>{{$inv->departamento}}</td>
        <td>{{$inv->responsable}}</td>
        <td>{{$inv->fecha_compra}}</td>
        <td>{{$inv->nota}}</td>
        
        <td><a  class="btn btn-outline-success" href="{{url('/inventario/'.$inv->id.'/edit')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                </svg>
            </a>

            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$i}}">
            
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16">
                <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704"/>
                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                </svg>

            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal-{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel {{$i++}}">Eliminar Equipo </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Estas seguro de eliminar el(la) {{$inv->equipo}}?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{url('/inventario/'.$inv->id)}}" method="post">
                            @method("DELETE")
                            @csrf
                           <button type="submit" class="btn btn-danger"> Accept </button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        </td>
        
        </tr>
    @endforeach
  </tbody>
</table>

@endif

@endsection
@extends('layouts.almacen')

@section('title', 'Almacen')



@section('cont_principal')

<form action="/processart" method="POST">
	@csrf
  <div class="form-group">
    <label for="nombre">Nombre del artículo</label>
    <input type="text" name = "nombre" class="form-control" id="nombre"
        placeholder="Ejem. Tornillos de 3 1/2" value="@if( old('nombre') != null ){{ old('nombre') }}@elseif(isset($edit_articulo) && count($edit_articulo) == 1){{$edit_articulo[0]['nombre_art'] }}@endif">
  </div>
  <div class="form-group">
    <label for="cantidad">Cantidad</label>
    <select class="form-control" id="cantidad" name="cantidad">
      <option value="" selected="selected">Seleccione</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="existencia">Existencia</label>
    <input type="text" name = "existencia" class="form-control" id="existencia" placeholder="Ejm. 12" value="@if( old('existencia') != null ){{ old('existencia') }} @elseif(isset($edit_articulo) && count($edit_articulo) == 1){{$edit_articulo[0]['exis_art'] }} @endif">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">@if( old('descripcion') != null ){{ old('descripcion') }}@elseif(isset($edit_articulo) && count($edit_articulo) == 1){{$edit_articulo[0]['desc_art'] }}@endif</textarea>
  </div>
  <div class="form-group">
        @if(isset($edit_articulo) && count($edit_articulo) == 1)
            <button type="submit" id="updatearticulo" name="updatearticulo" class="btn btn-warning">Actualizar</button>
            <button type="button" id="cancelar" name="cancelar" class="btn btn-secondary">Cancelar</button>
        @else
            <button type="submit" name="nuevoarticulo" class="btn btn-info">Agregar</button>
        @endif
  </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

  @if ($errors->any())
  <div class="form-group">
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Artículo</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Existencia</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
        @if ( isset($articulos) && count($articulos) >= 1)
            @foreach($articulos as $art)
            <tr>
                <th scope="row">{{ $art['id_art'] }}</th>
                <td>{{ $art['nombre_art'] }}</td>
                <td>{{ $art['cant_art'] }}</td>
                <td>{{ $art['exis_art'] }}</td>
                <td>{{ $art['desc_art'] }}</td>
                <td class="text-center columna-accion">
                    <span>
                        <img class="update-icon" src="{{ asset('svg/iconic/svg/pencil.svg')}}" width="20" heigth="20" title="Editar">
                    </span>
                    <span>
                        <img class="trash-icon" src="{{ asset('svg/iconic/svg/trash.svg')}}" width="20" heigth="20" title="Eliminar">
                    </span>
                </td>
            </tr>
        @endforeach
      @endif
    </tbody>
  </table>



</form>

@endsection

@section('js')
<script src="{{ asset('js/frmalmacen.js')}}"></script>
@endsection

@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col col-md-12">
        <form method="POST" action="/create_role">
        @csrf
          <div class="card">
            <div class="card-header">
              <div class="form-row">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Nombre') }}</label>
                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control" name="name" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Slug') }}</label>
                  <div class="col-md-8">
                      <input id="slug" type="text" class="form-control" name="slug" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-center">{{ __('Descripcion') }}</label>
                  <div class="col-md-8">
                      <input id="description" type="text" class="form-control" name="description" value="" required>
                  </div>
                </div>
              </div>

              <br><h3>Host de usuarios</h3><br>
              <div class="form-row justify-content-around">
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Computadoras</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'computadoras')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Notebooks</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'notebooks')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Impresoras</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'impresoras')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Telefonos IP</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'phoneips')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
              </div>

              <br><h3>Networking</h3><br>
              <div class="form-row justify-content-around">
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Modems</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'modems')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Routers</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'routers')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Switchs</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'switchs')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>AccesPoints</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'accespoints')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
              </div>

              <br><h3>CCTV</h3><br>
              <div class="form-row justify-content-around">
                <ul class="list-group" style="margin-right: 15px; width: 25%">
                  <h6>DVRs</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'dvrs')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 25%">
                  <h6>Camaras-IP</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'camaraips')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 25%">
                  <h6>Camaras Analogicas</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'camarasanas')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
              </div>

              <br><h3>SDI</h3><br>
              <div class="form-row justify-content-around">
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Paneles de alarma</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'panelalarm')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Teclados SDI</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'tecladosdis')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Expansoras</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'expansoras')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Comunicadores</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'comunicators')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
              </div>
              <br><br>
              <div class="form-row justify-content-around">
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Sensores</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'sensors')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Sirenas</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'sirenas')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
                <ul class="list-group" style="margin-right: 15px; width: 20%">
                  <h6>Panicos</h6>
                  @foreach ($permissions as $permission)
                    @if (stristr($permission->slug, '.', true) == 'panics')
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                    </li>
                    @endif
                  @endforeach
                </ul>
                <br>
              </div>














              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-dark">
                          {{ __('Agregar') }}
                      </button>
                  </div>
              </div>


            </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection

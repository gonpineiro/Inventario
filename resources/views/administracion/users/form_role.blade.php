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

              <h2>Lista de permisos</h2><br>

              <div class="form-row">
                <ul class="list-group" style="margin-right: 15px">
                  @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                        {{-- <li class="list-group-item"><input type="checkbox" id="permisions[]" value={{$permission->id}}> {{$permission->name}}</li> --}}
                    </li>
                  @endforeach
                </ul>

                <ul class="list-group"  style="margin-right: 15px">
                  @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                        {{-- <li class="list-group-item"><input type="checkbox" id="permisions[]" value={{$permission->id}}> {{$permission->name}}</li> --}}
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="">

              </div>
              <br>
              <div class="form-row">
                <ul class="list-group" style="margin-right: 15px">
                  @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                        {{-- <li class="list-group-item"><input type="checkbox" id="permisions[]" value={{$permission->id}}> {{$permission->name}}</li> --}}
                    </li>
                  @endforeach
                </ul>

                <ul class="list-group" style="margin-right: 15px">
                  @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        {{Form::checkbox('permissions[]',$permission->id,null)}}
                        {{$permission->name}}
                        {{-- <li class="list-group-item"><input type="checkbox" id="permisions[]" value={{$permission->id}}> {{$permission->name}}</li> --}}
                    </li>
                  @endforeach
                </ul>
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

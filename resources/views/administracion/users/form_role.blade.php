@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col col-md-12">
        <form method="POST" action="/create_user">
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
                  <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Nombre') }}</label>
                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control" name="name" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Nombre') }}</label>
                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control" name="name" value="" required>
                  </div>
                </div>
              </div>

              <h2>Lista de permisos</h2><br>

              <div class="form-row">
                <ul class="list-group ">
                  @foreach ($permissions as $permission)
                    {{Form::checkbox('permission[]'), $permission->id ,null}}
                  @endforeach
                </ul>

                <ul class="list-group ">
                  <li class="list-group-item"><input type="checkbox" value=""> {{$permission->name}}</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Morbi leo risus</li>
                  <li class="list-group-item">Porta ac consectetur ac</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
              </div>


            </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection

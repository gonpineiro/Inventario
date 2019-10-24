@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-12">
        <h1>Roles de usuario<a href="/form_role"> +</a></h1>
          <table class="table table-hover" id="host-table" style="width:100%">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Permisos</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <td style="width:7%">{{$role->id}}</td>
                    <td style="width:13%">{{$role->name}}</td>
                    <td style="width:70%">{{$role->description}}</td>
                    <td style="width:10%"></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection

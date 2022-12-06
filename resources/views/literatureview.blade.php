@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">List of Literature</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>  
      <div class="container">
      <a href="/literatureadd" class="btn btn-outline-warning mb-4">Add +</a>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-auto">
                <form action="/literature" method="GET">
                <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                </form>
              </div>
            </div>   
        <div class="row">
          @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
              {{$message}}
            </div>
          @endif
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name of Author</th>
                <th scope="col">Title of Literature</th>
                <th scope="col">Publish</th>
                <th scope="col">Type</th>
                <th scope="col">Genre</th>
                <th scope="col">Setting</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $row)
                <tr>
                  <td>{{$row->id_lit}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->name_lit}}</td>
                  <td>{{$row->year_lit}}</td>
                  <td>{{$row->type_lit}}</td>
                  <td>{{$row->genre}}</td>
                  <td>
                    <a href="/showliterature/{{$row->id_lit}}" class="btn btn-outline-info">Update</a>
                    <a href="/softdeletelit/{{$row->id_lit}}"class="btn btn-outline-primary">Soft Delete</a>
                    <a href="/deletelit/{{$row->id_lit}}" class="btn btn-outline-danger">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
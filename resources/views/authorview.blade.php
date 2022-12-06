@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">List Author</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
              <div class="container">
            <a href="/authoradd" class="btn btn-outline-warning mb-4">Add +</a>
              <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                  <form action="/author" method="GET">
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
                  <th scope="col">id_aut</th>
                  <th scope="col">Name Author</th>
                  <th scope="col">Country</th>
                  <th scope="col">Year</th>
                  <th scope="col">Setting</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $row)
                  <tr>
                    <td>{{$row->id_aut}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->country}}</td>
                    <td>{{$row->year}}</td>
                    <td>
                      <a href="/showauthor/{{$row->id_aut}}" class="btn btn-outline-info">Update</a>
                      <a href="/softdeleteaut/{{$row->id_aut}}" class="btn btn-outline-primary">Soft Delete</a>
                      <a href="/deleteauthor/{{$row->id_aut}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>  

@endsection
@extends('layout.admin')

@section('content')

<body>
    <h2 class="text-center mb-4">Update Data Author</h2>
      <div class="container">
        <div class="row justify-content-center">
           <div class="col-8">
                <div class="card-body">
                    <form action="/updateauthor/{{$data->id_aut}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="exampleInputEmail1">id_aut</label>
                        <input type="text" name="id_aut"class="form-control" id="exampleInputEmail1" value="{{$data->id_aut}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Author</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <input type="text" name="country" class="form-control" id="exampleInputEmail1" value="{{$data->country}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Year</label>
                        <input type="number" name="year" class="form-control" id="exampleInputEmail1" value="{{$data->year}}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
           </div>
            </div>
        </div>
      </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

@endsection
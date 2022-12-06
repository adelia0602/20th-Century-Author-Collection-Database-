@extends('layout.admin')

@section('content')

  <body>
    <h2 class="text-center mb-5 mt-5">Update Information Literature</h2>
      <div class="container">
        <div class="row justify-content-center">
           <div class="col-8">
                <div class="card-body">
                    <form action="/updateliterature/{{$data->id_lit}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="exampleInputEmail1">id_lit</label>
                        <input type="text" name="id_lit"class="form-control" id="exampleInputEmail1" value="{{$data->id_lit}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title of Literature</label>
                        <input type="text" name="name_lit" class="form-control" id="exampleInputEmail1" value="{{$data->name_lit}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Publish</label>
                        <input type="number" name="year_lit" class="form-control" id="exampleInputEmail1" value="{{$data->year_lit}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Code Author</label>
                        <input type="text" name="id_aut" class="form-control" id="exampleInputEmail1" value="{{$data->id_aut}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Code Type</label>
                        <input type="text" name="id_type" class="form-control" id="exampleInputEmail1" value="{{$data->id_type}}">
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
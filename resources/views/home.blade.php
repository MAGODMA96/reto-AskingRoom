@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="alert-message"></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">imdbid</th>
                                    <th scope="col">type</th>
                                    <th scope="col">year</th>
                                    <th scope="col">image</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody id="indexview">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Movie</h4>
            <button type="button" title="close" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6" id="poster-show"><img class="avatar" width="100%" src="https://m.media-amazon.com/images/M/MV5BZjMwNDQ4NzMtOThmZi00NmMyLThkMWItMTA3MTg2YjdiZDRmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg">
                </div>
                <div class="col-md-6 ml-auto">
                    <p><strong>Title:</strong> <span id="title-show"></span></p>
                    <p><strong>Imdbid:</strong> <span id="imdbid-show"></span></p>
                    <p><strong>Year:</strong> <span id="year-show"></span></p>
                    <p><strong>Type:</strong> <span id="type-show"></span></p>
                    <div id="button-show"></div>
                </div>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

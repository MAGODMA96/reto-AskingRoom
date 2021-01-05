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
                    <div id="form_errors"  style="display:none">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">year</th>
                                    <th scope="col">imdbid</th>
                                    <th scope="col">type</th>
                                    <th scope="col">image</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="align-middle" scope="row">1</th>
                                    <td class="align-middle">Mark</td>
                                    <td class="align-middle">Otto</td>
                                    <td class="align-middle">Mark</td>
                                    <td class="align-middle">Otto</td>
                                    <td class="align-middle"><img class="avatar" height="100px" src="https://m.media-amazon.com/images/M/MV5BZjMwNDQ4NzMtOThmZi00NmMyLThkMWItMTA3MTg2YjdiZDRmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg"/></td>
                                    <td class="align-middle"><a class="btn btn-info" href="">open</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

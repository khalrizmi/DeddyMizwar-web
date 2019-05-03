@extends('layouts.template')

@section('content')
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Activity</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Activity</a></li>
      <li class="breadcrumb-item active">Tables            </li>
    </ul>
  </div>
  <section class="tables">   
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="{{ route('gallery.create') }}" class="dropdown-item edit"> <i class="fa fa-add"></i>Create</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h5">Activity Table</h3>
            </div>
            <div class="card-body">
              <table class="table" id="table-1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($galleries as $gallery)
                    <tr>
                      <th scope="row">{{ $loop->index + 1 }}</th>
                      <td>{{ $gallery->image }}</td>
                      <td>{{ $gallery->description }}</td>
                      <td>
                        <a href="#">Edit</a>
                        |
                        <a href="#">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Footer-->
  <footer class="main-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <p>Your company &copy; 2017-2019</p>
        </div>
        <div class="col-sm-6 text-right">
          <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </footer>
</div>

<script>
  $("#table-1").dataTable()
</script>

@endsection
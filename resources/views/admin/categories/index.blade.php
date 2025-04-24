@extends('layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Категории</h3>
                  <form action="{{route('categories.create')}}" method="GET">
                      @csrf
                      <button type="submit" class="btn btn-block bg-success">Создание новой категории</button>
                  </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    @extends('components.alerts')
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th style="width: 40px">action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                      <tr>
                          <td class="align-content-center">{{$category->id}}</td>
                          <td class="align-content-center">{{$category->title}}</td>
                          <td class="align-content-center">{{$category->slug}}</td>
                          <td class="align-content-center">
                              <form method="GET" action="{{route('categories.edit', ['category' => $category->id])}}">
                                  @csrf
                                  <button type="submit" class="btn-app bg-primary"><img src="{{asset('assets/img/icon/edit.svg')}}" alt=""></button>
                              </form>
                              <form method="POST" action="{{route('categories.destroy', ['category' => $category->id])}}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn-app bg-danger"><img src="{{asset('assets/img/icon/trash.svg')}}" alt=""></button>
                              </form>
                          </td>
                      </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                  {{ $categories->links('pagination::simple-bootstrap-4') }}
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

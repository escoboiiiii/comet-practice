@extends('admin.admin-layout.app')
@section('main')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->
        @include('admin.admin-layout.page-header')
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Permission</th>
                                        <th>Slug</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($per_data as $data)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $data -> name }}</td>
                                        <td>{{ $data -> slug }}</td>
                                        <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('permission.edit', $data -> id) }}" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <td>No</td>
                                    @endforelse
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if ($form_type == 'create')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Permission</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            
            @if ($form_type == 'edit')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Permission</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.update', $edit_data -> id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" value="{{ $edit_data -> name }}" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
          
        </div>

        
    </div>			
</div>
@endsection
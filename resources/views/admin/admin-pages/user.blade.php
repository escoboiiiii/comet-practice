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
                        <h4 class="card-title">Basic User Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-info">Edit</a>
                                            <form style="display: inline" action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                   
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
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                    
                            </div>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            
            {{-- @if ($form_type == 'edit')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Permission</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.update',$role_s -> id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" value="{{ $role_s -> name }}" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <ul>
                                     @forelse ($per_data as $item)
                                     <li><input @if(in_array($item -> name, json_decode($role_s -> permission))) checked @endif name="permission[]" value="{{ $item -> name }}" type="checkbox">{{ $item -> name }}</li>
                                     @empty
                                     <li>No</li>
                                     @endforelse
                                </ul>
                        </div>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif --}}
          
        </div>

        
    </div>			
</div>
@endsection
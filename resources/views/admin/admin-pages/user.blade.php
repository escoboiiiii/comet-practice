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
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admin_data as $a_data)
                                    @if ($a_data -> name != 'provider')
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $a_data -> name }}</td>
                                        <td>{{ $a_data -> roles -> name }}</td>
                                        <td>{{ $a_data -> email }}</td>
                                        <td>
                                            <a href="{{ route('user.edit',$a_data -> id) }}" class="btn btn-info">Edit</a>
                                            <form style="display: inline" action="{{ route('user.destroy',$a_data -> id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                        
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
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input name="email" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <select name="role" class="form-control">
                                        <option>-Option-</option>
                                        @forelse ($role_data as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                        @empty
                                        <option>-No-</option>
                                        @endforelse
                                        
                                    </select>
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
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$data -> id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" value="{{ $data -> name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input name="email" type="text" value="{{ $data -> email }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <select name="role" class="form-control">
                                        <option>-Option-</option>
                                        @forelse ($role_data as $item)
                                        <option @if($item -> id == $data -> role_id) selected @endif value="{{ $item -> id }}">{{ $item -> name }}</option>
                                        @empty
                                        <option>-No-</option>
                                        @endforelse
                                        
                                    </select>
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
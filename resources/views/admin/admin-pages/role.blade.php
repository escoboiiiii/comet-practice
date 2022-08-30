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
                        <h4 class="card-title">Basic Role Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($role_data as $r_data)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $r_data -> name }}</td>
                                        <td>
                                            <ul>
                                                @forelse (json_decode($r_data -> permission) as $item)
                                                    <li>{{ $item }}</li>
                                                @empty
                                                    
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('role.edit',$r_data -> id) }}" class="btn btn-info">Edit</a>
                                            <form style="display: inline" action="{{ route('role.destroy',$r_data -> id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
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
                        <h4 class="card-title">Create Permission</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                    <ul>
                                         @forelse ($per_data as $item)
                                         <li><input name="permission[]" value="{{ $item -> name }}" type="checkbox">{{ $item -> name }}</li>
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
            @endif
            
            @if ($form_type == 'edit')
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
            @endif
          
        </div>

        
    </div>			
</div>
@endsection
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
                        <h4 class="card-title">Our Client</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client</th>
                                        <th>Logo</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $d)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $d -> client }}</td>
                                        <td><img style="width: 60px" src="{{ url('storage/sliders/'. $d -> logo) }}"></td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('client.edit',$d -> id) }}" class="btn btn-info">Edit</a>
                                            <form style="display: inline" action="{{ route('client.destroy',$d -> id) }}" method="POST">
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
                        <h4 class="card-title">Create Client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="client" type="text" class="form-control">
                                </div>
                                <div class="form-group row">
                                    <img class="img"  style="width: 50px"><br>
                                    <input id="slider-photo" type="file" name="logo">   
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
                        <h4 class="card-title">Edit Client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.update',$client_data -> id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input name="client" value="{{ $client_data -> client }}" type="text" class="form-control">
                                </div>
                                <div class="form-group row">
                                    <img class="img" src="{{ url('storage/sliders/'.  $client_data -> logo ) }}" style="width: 50px"><br>
                                    <input id="slider-photo" type="file" name="new_logo"> 
                                    <input id="slider-photo" type="hidden" value="{{ $client_data -> logo }}" name="old_logo"> 
                                    
                                </div>
                                
                            </div>
                            <button class="btn btn-info" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
          
        </div>

        
    </div>			
</div>
@endsection
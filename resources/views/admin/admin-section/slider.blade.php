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
                        <h4 class="card-title">Slider</h4>
                        <a href="">Trash Bin</a>
                        @include('admin.admin-layout.validate-main')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Photo</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($slider as $item)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $item -> title }}</td>
                                    <td>{{ $item -> subtitle }}</td>
                                    <td><img style="width: 60px" src="{{ url('storage/sliders/', $item -> photo) }}"></td>
                                    <td>{{ $item -> created_at -> diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('slider.edit', $item -> id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <form style="display: inline" action="{{ route('slider.destroy',$item -> id) }}" method="POST">
                                        @method('DELETE')    
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        
                                    </td>
                                    
                                </tr>
         
                                @empty
                                <td colspan="6">No</td>
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
                        <h4 class="card-title">Basic Inputs</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input name="title" type="text" class="form-control">
                                </div>   
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Subtitle</label>
                                <div class="col-md-10">
                                    <input name="subtitle" type="text" class="form-control">
                                </div>   
                            </div>
                            <div class="form-group row">
                                <img class="img"  style="width: 50px">
                                <input id="slider-photo" type="file" name="photo">   
                            </div>
                            
                            <div class="form-group row slider-btn-opt">
                                
                            </div>
                            <a id="slider-btn" class="btn btn-info">Add New Button</a><br><br>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        
            <!-- Edit -->
            @if ($form_type == 'edit')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Inputs</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('slider.update', $s_data -> id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.admin-layout.validate')
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input name="title" value="{{ $s_data -> title }}" type="text" class="form-control">
                                </div>   
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Subtitle</label>
                                <div class="col-md-10">
                                    <input name="subtitle" value="{{ $s_data -> subtitle }}" type="text" class="form-control">
                                </div>   
                            </div>
                            <div class="form-group row">
                                <img class="img" src="{{ url('storage/sliders/' . $s_data -> photo) }}"  style="width: 50px">
                                <input id="slider-photo" type="file" name="photo">   
                                <input id="slider-photo" type="hidden" value="{{ $s_data -> photo }}" name="new_photo">
                            </div>
                            
                            <div class="form-group row slider-btn-opt">
                                @foreach (json_decode($s_data -> btn) as $btns)
                                <div class="btn-opt-area">
                                    <span>Button </span>
                                    <input class="form-control" type="text" name="btn_title[]" value="{{ $btns -> btn_title}}" placeholder="Button Title">
                                    <input class="form-control" type="text" name="btn_link[]" value="{{ $btns -> btn_link}}" placeholder="Button Url">
                                </div>

                                <select name="btn_type[]">
                                    <option @if($btns -> btn_type == 'btn btn-light-out') selected @endif value="btn btn-light-out">Default</option>
                                    <option @if($btns -> btn_type == 'btn btn-color btn-full') selected @endif value="btn btn-color btn-full">Red</option>
                                  </select>
                                @endforeach
                            </div>
                            <a id="slider-btn" class="btn btn-info">Add New Button</a><br><br>
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
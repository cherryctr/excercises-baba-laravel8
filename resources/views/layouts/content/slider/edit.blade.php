@extends('layouts.app')

@section('content')
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           @include('features.navbar-section')
            <!-- /.navbar-top-links -->

            @include('features.navbar-side')
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Data </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/slider/proses/edit/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" value="{{ $slider->judul }}" aria-describedby="emailHelp" placeholder="Tambah Judul">
                        </div>
                     
                        <div class="form-group">
                          <label for="sel1"> Status </label>
                          <select name="status" class="form-control" id="sel1">
                            <option>--  PILIH STATUS --</option>
                            <option value="0" 
                            {{ $slider->status == 0 ? 'selected' : '' }} >Aktif</option>
                            <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Non-Aktif</option>
                            
                          </select>
                        </div>


                       <div class="form-group">
                         <img src="{{ asset('img/'. $slider->gambar ) }}" class="img-responsive" style="width: 250px; height: 100px;">
                       <br>
                       <input type="hidden" name="gambar_old" value="{{ $slider->gambar }}">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- /.panel -->
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>

@endsection
@extends('layouts.app')

@section('content')
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          @include('features.navbar-section')
            <!-- /.navbar-top-links -->

            @include('features.navbar-side')
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <h3>Menu Admin</h3>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa fa-eye fa-fw"></i> Vie Website</a>
                        </li>                         
                        <li>
                            <a href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>                       
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Kelola<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-arrow-circle-right"></i> &nbsp;Blogs & News</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-arrow-circle-right"></i> &nbsp;Slider</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-arrow-circle-right"></i> &nbsp;teruskan isi</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html"><i class="fa fa-arrow-circle-right"></i> &nbsp;Profile</a>
                                </li>
                                <li>
                                    <a href="buttons.html"><i class="fa fa-arrow-circle-right"></i> &nbsp;Websites</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/blog/proses/edit/' .  $blogs->id  ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $blogs->judul }}">
                     
                      </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" name="wysiwyg-editor">{{ $blogs->deskripsi }}</textarea>
                     
                        </div>

                       <div class="form-group">

                       <img src="{{ asset('img/'. $blogs->gambar ) }}" class="img-responsive" style="width: 250px; height: 100px;">
                       <br>
                       <input type="hidden" name="gambar_old" value="{{ $blogs->gambar }}">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                        <span>Klik untuk ganti gambar</span><br>
                        <span>Kosong kan jika tidak ingin di ganti </span><br>
                     
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
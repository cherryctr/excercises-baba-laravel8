@extends('layouts.app')

@section('content')
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">{{ Auth::user()->name }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <small>Selamat Datang <b>{{ Auth::user()->name }}</b></small>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <!-- COPY DISINI -->
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                            <!-- END -->
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           @include('features.navbar-side')
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Blogs </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table fa-fw"></i> Blog dan News 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- BUTTON TAMBAH  -->
                            <a href="{{ route('adddatablog') }}" class="btn btn-success mb-4"> Tambah
                            </a>  
                            <br>
                            <br>
                            @include('layouts.messages.flash-messages')
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; ?>    
                                    @foreach($blogs as $blog) 
                                   
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $blog->judul }}</td>
                                            <td>{{ $blog->deskripsi }}</td>
                                            <td><img src="{{ asset('img/'. $blog->gambar ) }}" class="img-responsive" style="width: 250px; height: 100px;"></td>
                                 
                                            <td>
                                                <a href="{{ url('/blog/edit/' . $blog->id) }}" class="btn btn-primary mb-4"> Edit
                                                </a>

                                                <a href="{{ url('/blog/hapus/' . $blog->id) }}" class="btn btn-danger mb-4"> Hapus
                                                </a>    
                                            </td>
                                            
                                        </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                    </tbody>
                                    
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>

@endsection
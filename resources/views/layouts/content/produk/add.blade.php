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
                   <form id="signupForm1" method="post" class="form-horizontal" action="">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="firstname1">Judul</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Anda" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="firstname1">Diskon</label>
                            <div class="col-sm-5">
                            <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukan diskon" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="firstname1">Harga</label>
                            <div class="col-sm-5">
                             <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="firstname1">Harga</label>
                            <div class="col-sm-5">
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Sign up</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.panel -->
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>

@endsection
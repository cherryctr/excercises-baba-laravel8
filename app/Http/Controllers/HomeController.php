<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sliders;
use App\Models\Blogs;
use App\Models\Products;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        // Untuk mengambil Data dari database berdasarkan status 0 / aktif
        $slider = Sliders::where('status','=','0');
        // Untuk menghitung Jumlah status 0/aktif
        $slider_count = $slider->count();


        // Untuk mengambil Data dari Blogs
        $blogs = Blogs::All();
        // Untuk menghitung Jumlah Blogs
        $blogs_count = $blogs->count();

        // Untuk mengambil Data Produk dari database 
        $products = Products::All();
        // Untuk menghitung Jumlah Produk dari database 
        $products_count = $products->count();

         // Untuk mengambil Data User dari database 
        $user = User::All();
        // Untuk menghitung Jumlah User dari database 
        $user_count = $user->count();

        
        
        return view('layouts.home.home-admin',compact(
            'slider','slider_count',
            'blogs' , 'blogs_count',
            'products','products_count',
            'user','user_count'

        ));
    }


    public function indexSlider()
    {
        
        
        // Untuk mengambil Data dari database berdasarkan status 0 / aktif
        $sliders = Sliders::All();
        $slider = Sliders::where('status','=','0');
        // Untuk menghitung Jumlah status 0/aktif
        $slider_count = $slider->count();


        // Untuk mengambil Data dari Blogs
        $blogs = Blogs::All();
        // Untuk menghitung Jumlah Blogs
        $blogs_count = $blogs->count();

        // Untuk mengambil Data Produk dari database 
        $products = Products::All();
        // Untuk menghitung Jumlah Produk dari database 
        $products_count = $products->count();

         // Untuk mengambil Data User dari database 
        $user = User::All();
        // Untuk menghitung Jumlah User dari database 
        $user_count = $user->count();

        
        
        return view('layouts.content.slider.index',compact(
            'slider','slider_count','sliders',
            'blogs' , 'blogs_count',
            'products','products_count',
            'user','user_count'

        ));
    }


    public function tambahDataSlider()
    { 
        return view('layouts.content.slider.add');
    }

    public function editDataSliders($id)
    {
        $slider = Sliders::findOrFail($id);
        return view('layouts.content.slider.edit', compact('slider'));
    }

    // PROSES TAMBAH DATA BLOG 
     public function prosestambahslider(Request $request)
    {
         $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'status'   => 'required'
        ]);

        //upload image
        $slider = new Sliders();
        $slider->judul = $request->get('judul');
        $slider->status = $request->get('status');

        
        if ($request->hasFile('gambar')) {
            // $post->delete_image();
            $gambar = $request->file('gambar');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('img', $name);
            $slider->gambar = $name;
        }
        $slider->save();


        // dd($slider);
        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('indexslider')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('indexslider')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    // PROSES Hapus
    public function hapusDataSlider($id)
    {
        // echo $id; exit;
        $slider = Sliders::where('id',$id)->delete();

        if ($slider) {
            //redirect dengan pesan sukses
            return redirect()->route('indexslider')->with(['success' => 'Data Berhasil Didelete!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('indexslider')->with(['error' => 'Data Gagal Didelete!']);
        }
    }


    public function updateDataSlider(Request $request, $id)
    {
         $this->validate($request, [
            'gambar'     => 'image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'status'   => 'required'
        ]);

        $slider = Sliders::findOrFail($id);
        $slider->judul = $request->get('judul');
        $slider->status = $request->get('status');
        

        if ($request->hasFile('gambar')) {
            // $post->delete_image();
           
            if($request->file('gambar') == ""){
                $gambar = $request->file('gambar_old');
            }else{
                 $gambar = $request->file('gambar');
            }
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('img', $name);
            $slider->gambar = $name;
        }
        $slider->save();


        // dd($slider);
        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('indexslider')->with(['success' => 'Data Berhasil DiUpdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('indexslider')->with(['error' => 'Data Gagal DiUpdate!']);
        }
    }


     public function indextwo()
    {
        

        // Untuk mengambil Data dari database berdasarkan status 0 / aktif
        $slider = Sliders::where('status','=','0');
        // Untuk menghitung Jumlah status 0/aktif
        $slider_count = $slider->count();


        // Untuk mengambil Data dari Blogs
        $blogs = Blogs::All();
        // Untuk menghitung Jumlah Blogs
        $blogs_count = $blogs->count();

        // Untuk mengambil Data Produk dari database 
        $products = Products::All();
        // Untuk menghitung Jumlah Produk dari database 
        $products_count = $products->count();

         // Untuk mengambil Data User dari database 
        $user = User::All();
        // Untuk menghitung Jumlah User dari database 
        $user_count = $user->count();

        
        
        return view('layouts.content.blog.index',compact(
            'slider','slider_count',
            'blogs' , 'blogs_count',
            'products','products_count',
            'user','user_count'

        ));
    }



    public function tambahDataBlog()
    { 
        return view('layouts.content.blog.add');
    }

    

    public function editDataBlog($id)
    {
        $blogs = Blogs::findOrFail($id);
        return view('layouts.content.blog.edit', compact('blogs'));
    }

    // PROSES TAMBAH DATA BLOG 
     public function prosestambahblog(Request $request)
    {
         $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'deskripsi'   => 'required'
        ]);

        //upload image
        $blogs = new Blogs();
        $blogs->judul = $request->get('judul');
        $blogs->deskripsi = $request->get('deskripsi');
        
        if ($request->hasFile('gambar')) {
            // $post->delete_image();
            $gambar = $request->file('gambar');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('img', $name);
            $blogs->gambar = $name;
        }
        $blogs->save();


        // dd($blogs);
        if($blogs){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    // PROSES TAMBAH DATA BLOG 
     public function prosestambahblogs(Request $request)
    {
         $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'deskripsi'   => 'required'
        ]);

        //upload image
        $blogs = new Blogs();
        $blogs->judul = $request->get('judul');
        $blogs->deskripsi = $request->get('deskripsi');
        
        if ($request->hasFile('gambar')) {
            // $post->delete_image();
            $gambar = $request->file('gambar');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('img', $name);
            $blogs->gambar = $name;
        }
        $blogs->save();


        // dd($blogs);
        if($blogs){
            //redirect dengan pesan sukses
            return redirect()->route('home.prosestambahblogs')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home.prosestambahblogs')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // PROSES Hapus
    public function hapusDataBlog($id)
    {
        // echo $id; exit;
        $blogs = Blogs::where('id',$id)->delete();

        if ($blogs) {
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Didelete!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Didelete!']);
        }
    }

    // Proses Update Data Blog
    public function updateDataBlog(Request $request, $id)
    {
         $this->validate($request, [
            'gambar'     => 'image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'deskripsi'   => 'required'
        ]);

        $blogs = Blogs::findOrFail($id);
        $blogs->judul = $request->get('judul');
        $blogs->deskripsi = $request->get('deskripsi');
        

        if ($request->hasFile('gambar')) {
            // $post->delete_image();
           
            if($request->file('gambar') == ""){
                $gambar = $request->file('gambar_old');
            }else{
                 $gambar = $request->file('gambar');
            }
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('img', $name);
            $blogs->gambar = $name;
        }
        $blogs->save();


        // dd($blogs);
        if($blogs){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil DiUpdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal DiUpdate!']);
        }
    }
}

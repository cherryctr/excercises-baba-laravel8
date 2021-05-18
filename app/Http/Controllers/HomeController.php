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



    public function tambahDataProduk()
    { 
        return view('layouts.content.blog.add');
    }

    

    public function editDataBlog($id)
    {
        $blogs = blogs::findOrFail($id);
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


    // PROSES EDIT
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
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'deskripsi'   => 'required'
        ]);

        $blogs = Blogs::findOrFail($id);
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
}

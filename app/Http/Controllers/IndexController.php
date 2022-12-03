<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;



class IndexController extends Controller
{
    public function home() {
        $truyenxh = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->skip(0)->take(5)->get();
        $danhmuc = DanhmucTruyen::orderBy('tendanhmuc','ASC')->get();
        $slider = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->skip(0)->take(8)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        return view('pages.home')->with(compact('danhmuc', 'truyen','truyenxh','slider')); 
    }
    public function danhmuc($slug) {
        $truyenxh = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->skip(0)->take(5)->get();
        $danhmuc = DanhmucTruyen::orderBy('tendanhmuc','ASC')->get();
        $id_dm = DanhmucTruyen::where('slugdanhmuc',$slug)->first();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->where('danhmuc_id',$id_dm->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen','truyenxh','id_dm')); 
    }
    public function doctruyen($slug) {
        $truyen = Truyen::where('slugtruyen',$slug)->first();

        $chapter = Chapter::orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        $chapter_first = Chapter::orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        $danhmuc = DanhmucTruyen::orderBy('tendanhmuc','ASC')->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','chapter_first')); 
    }
    public function chapter($id, $slug) {
        $chapter = Chapter::with('truyen')->where('id', $id)->first();
        $truyen = chapter::where('id', $id)->first();
        $allchapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();
        $breadcrumb = Truyen::where('id',$truyen->truyen_id)->first();

        $nextID = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('id');
        $nextSlug = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

        $backID = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('id');
        $backSlug = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $maxID = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id','DESC')->first();
        $minID = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id','ASC')->first();


        $danhmuc = DanhmucTruyen::orderBy('tendanhmuc','ASC')->get();  
        return view('pages.chapter')->with(compact('danhmuc','chapter','breadcrumb','allchapter','nextID','nextSlug','backID','backSlug','maxID','minID')); 
    }

    public function search() {
        $truyenxh = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->skip(0)->take(5)->get();
        $danhmuc = DanhmucTruyen::orderBy('tendanhmuc','ASC')->get();

        $search = $_GET['search'];
        $truyen = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE','%'.$search.'%')->get();

        return view('pages.search')->with(compact('truyen','truyenxh','danhmuc'));
    }

    public function searchAuto(Request $request)
    {
        $truyen = Truyen::orderBy('tentruyen', 'ASC')->where('tentruyen','LIKE','%'.$request->e.'%')->get();
        return $truyen;
    }

}

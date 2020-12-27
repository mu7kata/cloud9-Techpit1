<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index(Request $request){
      $keyword=$request->search;
    if(isset($keyword)){
        $reviews=Review::where(
            function($query) use($keyword){
                 $query->where('title', $keyword)
                ->orwhere('group_name',$keyword);
            })->orderBy('created_at', 'DESC')->paginate(6);
        
        }else
        $reviews = Review::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('index', compact('reviews'));
        
       
    }
    
    public function create(){
        return view('review');
        }

      public function store(Request $request)
    {
        
        $post = $request->all();
        
         $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
        if($request->hasfile('image')){
         $request->file('image')->store('/public/images');
         $data = ['user_id' => \Auth::id(), 'title' => $post['title'],'group_name' => $post['group'],'body' => $post['body'], 'image' => $request->file('image')->hashName()];
        }else{
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'],'group_name' => $post['group'], 'body' => $post['body']];
        }
        
        Review::insert($data);

        return redirect('/')->with('flash_message', '投稿が完了しました');
    }
   public function show($id)
{
    $review = Review::where('id', $id)->where('status', 1)->first();

    return view('show', compact('review'));
}

}


@extends('layouts.app')

@section('css')
 <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>レビュー編集ページ</h1>
  <div class="card">
    <div class="card-body d-flex">
 
      <aside class='review-image'>
@if(!empty($review->image))
        <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}">
@else
        <img class='book-image' src="{{ asset('images/dummy.png') }}">
@endif

      </aside>
            <section class='review-main'>
            <form action="{{ route('update') }}" method='POST' enctype="multipart/form-data">
            	   @csrf
          
        <h2 class='h2'>■ 名前</h2>
        <input type="text" name="title" value={{$review->title}}>
         <h2 class='h2'>■ 所属グループ</h2>
        <input type="text" name="group" value={{$review->group_name}}>
        <h2 class='h2'>■ レビュー：</h2>
         <textarea type="text" name="body">{{$review->body}}</textarea>
            <div class="form-group">
                <label for="file1">画像</label>
                <input type="file" id="file1" name='image' class="form-control-file" >
              </div>
         <input type="hidden" name="id" value={{$review->id}}>
       <input type=submit value="再登録">
        </form> 
        </section> 
    </div>
   
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
  </div>
</div>
@endsection
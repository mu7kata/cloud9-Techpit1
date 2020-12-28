@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="search-wrapper">
    <form action="" method="get">
         @csrf
         
        <input  class="keyword" type="search" name="search" placeholder="キーワードで検索" value={{$keyword}}>
         <select class="group" name="group" >
            <option>グループ名で検索</option>
            <option>ももいろクローバーZ</option>
             <option>TEAMSHACHI</option>
              <input type="submit" name="submit" value="検索">
        </select>
    </form>
</div>

<div class="row justify-content-center">
    @foreach($reviews as $review)
    <div class="col-md-4">
        <div class="card mb50">
            <div class="card-body">
                
                 @if(!empty($review->image))
              <div class='image-wrapper'><img class='book-image' src="{{ asset('storage/images/'.$review->image) }}"></div>
          @else
                <div class='image-wrapper'><img class='book-image' src="{{ asset('images/booklogo.png') }}"></div>
                 @endif
                <h3 class="h3 book-title">{{$review->title}}</h3>
                <p class='description'>所属：{{$review->group_name}}</p>
                <a href="{{route('show',['id'=>$review->id])}}"class='btn btn-secondary detail-btn'>詳細</a>
              <a href="{{route('edit',['id'=>$review->id])}}">編集</a>
            </div>
        </div>
        
    </div>
     @endforeach
</div>
{{ $reviews->links() }}
@endsection
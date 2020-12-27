@extends('layouts.app')

@section('content')


<h1 class='pagetitle'>Reviewー投稿ページ</h1>
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row justify-content-center container">
    <div class="col-md-10">
    	
     <form method='POST' action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>アイドルネーム</label>
                <input type='text' class='form-control' name='title' placeholder='アイドルの名前を入力' value="{{ old('title') }}">
                <label>グループ</label>
                <input type='text' class='form-control' name='group' placeholder='所属グループを入力' value="{{old('group')}}">
              </div>
              <div class="form-group">
              <label>レビュー本文</label>
                <textarea class='description form-control' name='body' placeholder='本文を入力' value="{{old('body')}}"></textarea>
              </div>
              <div class="form-group">
                <label for="file1">画像</label>
                <input type="file" id="file1" name='image' class="form-control-file" value="{{old('image')}}" >
              </div>
              <input type='submit' class='btn btn-primary' value='レビューを登録'>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
@extends('admin.layouts.master')

@section('page-title', 'Create article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
       @if (count($errors) > 0)
		<!-- 表單錯誤清單 -->
		<div class="alert alert-danger">
			<strong>哎呀！出了些問題！</strong>

			<br><br>

			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
    </div>
    <form action="{{route('admin.posts.store')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">標題：</label>
            <input id="title" name="title" class="form-control" value="{{old('title')}}" placeholder="請輸入文章標題">
		</div>
        <div class="form-group">
            <label for="content" class="form-label">內容：</label>
            <textarea id="content" name="content" class="form-control" rows="10">{{old('content')}}</textarea>
        </div>
        <div class="form-group">
            <label for="is_feature" class="form-label">精選？</label>
            <select id="is_feature" name="is_feature" class="form-control">
                <option value="0">否</option>
                <option value="1">是</option>
            </select>
        </div>
        <div class="text-right">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection

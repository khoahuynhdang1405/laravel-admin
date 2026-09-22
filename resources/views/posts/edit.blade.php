@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Sửa viết mới</h1>
    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" novalidate enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <img width="150" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" />
        </div>

        <div class="mb-3">
            <label class="form-label">Thumbnail</label><br>
            <input type="file" name="thumbnail" accept="image/jpg">
            @error('thumbnail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

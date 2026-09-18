@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Tạo bài viết mới</h1>
    <form method="POST" action="{{ route('posts.store') }}" novalidate enctype="multipart/form-data">
        @csrf
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
            <textarea name="content" class="form-control" rows="4" required></textarea>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="
        {{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

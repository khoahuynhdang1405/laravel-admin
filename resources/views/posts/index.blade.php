@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Danh sách bài viết</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ Thêm bài viết</a>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu động -->
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="{{ route('posts.destroy', ['id' =>$post->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Danh sách bài viết hiện tại đang trống</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

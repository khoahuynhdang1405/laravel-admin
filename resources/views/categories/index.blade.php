@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Danh sách danh mục</h1>
    <div class="flex gap-2">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Thêm bài viết</a>
        <a href="{{ route('categories.destroyAll') }}" class="btn btn-danger mb-3">Xóa tất cả</a>
    </div>

    @if (session('message'))
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
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                            class="btn btn-sm btn-warning">Sửa</a>
                        <a href="{{ route('categories.destroy', ['id' => $category->id]) }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Danh mục hiện tại đang trống</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

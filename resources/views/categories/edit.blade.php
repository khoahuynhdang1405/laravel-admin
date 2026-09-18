@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Tạo danh mục mới</h1>
    <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}" novalidate>
        @csrf
        <input type="hidden" name='_method' value="PUT" />
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required value="{{ $category->name }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $category->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="
        {{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

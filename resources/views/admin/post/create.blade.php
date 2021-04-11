@extends('template_backend.home')
@section('sub-judul', 'Tambah Post')
@section('content')
    @if (count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($category as $result)
                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input">
                <label class="custom-file-label">Thumbnail</label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Simpan Post</button>
        </div>
    </form>
@endsection
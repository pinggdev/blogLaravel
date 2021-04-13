@extends('template_backend.home')
@section('sub-judul', 'Edit Post')
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

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($category as $result)
                    <option value="{{ $result->id }}" @if($post->category_id == $result->id) selected @endif>{{ $result->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" class="form-control">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Pilih tags</label>
            <select class="form-control select2" multiple="" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"  @foreach ($post->tags as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                @endforeach
            </select>
          </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input">
                <label class="custom-file-label">Thumbnail</label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Post</button>
        </div>
    </form>
@endsection
@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Məqalə - {{ $post->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Məqalələrin Siyahısı</a></li>
                            <li class="breadcrumb-item active">{{ $post->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                @include('admin.layouts.alert-msj')
                                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <img src="{{ $post->getThumbnail() }}" alt="thumbnail" class="img-thumbnail" width="200">
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <label for="thumbnail">Şəkil</label>
                                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id">Bölmələr</label>
                                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                                        @foreach($categories as $k => $v)
                                                            <option @if($k == $post->category_id) selected @endif value="{{ $k }}">{{ $v }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <p style="color: #dc3545;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Məqalə adı</label>
                                                    <input type="text" name="name" value="{{ $post->name }}" class="form-control @error('name') is-invalid @enderror" id="name">
                                                    @error('name')
                                                    <p style="color: #dc3545;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="tags">Taqlar</label>
                                                    <select class="form-control select2" multiple="multiple"
                                                            data-placeholder="Seçim edin" style="width: 100%;" name="tags[]" id="tags">
                                                        @foreach($tags as $k => $v)
                                                            <option @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif value="{{ $k }}">{{ $v }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="desc">Qısa təsvir</label>
                                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="5">{{ $post->desc }}</textarea>
                                                    @error('desc')
                                                    <p style="color: #dc3545;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="desc">Tam mətn</label>
                                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="desc" rows="10">{{ $post->content }}</textarea>
                                                    @error('content')
                                                    <p style="color: #dc3545;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Əlavə et</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });
</script>
@endsection

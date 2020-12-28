@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Məqalələrin Siyahısı</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Məqalələrin Siyahısı</li>
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
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-success mb-3">Yeni Məqalə</a>
                            @if(count($posts))
                            @include('admin.layouts.alert-msj')
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="text-center">
                                    <tr>
                                        <th>Şəkil</th>
                                        <th>Məqalə adı</th>
                                        <th>Bölmə adı</th>
                                        <th>Taqlar</th>
                                        <th>Tarix</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($post->getThumbnail()) }}" width="50" class="img-thumbnail" alt="thumbnail">
                                        </td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->tags->pluck('name')->join(', ') }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Silmək istədiyinizdən əminsinizmi ?')" class="btn btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p style="font-size: 20px;font-weight: 700;color: #17a2b8;"><i class="fas fa-info-circle"></i> Məqalə yoxdur</p>
                            @endif
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

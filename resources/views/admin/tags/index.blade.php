@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Taqların Siyahısı</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Taqların Siyahısı</li>
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
                            <a href="{{ route('tags.create') }}" class="btn btn-outline-success mb-3">Yeni Taq</a>
                            @if(count($tags))
                            @include('admin.layouts.alert-msj')
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Taq adı</th>
                                        <th>Slug</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>
                                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-outline-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
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
                            <p style="font-size: 20px;font-weight: 700;color: #17a2b8;"><i class="fas fa-info-circle"></i> Taq yoxdur</p>
                            @endif
                            {{ $tags->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('backend.layouts.master',['page'=>'Show'])

@section('title','Show'.' '.$panel)


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card">
            <div class="card-header">
                <h3 class="card-title">Show {{ $panel }}</h3>
                <a class="btn btn-info btn-md float-right ml-1" href="{{ route($base_route.'index') }}">
                    <i class="fas fa-list"></i> List
                </a>
                <a class="btn btn-success btn-md float-right" href="{{ route($base_route.'create') }}">
                    <i class="fas fa-pencil-alt"></i>
                    Create
                </a>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Category Id</th>
                    <td>{{ $data['rows']->category_id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $data['rows']->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $data['rows']->slug }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if ($data['rows']->image)
                            <img src="{{ asset($img_path.$data['rows']->image) }}" alt="image" class="img-fluid" width="150">
                        @else
                            {{ 'Image Not Found' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Rank</th>
                    <td>{{ $data['rows']->rank }}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $data['rows']->short_description }}</td>
                </tr>
                <tr>
                    <th>Long Description</th>
                    <td>{{ $data['rows']->description }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $data['rows']->createdBy->name }}</td>
                </tr>
                <tr>
                    <th>Updated By</th>
                    <td>{{ $data['rows']->updatedBy->name?? 'Not Updated Yet' }} ({{$data['rows']->updated_at->diffForHumans()}})</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['rows']->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $data['rows']->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection

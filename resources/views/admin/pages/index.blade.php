@extends('layouts.adminapp')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Laravel Pages</h2>
  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('pages.create') }}"> <i class="fa fa-plus"></i> Create New Page</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($pages as $page)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->short_description }}</td>
                    <td>{{ $page->long_description }}</td>
                    <td>
                        <form action="{{route('pages.destroy',$page->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('pages.show',$page->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('pages.edit',$page->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $pages->withQueryString()->links('pagination::bootstrap-5') !!}

  </div>
</div>
@endsection

@extends(config('laravel_pages.layout_file'))

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="{{ route(config('laravel_pages.admin_route_prefix').'pages.create') }}" class="btn btn-primary">Create</a>
            </div>
            <h2>Pages</h2>
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Page Title</th>
                        <th>URL</th>
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="{{ route(config('laravel_pages.admin_route_prefix').'laravel-pages.show', $page->slug) }}">{{ route(config('laravel_pages.admin_route_prefix').'laravel-pages.show', $page->slug) }}</a>
                        </td>
                        <td>
                            {{ $page->views }}
                        </td>
                        <td>
                            <span class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route(config('laravel_pages.admin_route_prefix').'pages.edit', $page) }}">Edit
                                        Page</a>

                                        <form action="{{ route(config('laravel_pages.admin_route_prefix').'pages.destroy', $page) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item deleter text-danger">Delete Page</button>
                                        </form>
                                </div>
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
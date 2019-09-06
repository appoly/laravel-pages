@extends(config('laravel_pages.layout_file'))

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="{{ route('pages.create') }}" class="btn btn-primary">Create</a>
            </div>
            <h2>Pages</h2>
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Page Title</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td><a href="{{ route('laravel-pages.show', $page->slug) }}">{{ route('laravel-pages.show', $page->slug) }}</a>
                        </td>
                        <td>
                            <a href="{{ route('pages.edit', $page) }}" class='btn btn-primary'>Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
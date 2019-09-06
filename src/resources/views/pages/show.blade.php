@extends(config('laravel_pages.layout_file'))

@section('content')

<div class="container">
    <div class="page-content my-4">
        <div class="title mb-4">
            <h1>{{ $page->title }}</h1>
        </div>

        {!! $page->body !!}
    </div>

</div>

@endsection
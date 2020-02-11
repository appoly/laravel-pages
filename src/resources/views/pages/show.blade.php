@extends(config('laravel_pages.layout_file_frontend'))

@section('content')

<div class="container">
    <div class="page-content my-4 pt-5">
        <div class="title mb-4">
            <h1>{{ $page->title }}</h1>
        </div>

        @if (isset($page->header_image))
        <div class="header_image mb-3">
            <img class="img-fluid" src="{{ $page->header_image }}" alt="">
        </div>
        @endif

        {!! $page->body !!}

        @if (isset($page->partial))
        @include(config('laravel_pages.partials.'. $page->partial .'.location'))
        @endif
    </div>
</div>

@endsection
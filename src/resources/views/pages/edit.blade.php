@extends(config('laravel_pages.layout_file'))

@section('scripts')
<script type="text/javascript" src="/vendor/appoly/laravel-pages/js/app.js" defer></script>
<link rel="stylesheet" href="/vendor/appoly/laravel-pages/css/app.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('pages.update', $page) }}" method="POST">
                @csrf
                @method('PATCH')
                @include('laravel-pages::pages.form')
            </form>
        </div>
    </div>
</div>

@endsection
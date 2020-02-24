@extends(config('laravel_pages.layout_file'))

@section('scripts')
<script type="text/javascript" src="/vendor/appoly/laravel-pages/js/app.js" defer></script>
<link rel="stylesheet" href="/vendor/appoly/laravel-pages/css/app.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Create a new page
        </div>
        <div class="card-body">

            <form action="{{ route(config('laravel_pages.admin_route_prefix').'pages.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @include('laravel-pages::pages.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection
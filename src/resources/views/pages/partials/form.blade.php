<div class="form-row mb-3">
    <div class="col">
        <div class="custom-file">
            <input id="header_image" class="custom-file-input" type="file" name="header_image">
            <label for="header_image" class="custom-file-label">Header Image</label>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class='form-control' value="{{ isset($page) ? $page->title : '' }}">
    </div>
    <div class="col">
        <label for="url">Page URL</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">{{ URL::to('/') }}/</div>
            </div>
            <input type="text" name="slug" id="slug" class='form-control' value="{{ isset($page) ? $page->slug : '' }}">
        </div>
    </div>
</div>

@switch(config('laravel_pages.editor'))
@case('tiptap')
<page-body-editor :body="''" name="body"></page-body-editor>
@break
@default
<label for="body">Page Body</label>
<textarea name='body' class='form-control'></textarea>
@endswitch

@if (!empty(config('laravel_pages.partials')))
<div class="form-group">
    <label for="partial">Include a custom element</label>
    <select id="partial" class="custom-select" name="partial">
        <option value="select">Select</option>
        @foreach (config('laravel_pages.partials') as $key => $partial)
            <option value="{{ $key }}">{{ $partial }}</option>
        @endforeach
    </select>
</div>


@endif


<div class="float-right mt-3">
    <a href="{{ route(config('laravel_pages.admin_route_prefix').'pages.index') }}" class="btn btn-danger">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
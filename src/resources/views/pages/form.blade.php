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
        {{-- <tiptap :body="''" name="body"></tiptap> --}}
        @break
    @case(2)
        
        @break
    @default
        <label for="body">Page Body</label>
        <textarea name='body' class='form-control'></textarea>
@endswitch

{{-- <wysiwyg :body="''" name="body"></wysiwyg> --}}

<div class="float-right mt-3">
    <a href="{{ route('pages.index') }}" class="btn btn-danger">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@extends('admin.layouts.admin')

@section('title')
    Manage Business Pages | Admin
@endsection

@section('content')
    <div class="card m-4">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                @if (isset($page)) action="{{ route('business.update-page', ['slug' => $slug, 'id' => $page->id]) }}" @else  action="{{ route('business.store-page', $slug) }}" @endif>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title"
                        @if (isset($page)) value="{{ $page->title }}" @endif>
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug"
                        @if (isset($page)) value="{{ $page->slug }}" @endif>
                    @error('slug')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Featured Image</label>
                    <input type="file" class="form-control" name="featured_image">
                    @error('featured_image')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    @if (isset($page))
                        @if ($page->featured_image)
                            <img src="{{ asset('images/' . $page->featured_image) }}" alt="" width="100"
                                height="100">
                        @endif
                    @endif
                </div>
                <div class="mb-3">
                    <div>
                        <label class="form-label">Content</label>
                        <textarea class="form-control" rows="3" name="content">
@if (isset($page))
{{ $page->content }}
@endif
</textarea>
                        <span class="form-text">Enter at least 1000 charcters.</span>
                    </div>
                    @error('content')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" onclick="history.back()" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
@endsection


@section('custom-js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'Pawan Bhatta',
                    title: 'Creator'
                },
                {
                    value: 'a@a.com',
                    title: 'Email'
                },
            ],
        });
    </script>
@endsection

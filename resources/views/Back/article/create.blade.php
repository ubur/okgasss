@extends('Back.layouts.template')



@section('title', 'admin create article')

@section('content')
    {{-- content  --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Article</h1>
        </div>

        <div class="mt-3">
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="my-3">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif


            <form action="{{ url('article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" hidden>---Choose---</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name="desc" id="myEditor" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3">
                    <label for="desc">Image (max 2 mb)</label>
                    <input type="file" name="img" id="img" class="form-control">
                    <div class="mt-1">
                        <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="" hidden> ---Choose---</option>
                                <option value="1">Publish</option>
                                <option value="0">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">Publish Date</label>
                            <input class="form-control" type="date" name="publish_date" id="publish_date">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_hadleImages: false

        }
    </script>

    <script>
        //ckeditor
        CKEDITOR.replace('myEditor', options);


        //img preview
        $("#img").change(function() {
            previewImage(this);
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

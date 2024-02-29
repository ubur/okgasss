@extends('Back.layouts.template')

@section('title', 'admin dashboard')

@section('content')
    {{-- content  --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card text-bg-primary mb-3" style="max-width:100%">
                    <div class="card-header"> Total Article</div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $total_articles }}</h5>
                        <hr>
                        <p class="card-text">
                            <a href="{{ url('article') }}" class="text-blue">Views</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-primary mb-3" style="max-width:100%">
                    <div class="card-header"> Total categories</div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $total_categories }}</h5>
                        <hr>
                        <p class="card-text">
                            <a href="{{ url('categories') }}" class="text-blue">Views</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h4>latets article</h4>
                <table class="table table-bordered striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_article as $item)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->Category->name }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td class="text-center">
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <h4>Populer article</h4>
                <table class="table table-bordered striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($populer_article as $item)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->Category->name }} </td>
                                <td> {{ $item->views }} x </td>
                                <td class="text-center">
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>





    </main>

    {{--  header  --}}
@endsection

@extends('Back.layouts.template')

@section('title', 'admin User')

@section('content')
    {{-- content  --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">User</h1>
        </div>

        <div class="mt-3">
            @if (auth()->user()->role == 1)
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Register</button>
            @endif

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

            <table class="table table-striped table-bordered table-info">
                <thead>
                    <tr>
                        <th> No</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Created at</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                                    @if (auth()->user()->role == 1)
                                        @if ($item->id != auth()->user()->id)
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('Back.user.create-modal')
        @include('Back.user.delete-modal')
        @include('Back.user.update')

    </main>
@endsection

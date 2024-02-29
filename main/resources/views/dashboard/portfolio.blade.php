@extends('layouts.dashboard')
@section('title', 'Portfolio')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

    <li class="breadcrumb-item active">Portfolio</li>
@endsection
@section('dashboardMain')
<h2 class="my-3 mb-3">Add Portfolio</h2>
    <!-- Button trigger modal -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPortfolio">
            Add Portfolio
        </button>
        <!-- Modal -->
    <div class="modal fade" id="addPortfolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('addPortfolio') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3 w-100 text-center">
                            <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                                alt="Preview Uploaded Image" id="file-preview"><br>
                            <label for="uploadImage" class="w-100 text-center mb-2">
                                <i style="font-size:48px;" class="bi bi-upload w-100"></i><br>
                                <span>Select an Image</span>
                            </label>
                            <input placeholder="select image"
                                class="d-none w-100 border my-1 form-control border-secondary" type="file"
                                name="update_img" id="uploadImage">
                            <input name="name"
                                class="w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                type="text" placeholder="Portfolio title here" name="title" id="">
                            <select class="form-select form-select-lg w-100 border-secondary-subtle my-1" name="category"
                                id="">
                                <option selected>Select Category</option>
                                @foreach ($categories as $key => $category)
                                    <option>{{ $category }}</option>
                                @endforeach
                            </select>
                            <div class="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                        {{-- <button type="button" class="">Save changes</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <form action="{{ route('updateDescription') }}" method="post">
        @method('put')
        @csrf
        <h5 class="mt-0">Update Description</h5>
        <div class="form-floating d-flex">
            @foreach ($sectionDescriptions as $item)
                @if ($item->title == 'portfolio')
                    <div class="row col-12">
                        <div class="col-10">
                            <textarea name="section_description" class="form-control border-secondary" placeholder="Description"
                                id="floatingTextarea" style="height: 100px;">{{ $item->description }}</textarea>
                            <input type="hidden" name="section_id" value="{{ $item->id }}">
                            <input class="" type="hidden" name="id" value="{{ $item->id }}">
                        </div>
                        <div class="col-2">
                            <button class="w-100 py-2 rounded-2 btn btn-primary mt-4" type="submit">Update</button>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </form>
    <h2 class="my-3 mb-3">Update Portfolio Section </h2>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $key => $item)
                <tr class="align-middle">
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        <div class="">
                            <img style="height: 80px" src="{{ url('assets/img/home/portfolio/' . $item->image_url) }}"
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>

                        <div class="d-flex gap-2 justify-content-center">
                            <form action="{{ route('deletePortfolio', [$item->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                                Edit
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('updatePortfolio', [$item->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update portfolio</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="p-3">
                                                <div class="">
                                                    <img style="height: 200px"
                                                        src="{{ url('assets/img/home/portfolio/' . $item->image_url) }}"
                                                        class="img-fluid img-thumbnail" alt="">
                                                </div>
                                                <input class="w-100 border my-1 form-control border-secondary"
                                                    type="file" name="update_img" id="">
                                                <input name="name"
                                                    class="w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" name="title" id=""
                                                    value="{{ $item->name }}">
                                                <select
                                                    class="form-select form-select-lg w-100 border-secondary-subtle my-1"
                                                    name="category" id="">
                                                    <option selected>Select one</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option @if ($category == $item->category) selected @endif>
                                                            {{ $category }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            {{-- <button type="button" class="">Save changes</button> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection

@extends('layouts.dashboard')
@section('title', 'Portfolio')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

    <li class="breadcrumb-item active">Portfolio</li>
@endsection
@section('dashboardMain')
    <!-- Button trigger modal -->
    <form action="{{ route('addCategory') }}" method="post">
        @csrf
        <div class="">
            <h5>Add Category</h5>
            <div class="">
                <div class="input-group mb-3">
                    <input name="category_name"
                        class="border-secondary-subtle input-text rounded px-3 form-control border-secondary" type="text"
                        placeholder="Category name here">
                    {{-- <button class=" btn btn-primary ">Add</button> --}}
                    <button type="submit" class="btn btn-primary" type="button">Add Category</button>
                </div>
            </div>
        </div>
    </form>
    <div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $item)
                    {{-- {{ $item->category_name }} --}}
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->category_name }}</td>
                        <td class="d-flex justify-content-center gap-3">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-gear"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="dropdown-item">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#updateCategoryModal{{ $item->id }}">Update category</button>
                                    </div>
                                    <div class="dropdown-item">
                                        <form action="{{ route('deleteCategory', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger show-confirm w-100">Delete</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            <form action="{{ route('updateCategory', $item->id) }}" method="post">
                                @method('put')
                                @csrf

                                {{-- Modal  --}}
                                <div class="modal fade" id="updateCategoryModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <label for="updateCategory" class="text-left mb-2">
                                                    Enter category name
                                                </label>
                                                <input id="updateCategory"
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" placeholder="Enter updated category name"
                                                    name="category_name" value="{{ $item->category_name }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown">
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="my-3 mb-3">Add Portfolio</h2>
    <!-- Button trigger modal -->
    <div class="text-center">
        <button type="button" id="addPortfolioBtn" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#addPortfolio">
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
                                <div id="preview-images">
                                </div>
                                <br>
                                <label class="mb-5" for="uploadImage" class="w-100 text-center mb-2">
                                    <i style="font-size:48px;" class="bi bi-upload w-100"></i><br>
                                    <span>Upload Product Images</span>
                                </label>
                                <input draggable="true" multiple placeholder="select image"
                                    class="d-none w-100 border my-1 form-control border-secondary" type="file"
                                    name="update_img[]" id="uploadImage">
                                <input type="hidden" name="image_url" value="0">
                                <input name="name"
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="text" placeholder="Portfolio title here" name="title" id="">
                                <input
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="text" placeholder="Project long title" name="project_title">
                                <input
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="text" placeholder="Project description" name="project_description">
                                <input
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="text" placeholder="Company name" name="client">
                                <input
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="date" placeholder="Project date" name="project_date">
                                <input
                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                    type="text" placeholder="Project link" name="project_url">
                                <select class="form-select form-select-lg w-100 border-secondary-subtle my-1"
                                    name="category" id="">
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $key => $category)
                                        <option>{{ $category->category_name }}</option>
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
                <th scope="col">Long Title</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Date</th>
                <th scope="col">Url</th>
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
                            <img style="height: 80px"
                                @if (count($item->images)) src="{{ url('assets/img/home/portfolio/' . $item->images[0]->image_url) }}" @endif
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->project_title }}</td>
                    <td class="text-justify" title="{{ $item->project_description }}">
                        {{ Str::limit($item->project_description, 80, '...') }} </td>
                    <td>{{ $item->client }}</td>
                    <td>{{ Carbon\Carbon::parse($item->project_date)->format('d M, Y') }}</td>
                    <td>{{ $item->project_url }}</td>
                    <td>{{ $item->category }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <div class="dropdown-menu d-2" aria-labelledby="dropdownMenu2">
                                <div class="dropdown-item">
                                    <form action="{{ route('deletePortfolio', [$item->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input class="btn btn-danger show-confirm w-100" type="submit" value="Delete">
                                    </form>
                                </div>
                                <div class="dropdown-item">
                                   <!-- Button trigger modal -->
                            <button onclick="previewDistroy({{ $item->id }})" id="updateImageBtn" type="button"
                                class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                                Edit
                            </button>
                                </div>
                            </div>
                          </div>

                        {{-- <div class="d-flex gap-2 justify-content-center">
                            <form action="{{ route('deletePortfolio', [$item->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger show-confirm" type="submit" value="Delete">
                            </form>
                            <!-- Button trigger modal -->
                            <button onclick="previewDistroy({{ $item->id }})" id="updateImageBtn" type="button"
                                class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                                Edit
                            </button>
                        </div> --}}
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
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
                                                <div id=" " class="row g-2 row-cols-4 mb-3">
                                                    @foreach ($item->images as $image)
                                                        <div id="imageCard{{ $image->id }}" class="col">
                                                            <div class="card border-2 border shadow-lg p-2 mb-0">
                                                                <img style="height: 120px; widows: 80px;"
                                                                    src="{{ url('assets/img/home/portfolio/' . $image->image_url) }}"
                                                                    class="img-fluid img-thumbnail" alt="">
                                                                <button onclick="deleteImage({{ $image->id }})"
                                                                    class="btn btn-danger mt-2">DELETE</button>
                                                                {{-- <a href="{{ route('deletePortfolioSingleImage', [$image->id]) }}"
                                                                    class="btn btn-danger mt-2 delete-confirm">DELETE</a> --}}
                                                                @if ($image->is_primary)
                                                                    <button disabled
                                                                        class="btn btn-success mt-2 show-confirm">primary</button>
                                                                @else
                                                                    <a href="{{ route('makeImagePrimary', [$image->id]) }}"
                                                                        class="btn btn-primary mt-2   ">Make Primary</a>
                                                                @endif
                                                                <div id="div{{ $image->id }}"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div id="preview-update-images{{ $item->id }}" class="mt-5">
                                                </div>
                                                <label class="mb-5" for="updateImage{{ $item->id }}"
                                                    class="w-100 text-center mb-2">
                                                    <i style="font-size:48px;" class="bi bi-upload w-100"></i><br>
                                                    <span>Upload Product Images</span>
                                                </label>
                                                <input onchange="previewPhotoUpdatePhoto({{ $item->id }})"
                                                    draggable="true" multiple placeholder="select image"
                                                    class="update_images w-100 border my-1 form-control border-secondary"
                                                    type="file" name="update_img{{ $item->id }}[]"
                                                    id="updateImage{{ $item->id }}">
                                                <input name="name"
                                                    class="w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" name="title" id=""
                                                    value="{{ $item->name }}">
                                                <input
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" placeholder="Project long title" name="project_title"
                                                    value="{{ $item->project_title }}">
                                                <input
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" placeholder="Project description"
                                                    name="project_description" value="{{ $item->project_description }}">
                                                <textarea class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    name="project_description" id="" cols="30" rows="10" placeholder="Project description">{{ $item->project_description }}</textarea>
                                                <input
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" placeholder="Company name" name="client"
                                                    value="{{ $item->client }}">
                                                <input
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="date" placeholder="Project date" name="project_date"
                                                    value="{{ $item->project_date }}">
                                                <input
                                                    class="mb-1 w-100 border-secondary-subtle input-text rounded px-3 form-control border-secondary"
                                                    type="text" placeholder="Project link" name="project_url"
                                                    value="{{ $item->project_url }}">
                                                <select
                                                    class="form-select form-select-lg w-100 border-secondary-subtle my-1"
                                                    name="category" id="">
                                                    <option selected>Select one</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option @if ($category->category_name == $item->category) selected @endif>
                                                            {{ $category->category_name }}</option>
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

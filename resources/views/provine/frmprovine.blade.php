<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- 
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link href="./css/navlayout.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"> --}}

        {{-- icon --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        {{-- bootstrap --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script> --}}
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        {{-- model --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <title>Provine</title>

    </head>

    <body>


        <body id="body-pd ">
            <div class="height-100 bg-light" id="bodyto">
                <div class="content m-2">
                    <div class="content m-3">
                        @if (session('success'))
                            <div class="alert mt-2 alert-success alert-dismissible fade show" role="alert"
                                id="alert">
                                <strong>Successfull!</strong> {{ session('success') }}
                            </div>
                        @elseif (count($errors) > 0)
                            <div class="alert mt-2 alert-danger alert-dismissible fade show" role="alert"
                                id="alert">
                                <strong>Failed!</strong> {{ $errors->first() }}
                            </div>
                        @elseif (session('delete'))
                            <div class="alert mt-2 alert-success alert-dismissible fade show" role="alert"
                                id="alert">
                                <strong>Successfull!</strong> {{ session('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif (session('update'))
                            <div class="alert mt-2 alert-success alert-dismissible fade show" role="alert"
                                id="alert">
                                <strong>Successfull!</strong> {{ session('update') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h3 class="text-secondary">Product</h3>
                        <div class="d-flex mt-3">
                            <button class="btn btn-warning rounded-pill m-1 text-success" data-bs-toggle="modal"
                                data-bs-target="#addModal"><i class=" fa fa-plus"></i> Register</button>
                        </div>
                        <div class="row cart shadow mb-3 rounded">
                            <div class="card-header py-3">
                                <h6 class="ml-4 font-weight-bold text-primary">List</h6>
                                <h6 class="ml-2 font-weight-bold text-secondary">pagination 10 item</h6>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-content-center">
                                        <th class="bg-secondary text-light">ល.រ</th>
                                        <th class="bg-secondary text-light">prvine Name</th>
                                        <th class="bg-secondary text-light">District Name</th>
                                        <th class="bg-secondary text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tblprovine as $provines)
                                        <tr>
                                            <td>{{ $provines->provine_id }}</td>
                                            <td>{{ $provines->provine_name }}</td>
                                            <td>
                                                <a href="/districte/{{ str_replace(' ','-',strtolower($provines->provine_name)) }}/{{ $provines->provine_id }}" class="btn btn-outline-secondary text-danger">ចុះឈ្មោះស្រុក</a>
                                              </td>
                                            <td>
                                                <button
                                                    class="btn btn-warning btn-sm btn-flat text-light pt-0 rounded-pill pr-3 pl-3  pb-0 bg-info text-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $provines->provine_id }}"> <i
                                                        class="fa fa-edit"></i>
                                                </button>
                                                <button
                                                    class="btn btn-danger btn-sm btn-flat pt-0 pr-3  rounded-pill pl-3 pb-0 bg-info text-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $provines->provine_id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        {{-- edit modal --}}

                                        {{-- <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h1 class="modal-title " id="exampleModalLabel">Insert Modal</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" enctype="multipart/form-data"
                                                            action="{{ route('updateproduct', $product->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <div class="modal-body text-dark bg-light">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="form-label">Product Name</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $product->names }}" required
                                                                                name="txtproname">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label">Category Name</label>
                                                                            <select name="txtcatname" class="form-control"
                                                                                id="" required>
                                                                                <option value="">---------Select
                                                                                    value-------</option>
                                                                                @foreach ($categories as $category)
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ $category->names }}
                                                                                    </option>
                                                                                @endforeach
        
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label"> Detail</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $product->detail }}"
                                                                                name="txtdetail">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label"> photo</label>
                                                                            <input type="file" class="form-control"
                                                                                 name="photo">
                                                                            <label for=""
                                                                                class="text-danger">រូបចាស់</label>
                                                                            <img src="photo/{{ $product->photo }}"
                                                                                alt="" width="50px" class="m-2">
                                                                            <input type="hidden"
                                                                                value="{{ $product->photo }}" name="photo2">
        
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="form-label"> price</label>
                                                                            <input type="number" class="form-control"
                                                                                value="{{ $product->price }}" required
                                                                                name="txtprice">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label"> discount</label>
                                                                            <input type="number" class="form-control"
                                                                                value="{{ $product->discount }}" required
                                                                                name="txtdiscount">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label">Day Warranty</label>
                                                                            <input type="number" class="form-control"
                                                                                value="{{ $product->day_warranty }}" required
                                                                                name="txtday">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-label"> Status</label>
                                                                            <input type="number" class="form-control"
                                                                                value="{{ $product->status }}" required
                                                                                name="txtstatus">
                                                                        </div>
                                                                    </div>
                                                                </div>
        
                                                            </div>
                                                            <div class="modal-footer mb-0 bg-light ">
                                                                <button type="button" class="btn btn-primary text-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        {{-- delete modal --}}
                                        {{-- <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Model
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body bg-secondary text-light">
                                                            <h4>Are you sure delete this <span
                                                                    class="text-danger">{{ $product->names }}</span>
                                                            </h4>
                                                            <p>Are you sure delete PHoto <img
                                                                    src="photo/{{ $product->photo }}" width="50px"
                                                                    alt=""></p>
                                                        </div>
                                                        <div class="modal-footer bg-danger">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ route('product_delete', $product->id) }}"
                                                                class="btn btn-warning">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- pagination --}}
                            {{-- <div class="d-flex justify-content-end">
                                    {!! $provine_id->links('pagination::bootstrap-5') !!}
                                </div> --}}
                        </div>

                    </div>
                    {{-- save  --}}
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-secondary" id="exampleModalLabel">Insert Product</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" enctype="multipart/form-data" action="">
                                    @csrf
                                    <div class="modal-body text-dark bg-light">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="form-label">Provine ID</label>
                                                    <input type="text" class="form-control" disabled
                                                        name="txt_proname">
                                                </div>

                                                <div class="form-group">
                                                    <label for="form-label">Provine Name</label>
                                                    <input type="text" class="form-control" required name="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer mb-0 bg-light ">
                                        <button type="button" class="btn btn-secondary text-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </body>

    </html>
</x-app-layout>

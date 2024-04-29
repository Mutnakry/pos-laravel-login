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
                                {{-- <a href="/products/save/{{ $catname }}/{{ $catid}}" class="btn btn-outline-primary">Add New</a> --}}
                        </div>
                        <div class="row cart shadow mb-3 rounded">
                            <div class="card-header">
                                <h3 class="alert alert-success text-center text-danger" role="alert">
                                <label for="" class="text-secondary"> ស្រុកប្រចាំខេត្ដ </label>  {{ ucwords(str_replace('-',' ',$catname)) }}
                                  </h3>
                                <h6 class="ml-2 font-weight-bold text-secondary">pagination 10 item</h6>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="bg-secondary text-light">ល.រ</th>
                                      
                                        <th class="bg-secondary text-light">ឈ្មោះស្រុក</th>
                                        <th class="bg-secondary text-light">ចូលទៅកាន់ឃុំ</th>
                                        <th class="bg-secondary text-light">village Name</th>
                                        <th class="bg-secondary text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbldistrict as $provines)
                                    <tr>
                                        <td>{{ $provines->district_id }}</td>
                                        <td>{{ $provines->district_name }}</td>
                                        
                                        <td>
                                            <a href="/provines/{{ str_replace(' ','-',strtolower($provines->district_name)) }}/{{ $provines->district_id }}" class="btn btn-outline-secondary">Products</a>
                                          </td>
                                      
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                       
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
                                                    <label for="form-label">ឈ្មោះខេត្ដ</label>
                                                    <input type="text" class="form-control" required name="">
                                                </div>
                                                <div class="m-2">
                                                    <label for="id_catname" class="label-control">Cat Name</label>
                                                    <select name="txt_catid" class="form-control" id="id_catname" required>
                                                        <option value="">--Select--</option>
                                                        @foreach ($tblprovine as $item)
                                                            {{-- @if($item->id_provine == $catid)
                                                                <option selected value="{{ $item->id_provine }}">{{ $item->cat_name }}</option>
                                                            @else
                                                                <option value="{{ $item->id_provine }}">{{ $item->cat_name }}</option>
                                                            @endif --}}
                                
                                                        @endforeach
                                
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Category Name</label>
                                                    <select name="txtcatname" class="form-control"
                                                        id="" required>
                                                       
                                                        @foreach ($tblprovine as $tblprovines)
                                                            <option value="{{ $tblprovines->provine_id }}">
                                                                {{-- {{ $tblprovines->provine_name }} --}}
                                                                  @if($tblprovines->provine_id == $catid)
                                                                      <option selected value="{{ $tblprovines->provine_id }}">{{ $tblprovines->provine_name }}</option>
                                                                  @else
                                                                      <option value="{{ $tblprovines->provine_id }}">{{ $tblprovines->provine_name }}</option>
                                                                   @endif
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="form-label">ឈ្មោះស្រុក</label>
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

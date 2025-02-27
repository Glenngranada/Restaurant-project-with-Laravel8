@extends('layout.sidebar')

@section('content')

    {{-- Categories list --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-title margin-bottom">
                                 <h3><i class="fas fa fa-edit"></i> Edit Menu</h3>
                            </div>
                            <div class="card-body">
                              <form action="{{route('Menu.update',$menu->id)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mb-3">
                                     <label for="title" class="col-md-2 col-sm-3 form-label">Title:</label>
                                     <input type="text"
                                            id="title"
                                            name="title"
                                            class="col form-control"
                                            value="{{$menu->title}}"
                                     >
                                </div>
                               <div class="row form-floating mb-3">
                                    <textarea class="form-control" name="description" id="floatingTextarea">{{$menu->description}}</textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                                <div class="row mb-3">
                                     <label for="price" class="col-md-2 col-sm-3 form-label">Pric </label>
                                    <div class="input-group ">
                                            <input type="text" class="form-control" name="pric" value="{{$menu->pric}}" id="price" aria-label="Dollar amount (with dot and two decimal places)">
                                             <span class="input-group-text">PHP</span>
                                    </div>
                                </div>
                                <div class="row input-group mb-3">
                                    <label for="old_price" class="col-md-2 col-sm-3 form-label">Old Price</label>
                                   <div class="input-group ">
                                        <input type="text" class="form-control" name="old_price" value="{{$menu->old_price}}" id="old_price" aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text">PHP</span>
                                    </div>

                                </div>
                                <div class="row input-group mb-3">
                                    <label for="inputGroupFile02" class="col-md-2 col-sm-3 form-label">Image</label>
                                    <div class="input-group ">
                                        <input type="file" class="form-control" name="image" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cats" class="col-md-2 col-sm-3 form-label">Category</label>
                                    <select class="form-select" name="categorie_id" aria-label="Default select example" id="cats">
                                        @foreach ($cats as $cat)
                                           <option value="{{$cat->id}}" {{$menu->categorie_id == $cat->id ? 'selected' : ''}} >{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="ROYALTY" value="0" id="flexRadioDefault1" {{$menu->ROYALTY === 0 ? 'checked' : ''  }} >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        IS NOT ROYALTY DISH
                                    </label>
                                    </div>
                                    <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="ROYALTY" value="1" id="flexRadioDefault2" {{$menu->ROYALTY === 1 ? 'checked' : ''  }} >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        IS ROYALTY DISH
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" value="Send" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection

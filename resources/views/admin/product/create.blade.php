@extends('layouts.main')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new product</h2>
        <div class="lead">
            Add new product.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-9">
                        @csrf

                        <div class="m-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name  }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('price'))
                                <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        @php $i = 0; @endphp
                        <ul class="nav nav-tabs m-3">
                            @foreach(config('app.locale_label') as $prefix => $each)
                                @php  $class = $i == 0 ? 'active show' : ''; $i++; @endphp

                                <li class="nav-item">
                                    <a class="nav-link {{ $class }}" href="#lang{{ $prefix }} " data-bs-toggle="tab"
                                       data-bs-target="#lang{{ $prefix }}">{{ $each  }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mb-3 mt-3">
                            <div class="tab-content">
                                @php $i = 0; @endphp
                                @foreach(config('app.locale_label') as $prefix => $each)
                                    @php  $class = $i == 0 ? 'active show' : ''; $i++; @endphp

                                    <div id="lang{{ $prefix }}" class="tab-pane container fade {{ $class }}">
                                        <label for="name" class="form-label">Name({{ $prefix }})</label>
                                        <input class="form-control" type="text" name="name[{{ $prefix }}]"
                                               placeholder="Name" value="{{ old('name.'.$prefix)  }}" required/>

                                        @if ($errors->has('name.'.$prefix))
                                            <span class="text-danger text-left">
                                                {{ $errors->first('name.'.$prefix) }}
                                            </span>
                                        @endif

                                        <label for="name" class="form-label">Description({{ $prefix }})</label>
                                        <textarea class="form-control" type="text" name="description[{{ $prefix }}]"
                                                  placeholder="Description"
                                                  rows="8"
                                                  required>{{ old('description.'.$prefix)  }}</textarea>

                                        @if ($errors->has('description.'.$prefix))
                                            <span class="text-danger text-left">
                                                {{ $errors->first('description.'.$prefix) }}
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="m-3">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}"/>

                            @if ($errors->has('price'))
                                <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <div class="m-3">
                            <label class="form-label">Images</label>
                            <input type="file" name="images[]" class="form-control" multiple/>

                            @if ($errors->has('images'))
                                <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                            @endif
                        </div>

                        <div class="m-3">
                            <button type="submit" class="btn btn-primary">Save product</button>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update category</h2>
        <div class="lead">
            Update category.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('admin.category.update', $category->id) }}"
                  enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="row">
                    <div class="col-9">
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
                                               placeholder="Name"
                                               value="{{ old('name.'.$prefix,$category->getTranslation('name', $prefix))  }}"
                                               required/>

                                        @if ($errors->has('name.'.$prefix))
                                            <span class="text-danger text-left">
                                                {{ $errors->first('name.'.$prefix) }}
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="m-3">

                            <input type="checkbox" name="is_active" class="form-check-input"
                                   value="{{ old('is_active',$category->is_active) }}"
                                   {{ $category->is_active ? 'checked': '' }} id="check">
                            <label class="form-check-label" for="check">Is active</label>

                            @if ($errors->has('is_active'))
                                <span class="text-danger text-left">{{ $errors->first('is_active') }}</span>
                            @endif
                        </div>


                        <div class="m-3">
                            <button type="submit" class="btn btn-primary">Save category</button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

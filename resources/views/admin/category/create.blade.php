@extends('layouts.main')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new category</h2>
        <div class="lead">
            Add new category.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="col-md-6">
                    @php $i = 0; @endphp
                    <ul class="nav nav-tabs">
                        @foreach(config('app.locale_label') as $prefix => $each)
                            @php  $class = $i == 0 ? 'active show' : ''; $i++; @endphp

                            <li class="nav-item">
                                <a class="nav-link {{ $class }}" href="#lang{{ $prefix }} " data-bs-toggle="tab"
                                   data-bs-target="#lang{{ $prefix }}">{{ $each  }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @php $i = 0; @endphp
                        @foreach(config('app.locale_label') as $prefix => $each)
                            @php  $class = $i == 0 ? 'active show' : ''; $i++; @endphp

                            <div id="lang{{ $prefix }}" class="tab-pane container fade {{ $class }}">
                                <div class="row gy-3 mt-3">
                                    <div class="col-9">
                                        <label for="name" class="form-label">Name({{ $prefix }})</label>
                                        <input class="form-control" type="text" name="name[{{ $prefix }}]"
                                               placeholder="Name" value="{{ old('name.'.$prefix)  }}" required/>

                                        @if ($errors->has('name.'.$prefix))
                                            <span class="text-danger text-left">
                                                {{ $errors->first('name.'.$prefix) }}
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3 mt-3 form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" value="0" id="check">
                    <label class="form-check-label" for="check">Is active</label>

                    @if ($errors->has('is_active'))
                        <span class="text-danger text-left">{{ $errors->first('is_active') }}</span>
                    @endif
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save category</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>

    </div>
@endsection

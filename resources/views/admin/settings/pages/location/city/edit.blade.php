@extends('admin.settings.setting-layout')
@section('title')
    {{ __('create_city') }}
@endsection
@section('website-settings')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('create_city') }}</h3>
                        <a href="{{ route('language.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('settings.location.update', $city->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Use PUT or PATCH method for updating -->
                            
                                <div class="form-group row">
                                    <x-forms.label name="state" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <select name="state_id" class="select2bs4 w-100 @error('state_id') is-invalid @enderror">
                                            <option value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option {{ old('state_id', $city->state_id) == $state->id ? 'selected' : '' }}
                                                    value="{{ $state->id }}">
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="city" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="city_name" value="{{ old('city_name', $city->name) }}"
                                            placeholder="Enter City Name" required>
                                    </div>
                                    @error('city_name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="latitude" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="lat"  value="{{ old('lat', $city->lat) }}" placeholder="Enter latitude " required> 
                                    </div>
                                    @error('lat') <span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="longitude" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="long" value="{{ old('long', $city->long) }}" placeholder="Enter longitude" required>  
                                    </div>
                                    @error('long') <span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;{{ __('update') }}</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <link rel="stylesheet"
        href="{{ asset('backend') }}/plugins/bootstrap-iconpicker/dist/css/bootstrap-iconpicker.min.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript"
        src="{{ asset('backend') }}/plugins/bootstrap-iconpicker/dist/js/bootstrap-iconpicker.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        $('#target').iconpicker({
            align: 'left', // Only in div tag
            arrowClass: 'btn-danger',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 15,
            footer: true,
            header: true,
            icon: 'flag-icon-gb',
            iconset: 'flagicon',
            labelHeader: '{0} of {1} pages',
            labelFooter: '{0} - {1} of {2} icons',
            placement: 'bottom', // Only in button tag
            rows: 5,
            search: true,
            searchText: 'Search',
            selectedClass: 'btn-success',
            unselectedClass: ''
        });

        $('#target').on('change', function(e) {
            $('#icon').val(e.icon)
        });
    </script>
@endsection

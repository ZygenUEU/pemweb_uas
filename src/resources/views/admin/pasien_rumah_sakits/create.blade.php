@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pasien_rumah_sakit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pasien_rumah_sakits.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="namapasien">{{ trans('cruds.pasien_rumah_sakit.fields.namapasien') }}</label>
                <input class="form-control {{ $errors->has('namapasien') ? 'is-invalid' : '' }}" type="text" name="namapasien" id="namapasien" value="{{ old('namapasien', '') }}" required>
                @if($errors->has('namapasien'))
                    <div class="invalid-feedback">
                        {{ $errors->first('namapasien') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pasien_rumah_sakit.fields.namapasien_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="penyakit">{{ trans('cruds.pasien_rumah_sakit.fields.penyakit') }}</label>
                <input class="form-control {{ $errors->has('penyakit') ? 'is-invalid' : '' }}" type="text" name="penyakit" id="penyakit" value="{{ old('penyakit', '') }}" required>
                @if($errors->has('penyakit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('penyakit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pasien_rumah_sakit.fields.penyakit_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="umur">{{ trans('cruds.pasien_rumah_sakit.fields.umur') }}</label>
                <input class="form-control {{ $errors->has('umur') ? 'is-invalid' : '' }}" type="text" name="umur" id="umur" value="{{ old('umur', '') }}" required>
                @if($errors->has('umur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('umur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pasien_rumah_sakit.fields.umur_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="kelamin">{{ trans('cruds.pasien_rumah_sakit.fields.kelamin') }}</label>
                <input class="form-control {{ $errors->has('kelamin') ? 'is-invalid' : '' }}" type="text" name="kelamin" id="kelamin" value="{{ old('kelamin', '') }}" required>
                @if($errors->has('kelamin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kelamin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pasien_rumah_sakit.fields.kelamin_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
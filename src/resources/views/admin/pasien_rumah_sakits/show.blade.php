@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pasien_rumah_sakit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pasien_rumah_sakits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pasien_rumah_sakit.fields.id') }}
                        </th>
                        <td>
                            {{ $pasien_rumah_sakit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pasien_rumah_sakit.fields.namapasien') }}
                        </th>
                        <td>
                            {{ $pasien_rumah_sakit->namapasien }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pasien_rumah_sakit.fields.penyakit') }}
                        </th>
                        <td>
                            {{ $pasien_rumah_sakit->penyakit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pasien_rumah_sakit.fields.umur') }}
                        </th>
                        <td>
                            {{ $pasien_rumah_sakit->umur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pasien_rumah_sakit.fields.kelamin') }}
                        </th>
                        <td>
                            {{ $pasien_rumah_sakit->kelamin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pasien_rumah_sakits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
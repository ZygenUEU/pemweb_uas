<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePasienRumahSakitRequest;
use App\Http\Requests\UpdatePasienRumahSakitRequest;
use App\Http\Resources\Admin\PasienRumahSakitResource;
use App\Models\PasienRumahSakit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasienRumahSakitApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pasien_rumah_sakit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PasienRumahSakitResource(PasienRumahSakit::all());
    }

    public function store(StorePasienRumahSakitRequest $request)
    {
        $pasien_rumah_sakit = PasienRumahSakit::create($request->all());

        return (new PasienRumahSakitResource($pasien_rumah_sakit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PasienRumahSakit $pasien_rumah_sakit)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PasienRumahSakitResource($pasien_rumah_sakit);
    }

    public function update(UpdatePasienRumahSakitRequest $request, PasienRumahSakit $pasien_rumah_sakit)
    {
        $pasien_rumah_sakit->update($request->all());

        return (new PasienRumahSakitResource($pasien_rumah_sakit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PasienRumahSakit $pasien_rumah_sakit)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pasien_rumah_sakit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

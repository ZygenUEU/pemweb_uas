<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPasienRumahSakitRequest;
use App\Http\Requests\StorePasienRumahSakitRequest;
use App\Http\Requests\UpdatePasienRumahSakitRequest;
use App\Models\PasienRumahSakit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PasienRumahSakitController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PasienRumahSakit::query()->select(sprintf('%s.*', (new PasienRumahSakit)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pasien_rumah_sakit_show';
                $editGate      = 'pasien_rumah_sakit_edit';
                $deleteGate    = 'pasien_rumah_sakit_delete';
                $crudRoutePart = 'pasien_rumah_sakits';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('namapasien', function ($row) {
                return $row->namapasien ? $row->namapasien : '';
            });
            $table->editColumn('penyakit', function ($row) {
                return $row->penyakit ? $row->penyakit : '';
            });
            $table->editColumn('umur', function ($row) {
                return $row->umur ? $row->umur : '';
            });
            $table->editColumn('kelamin', function ($row) {
                return $row->kelamin ? $row->kelamin : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.pasien_rumah_sakits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pasien_rumah_sakit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pasien_rumah_sakits.create');
    }

    public function store(StorePasienRumahSakitRequest $request)
    {
        $pasien_rumah_sakit = PasienRumahSakit::create($request->all());

        return redirect()->route('admin.pasien_rumah_sakits.index');
    }

    public function edit(PasienRumahSakit $pasien_rumah_sakit)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pasien_rumah_sakits.edit', compact('pasien_rumah_sakit'));
    }

    public function update(UpdatePasienRumahSakitRequest $request, PasienRumahSakit $pasien_rumah_sakit)
    {
        $pasien_rumah_sakit->update($request->all());

        return redirect()->route('admin.pasien_rumah_sakits.index');
    }

    public function show(PasienRumahSakit $pasien_rumah_sakit)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pasien_rumah_sakits.show', compact('pasien_rumah_sakit'));
    }

    public function destroy(PasienRumahSakit $pasien_rumah_sakit)
    {
        abort_if(Gate::denies('pasien_rumah_sakit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pasien_rumah_sakit->delete();

        return back();
    }

    public function massDestroy(MassDestroyPasienRumahSakitRequest $request)
    {
        $pasien_rumah_sakits = PasienRumahSakit::find(request('ids'));

        foreach ($pasien_rumah_sakits as $pasien_rumah_sakit) {
            $pasien_rumah_sakit->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function indexAPI(){
        return PasienRumahSakit::all();
    }
    public function storeAPI(Request $request){
        $request->validate([
            'namapasien' => 'required',
            'penyakit' => 'required',
            'umur' => 'required',
            'kelamin' => 'required'
        ]);
        return PasienRumahSakit::create($request->all());
    }
    public function showAPI($id){
        return PasienRumahSakit::find($id);
    }
    public function updateAPI(Request $request, $id){
        $pasien_rumah_sakit = PasienRumahSakit::find($id);
        $pasien_rumah_sakit->update($request->all());
        return $pasien_rumah_sakit;
    }
    public function destroyAPI($id){
        return PasienRumahSakit::destroy($id);
    }
    public function searchAPI($namapasien){
        return PasienRumahSakit::where('namapasien', 'like', '%'.$namapasien.'%')->get();
    }
}

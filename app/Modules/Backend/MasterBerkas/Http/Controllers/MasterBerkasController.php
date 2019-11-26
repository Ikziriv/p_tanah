<?php

namespace App\Modules\Backend\MasterBerkas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\MasterBerkas\MasterBerkas;
use App\Modules\Backend\MasterBerkas\MasterBerkasDetail;
use App\Modules\Backend\HistoryBerkas\HistoryBerkas;
use Carbon\Carbon;
use Validator;
use Response;
use Auth;
use DB;

class MasterBerkasController extends Controller
{
    protected $rules =
    [
        'nama' => 'required'
    ];

	public function index(Request $request)
	{
        $berkas =  MasterBerkas::orderBy('tgl_ubah', 'desc')->get();
        $h_berkas =  HistoryBerkas::orderBy('created_at', 'desc')->get();
		return view('.pages.masterberkas.masterberkas-list', compact('berkas', 'h_berkas'));
	}

    public function create()
    {
        return view('.pages.masterberkas.masterberkas-create');
    }

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
	        $berkas = MasterBerkas::all()->last();
	        if($berkas == null) {
	            $init = 'BKS'; $val = '1001';
	            $sku_code = $init.$val;
	        } else {
	            $key= $berkas->kode;
	            $pattern = "/(\d+)/";
	            $array = preg_split($pattern, $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	            $inisial = $array[0];
	            $code = $array[1] += 1;
	            $sku_code = $inisial.$code;
	        }
            $berkas = new MasterBerkas();
            $berkas->kode = $sku_code;
            $berkas->nomor = $request->nomor;
            $berkas->nama = $request->nama;
            $berkas->tmpt_tgl = $request->tmpt_tgl;
            $berkas->tgl = $request->tgl;
            $berkas->tmpt = $request->tmpt;
            $berkas->nama_relasi = $request->nama_relasi;
            $berkas->jml_anak = $request->jml_anak;
            $berkas->jml_sdr = $request->jml_sdr;
            $berkas->tgl_ubah = Carbon::now();

            $nomor_berkas = $request->nomor;
            $nama_hub = $request->nama_hub;
            $tgl_umur = $request->tgl_umur;
            $hubungan = $request->hubungan;
            $alamat = $request->alamat;
            for($count = 0; $count < count($nama_hub); $count++)
            {
            $data = array(
            'nomor_berkas' => $nomor_berkas,
            'nama_hub' => $nama_hub[$count],
            'tgl_umur' => $tgl_umur[$count],
            'hubungan' => $hubungan[$count],
            'alamat'  => $alamat[$count]
            );
            $insert_data[] = $data; 
            }
            // dd($insert_data);
            $h_berkas = new HistoryBerkas();
            $h_berkas->user_id = Auth::user()->id;
            $h_berkas->deskripsi = 'Telah Menambahkan Berkas';
            $h_berkas->nomor_berkas = $nomor_berkas;
            // SAVE
            $berkas->save();
            MasterBerkasDetail::insert($insert_data);
            $h_berkas->save();

            return response()->json($berkas);
        }
	}

    public function edit($id)
    {
        $berkas = MasterBerkas::findOrFail($id);
        $berkas_d = MasterBerkasDetail::where('nomor_berkas', $berkas->nomor)->get();
        return view('.pages.masterberkas.masterberkas-edit', compact('berkas', 'berkas_d'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $berkas = MasterBerkas::findOrFail($id);
            if ($request->file('logo_surat') === null) {
                $path = 'NULL';
            } else {
                $fileExtension = $request->file('logo_surat')->getClientOriginalExtension();
                $fileName = bin2hex(openssl_random_pseudo_bytes(7)) . '.' . $fileExtension;
                $request->file('logo_surat')
                        ->move(base_path() . '/public/images/berkas/', $fileName);
                $path = '/images/berkas/' . $fileName;
                $berkas->logo_surat = $path;
            }
            $berkas->logo_surat = $path;
            $berkas->kode = $request->kode;
            $berkas->nomor = $request->nomor;
            $berkas->nama = $request->nama;
            $berkas->tmpt_tgl = $request->tmpt_tgl;
            $berkas->tgl = $request->tgl;
            $berkas->tmpt = $request->tmpt;
            $berkas->nama_relasi = $request->nama_relasi;
            $berkas->jml_anak = $request->jml_anak;
            $berkas->jml_sdr = $request->jml_sdr;
            $berkas->tgl_ubah = Carbon::now();

            $nomor_berkas = $berkas->nomor;
            $nama_hub = $request->nama_hub;
            $tgl_umur = $request->tgl_umur;
            $hubungan = $request->hubungan;
            $alamat = $request->alamat;
            for($count = 0; $count < count($nama_hub); $count++)
            {
            $data = array(
            'nomor_berkas' => $nomor_berkas[$count],
            'nama_hub' => $nama_hub[$count],
            'tgl_umur' => $tgl_umur[$count],
            'hubungan' => $hubungan[$count],
            'alamat'  => $alamat[$count]
            );
            $insert_data[] = $data; 
            }
            // dd($insert_data);
            $h_berkas = HistoryBerkas::findOrFail($berkas->nomor);
            $h_berkas->user_id = Auth::user()->id;
            $h_berkas->deskripsi = 'Telah Mengubah Berkas';
            $h_berkas->nomor_berkas = $berkas->nomor;
            // SAVE
            $berkas->save();
            MasterBerkasDetail::insert($insert_data);
            $h_berkas->save();

            return response()->json($berkas);
        }

    }

    public function show($id)
    {
        $berkas = MasterBerkas::findOrFail($id);
        $berkas_d = MasterBerkasDetail::where('nomor_berkas', $berkas->nomor)->get();
        // $url = $berkas->link;
        return view('.pages.masterberkas.masterberkas-show', compact('berkas', 'berkas_d'));
    }

    public function show_print($id)
    {
        $berkas = MasterBerkas::findOrFail($id);
        $berkas_d = MasterBerkasDetail::where('nomor_berkas', $berkas->nomor)->get();
        return view('.pages.masterberkas.masterberkas-print', compact('berkas', 'berkas_d'));
    }

    public function destroy($id)
    {
        $berkas = MasterBerkas::findOrFail($id);
        MasterBerkasDetail::where('nomor_berkas', $berkas->nomor)->delete();
        $h_berkas = new HistoryBerkas();
        $h_berkas->user_id = Auth::user()->id;
        $h_berkas->deskripsi = 'Telah Menghapus Berkas';
        $h_berkas->nomor_berkas = $berkas->nomor;
        // SAVE
        $h_berkas->save();
        // HistoryBerkas::where('nomor_berkas', $berkas->nomor)->delete();
        $berkas->delete();
        return redirect()->route('master-berkas-index');
        // return response()->json($berkas);
    }
}

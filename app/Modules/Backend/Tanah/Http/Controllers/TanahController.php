<?php

namespace App\Modules\Backend\Tanah\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Tanah\Tanah;
use App\Modules\Backend\Tanah\HistoryTanah;
use App\Modules\Backend\Tanah\Images;
use App\Modules\Backend\Desa\Desa;
use App\Modules\Backend\Blok\Blok;
use App\Modules\Backend\Status\Status;
use App\Modules\Backend\HargaTanah\HargaTanah;
use App\Modules\Backend\BayarTanah\BayarTanah;
use Carbon\Carbon;
use Validator;
use Response;
use Storage;
use File;
use Auth;
use DB;

class TanahController extends Controller
{
    protected $rules =
    [
        'nama' => 'required',
        'sppt' => 'required',
        'gps' => 'required',
        'luas_terbayar' => 'required',
        'desa_id' => 'required',
        'blok_id' => 'required',
        'sppt_id' => 'required',
        'nomer_sph' => 'required',
        'tgl_sph' => 'required',
        'stat_id' => 'required',
        'notes' => 'required'
    ];

	public function index(Request $request)
	{
        $tanah = Tanah::orderBy('id', 'asc')->get();
        $h_tanah =  HistoryTanah::orderBy('created_at', 'desc')->get();
		return view('.pages.tanah.tanah-list', compact('tanah', 'h_tanah'));
	}

	public function create_tanah()
	{
        $penjual = DB::table('penjuals')->select('id', 'nama', 'ktp')->get();
		$desa = DB::table('desas')->select('id', 'nama')->get();
		$blok = DB::table('bloks')->select('id', 'kode')->get(); 
		$sppt = DB::table('kode_sppts')->select('id', 'kode')->get(); 
		$status = DB::table('statuses')->select('id', 'nama')->get();
        // $status = DB::table('statuses')->where('id', '=', 2)->orWhere('is_active', true)->first();
        // dd($status);
		return view('.pages.tanah.tanah-insert', compact('penjual', 'desa', 'blok', 'sppt', 'status'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            // Get From Form
            $luas_terbayar = $request->get('luas_terbayar');
            $stat_id = $request->get('stat_id');
            $nomer_bpn = $request->get('nomer_bpn');
            // Get From Database
            $get_harga = HargaTanah::where('is_active', true)->first();
            $get_stat = Status::where('id', $stat_id)->first();
            if($nomer_bpn == NULL && $get_stat->id == 2){
                $tanah = new Tanah();
                // $tanah->stat_id = 2;
                $h_tanah = new HistoryTanah();
                $h_tanah->user_id = Auth::user()->id;
                $h_tanah->deskripsi = 'Telah Menambahkan Tanah';
                $h_tanah->tanah_id = $tanah;
                $h_tanah->save();

                $tanah->fill($request->all());
                $tanah->save(); 

                $bayar = $get_harga->harga * $luas_terbayar * ($get_stat->precent / 100);
                $blm_bayar = $get_harga->harga * $luas_terbayar * (20 / 100);
                $bayar_tanah = new BayarTanah();
                $bayar_tanah->tanah_id = $tanah->id;
                $bayar_tanah->rp_terbayar = $bayar;
                $bayar_tanah->rp_blm_terbayar = $blm_bayar;
                $bayar_tanah->tgl_pembuatan = Carbon::now();
                $bayar_tanah->save();

                return response()->json($tanah);
            } 
            if($nomer_bpn && $get_stat->id == 1){
                $tanah = new Tanah();
                // $tanah->stat_id = 2;
                $h_tanah = new HistoryTanah();
                $h_tanah->user_id = Auth::user()->id;
                $h_tanah->deskripsi = 'Telah Menambahkan Tanah';
                $h_tanah->tanah_id = $tanah;
                $h_tanah->save();
                // $tanah->stat_id = 2;
                $tanah->fill($request->all());
                $tanah->save(); 

                $bayar = $get_harga->harga * $luas_terbayar * ($get_stat->precent / 100);
                $blm_bayar = 0;
                $bayar_tanah = new BayarTanah();
                $bayar_tanah->tanah_id = $tanah->id;
                $bayar_tanah->rp_terbayar = $bayar;
                $bayar_tanah->rp_blm_terbayar = $blm_bayar;
                $bayar_tanah->tgl_pembuatan = Carbon::now();
                $bayar_tanah->save();

                return response()->json($tanah);
            } 
            // else {
            //     return response()->json(['Status' => 'Check Status Kembali']);
            // }
        }
	}

	public function show($id)
	{
        $data['data'] = Tanah::findOrFail($id);
        $data['bayar'] = BayarTanah::where('tanah_id', $data['data']->id)->get();
		return view('.pages.tanah.tanah-show', $data);
	}

    public function show_cetak($id)
    {
        $data['data'] = Tanah::findOrFail($id);
        return view('.pages.tanah.tanah-cetak', $data);
    }

    public function edit($id)
    {
        $data['data'] = Tanah::findOrFail($id);
        $data['penjual'] = DB::table('penjuals')->select('id', 'ktp', 'nama')->get();
        $data['desa'] = DB::table('desas')->select('id', 'nama')->get();
        $data['blok'] = DB::table('bloks')->select('id', 'kode')->get(); 
        $data['sppt'] = DB::table('kode_sppts')->select('id', 'kode')->get(); 
        $data['status'] = DB::table('statuses')->select('id', 'nama')->get();
        return view('.pages.tanah.tanah-edit', $data);
    }

    public function update_data(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $tanah = Tanah::findOrFail($id);
            $h_tanah = new HistoryTanah();
            $h_tanah->user_id = Auth::user()->id;
            $h_tanah->deskripsi = 'Telah Mengubah Tanah';
            $h_tanah->tanah_id = $tanah->id;
            $h_tanah->save();

            $tanah->fill($request->all());
            $tanah->save();
            // dd($tanah);
            return response()->json($tanah);
        }
    }

    public function edit_doc($id)
    {
        $data['data'] = Tanah::findOrFail($id);
        return view('.pages.tanah.tanah-edit-doc', $data);
    }

    public function update_doc(Request $request, $id)
    {
        $tanah = Tanah::findOrFail($id);
        $h_tanah = new HistoryTanah();
        $h_tanah->user_id = Auth::user()->id;
        $h_tanah->deskripsi = 'Telah Mengubah Doc Tanah';
        $h_tanah->tanah_id = $tanah->id;
        $h_tanah->save();

        $tanah->fill($request->all());
        $tanah->save();
        // dd($tanah);
        return response()->json($tanah);
    }

    public function destroy($id)
    {
        $tanah = Tanah::findOrFail($id);
        $h_tanah = new HistoryTanah();
        $h_tanah->user_id = Auth::user()->id;
        $h_tanah->deskripsi = 'Telah Menghapus Tanah';
        $h_tanah->tanah_id = $tanah->id;
        $h_tanah->save();

        $tanah->delete();

        return response()->json($tanah);
    }
    // Berkas Tanah 
    public function show_berkas($id)
    {
        $data['data'] = Tanah::findOrFail($id);
        return view('.pages.tanah.tanah-unggah', $data);
    }

    public function berkas_images(Request $request, $id) 
    {
        $tanah = Tanah::findOrFail($id);

        $image = $request->file('file');
        if($image){
            $name = time().$image->getClientOriginalname();
            $image->move(base_path() . '/public/backend/image_berkas', $name);
            $path = "/backend/image_berkas/".$name;
            $tanah->images()->create(['image_path' => $path]);
        }
        return 'Done';
    }

    public function edit_foto_berkas($id) 
    {
        $data['data'] = Images::findOrFail($id);
        return view('.pages.tanah.tanah-edit-foto-berkas', $data);
    }

    public function update_foto_berkas(Request $request, $id)
    {
        $berkas = Images::findOrFail($id);

        $berkas->fill($request->all());
        $berkas->save();
        // dd($tanah);
        return response()->json($berkas);
    }

    public function destroy_images($id)
    {
        $berkas_foto = Images::findOrFail($id);

        $foto_berkas = $berkas_foto->pluck('image_path')->toArray();

        $berkas_foto->delete();
        \File::delete($foto_berkas);

        return response()->json($berkas_foto);
    }
}

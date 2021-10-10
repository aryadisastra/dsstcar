<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Penyewaan;
use App\Models\MobilAttachment;
use App\Models\PenyewaanAttachment;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function show($id)
    {
        $data = MobilAttachment::where('id_mobil',$id)->get();
        $data_mobil = Mobil::where('id_mobil',$id)->first();
        return view('detail',
        [
            'data' => $data,
            'data_mobil' => $data_mobil
        ]);
    }

    public function sewa(Request $request, $id)
    {
        $data = Mobil::where('id_mobil', $id)->first();
        return view('sewa',
        [
            'data' => $data
        ]
        );
    }
    public function succes()
    {
        return view('succes');
    }

    public function store(Request $request)
    {
        $rules =[
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'sewa' => 'required',
            'nama_rek' => 'required',
            'no_rek' => 'required',
        ];

        $messages =  [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'alamat.required' => 'Alamat Tidak Boleh Kosong',
            'sewa.required' => 'Sewa Tidak Boleh Kosong',
            'nama_rek.required' => 'Nama Rekening Tidak Boleh Kosong',
            'no_rek.required' => 'Nomor Rekening Tidak Boleh Kosong',
        ];
        $this->validate($request, $rules, $messages);

        try{
            
            $harga = intval($request->harga_mobil);
            $lama = intval($request->sewa);
            DB::beginTransaction();
            $req = new Penyewaan();
            $req->kode_penyewaan = $req->getReqCode();
            $req->tanggal_penyewaan = now();
            $req->jangka_waktu = $request->sewa;
            $req->nama_customer = $request->nama;
            $req->email_customer = $request->email;
            $req->alamat_customer = $request->alamat;
            $req->nama_rek = $request->nama_rek;
            $req->no_rek = $request->no_rek;
            $req->id_mobil = $request->id_mobil;
            $req->total = $harga*$lama;
            $req->status = 1;
            $req->rec_creator = 'Customer';
            $req->rec_editor = 'Customer';
            $req->save();

            $files = $request->file('attachments');
                if($request->hasFile('attachments')){
                    foreach ($files as $file) {
                        $filename = $file->getClientOriginalName();
                        $imageExt =  $file->getClientOriginalExtension();
                        $newAttachments = new PenyewaanAttachment();
                        $file_name_convert = $newAttachments->generateNameImages();
                        $images_true = $file_name_convert.'.'.$imageExt;

                        $custom_env = new \App\Http\Controllers\CustomEnvController();
                        $pushCustomEnv = $custom_env->moveReqImage($file, $images_true);

                        if($pushCustomEnv !== false) {
                            $newAttachments->id_penyewaan = $req->id_penyewaan;
                            $newAttachments->nama_file = $images_true;
                            $newAttachments->save();
                        }
                    }
                }
                DB::commit();
                return redirect('/succes');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect('/sewa/'.$request->id_mobil);
        }
    }
}

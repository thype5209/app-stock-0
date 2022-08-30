<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageJenis extends Component
{
    public $nama_jenis, $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $jenis = Jenis::all();
        return view('livewire.admin.page-jenis', compact('jenis'));
    }

    // Modal
    public function addModal(){
        // Alert::info('Info Title', 'Info Message');
        $this->itemAdd = true;
    }
    public function editModal($id){
        $satuan = Jenis::find($id);
        // dd($satuan);
        $this->nama_jenis = $satuan->nama_jenis;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $satuan = Jenis::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create(){
        Jenis::create([
            'nama_jenis' => $this->nama_jenis,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');

    }
    public function edit($id){
        Jenis::where('id', $id)->update([
            'nama_jenis' => $this->nama_jenis,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');

    }
    public function delete($id){
        Jenis::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');

    }
}

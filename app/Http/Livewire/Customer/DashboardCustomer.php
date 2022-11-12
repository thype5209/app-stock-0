<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\StokProduk;
use App\Models\PesananUser;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardCustomer extends Component
{
    public function render()
    {
        $stokProduk = StokProduk::orderBy('id','desc')->latest()->first();
        $jumlah_pembelian = PesananUser::where('user_id', Auth::user()->id)->sum('sub_total');
        return view('livewire.customer.dashboard-customer',[
            'stok_produk'=> $stokProduk,
            'pembelian'=> $jumlah_pembelian,
        ])
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
}

<?php

namespace App\Http\Controllers\Admin\more;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function index(){
        $invoices= Invoice::latest()->get();
        return view('admin.more.invoice.index', compact('invoices'));
    }

    // public function format(Request $req){
    //     Invoice::delete();

    //     Alert::success('Berhasil Format Invoice', 'Semua data invoice telah terhapus');
    //     return back();
    // }
}

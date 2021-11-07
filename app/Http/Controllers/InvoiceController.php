<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function __invoke(Request $request){
        $invoice= 'INV/'.date('Ymd', time()).'-'.\Str::random(5);
        $fileName= "CAMERA_".time().'.jpg';
        $request->file('proof')->storeAs('public/proof', $fileName,);
        Invoice::create([
            'proof' => $fileName,
            'invoice' => $invoice,
            'user_id' => auth()->user()->id,
            'bank_name' => $request->bank_name,
            'from' => $request->from,
            'to' => $request->to,
            'access_type' => $request->paket,
            'sent_at' => $request->address,
        ]);

        Alert::toast('Invoice anda berhasil dikirim', 'success');
        return back();
    }
}

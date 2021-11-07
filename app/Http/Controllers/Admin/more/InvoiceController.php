<?php

namespace App\Http\Controllers\Admin\more;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoices= Invoice::latest()->get();
        return view('admin.more.invoice.index', compact('invoices'));
    }
}

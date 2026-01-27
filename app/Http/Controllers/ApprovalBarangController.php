<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalBarangController extends Controller
{
    public function index() {
        return view ('approval.approvalbarang');
    }
}

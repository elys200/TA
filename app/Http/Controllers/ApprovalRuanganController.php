<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalRuanganController extends Controller
{
    public function index() {
        return view ('approval.approvalruangan');
    }
}

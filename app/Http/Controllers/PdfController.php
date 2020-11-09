<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rent_confirmation;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function view(Request $Request)
    {
        $data = rent_confirmation::where('id',$Request->rent_confirmation_id)->first();
        // return view('agreement',['confirmed'=>$data]);
        $pdf = PDF::loadView('agreement', ['confirmed'=>$data]);
        return $pdf->stream();
        return $pdf->download('agreement'.$data->flat_no.','.$data->flat_name.','.$data->address.','.$data->zone.','.$data->district.'.pdf');
    }
}

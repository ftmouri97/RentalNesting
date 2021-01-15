<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rent_confirmation;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function view(Request $Request)
    {
        $date = date('d-m-Y');
        $data = rent_confirmation::where('id',$Request->rent_confirmation_id)->first();
        // return view('agreement',['confirmed'=>$data]);
        $data['contract_end'] = date('Y-m-d H:i:s', strtotime('+1 years', strtotime($data->created_at)));
        $data['total'] = $data->advance_payment+$data->apartment->apartment_rent;
        $data['date'] = $date;
        $pdf = PDF::loadView('agreement2',['confirmed'=>$data]);
        return $pdf->stream();
        return $pdf->download('agreement.pdf');
    }
}

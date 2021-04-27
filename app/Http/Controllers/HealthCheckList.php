<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmployeeInfo;
use App\Models\HealthDeclaration;

use Response;
use PDF;

class HealthCheckList extends Controller
{
    //

    public function reportBydate(){

        $checklist  =   HealthDeclaration::distinct()->orderBy('txndate', 'desc')->get(['txndate']);

        return view('health_report.reportPerdate')->with('checklist', $checklist);
    }

    public function perDate($txndate){

        $health =   HealthDeclaration::where('txndate', $txndate)->get();

        $lists  =   [];
        $x      =   0;

        foreach($health as $heal){
            $emp    =   EmployeeInfo::where('empno', $heal->empno)->first();

            $lists[$x]['empno']     =  $heal->empno;
            $lists[$x]['name']      =  $emp->fname . ' ' . $emp->lname;
            $lists[$x]['txndate']   =  $heal->txndate;
            $lists[$x]['txntime']   =  date('H:i A', strtotime($heal->txntime));
            // $lists[$x]['health_declaration']    =   $heal->health_declaration;

            $lists[$x]['url']       =   '/'. $heal->empno . '/' . $heal->txndate;

            $x++;
        }

        return Response::json($lists);
    }

    // PDF
    public function printPDF($empno, $txndate){

        $health_declaration =   HealthDeclaration::where('empno', $empno)
                                                ->where('txndate', $txndate)
                                                ->first()->health_declaration;

        $details    =   json_decode($health_declaration, true);
        // dd($details);

        $pdf = PDF::loadView('health_report.report_pdf', compact('details'))->setPaper('a4', 'landscape');
        return $pdf->stream('HC.pdf');
        // return view('health_report.report_pdf')->with('details', $details);
    }

}

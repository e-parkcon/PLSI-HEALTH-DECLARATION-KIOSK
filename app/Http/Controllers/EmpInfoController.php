<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmployeeInfo;
use App\Models\Company;

use App\Models\HealthDeclaration;

use Response;

class EmpInfoController extends Controller
{
    //

    public function qrCode_info(Request $request){
        $empno  =   hex2bin($request->qr_code);

        $emp_info   =   EmployeeInfo::where('empno', $empno)->first();
        $entity01   =   $this->company($emp_info->entity01);
 
        $info   =   array(
                        'empno'         =>  $emp_info->empno,
                        'name'          =>  $emp_info->fname . ' ' . $emp_info->lname,
                        'sex'           =>  $emp_info->sex,
                        'birthdate'     =>  $emp_info->birth_date,
                        'company'       =>  $entity01->entity01_desc,
                        'comp_address'  =>  $entity01->entity01_address
                    );

        return Response::json($info);
    }
 
    public function health_declaration(Request $request){

        $temperature    =   $request->temperature;
        $empno          =   $request->empno;
        $name           =   $request->name;
        $sex            =   $request->sex;
        $age            =   $request->age;
        $residency      =   $request->residency;
        $phone          =   $request->phone;
        $natureOfV      =   $request->natureOfV;
        $company        =   $request->company;
        $company_add    =   $request->company_add;
        $q1_a           =   $request->q1_a;
        $q1_b           =   $request->q1_b;
        $q1_c           =   $request->q1_c;
        $q1_d           =   $request->q1_d;
        $q2             =   $request->q2;
        $q3             =   $request->q3;
        $q4             =   $request->q4;
        $q5             =   $request->q5;
        $ncrPlace       =   $request->ncrPlace;

        $declaration    =   array(
                                'temperature'   =>  $temperature,
                                'empno'         =>  $empno, 
                                'name'          =>  $name,
                                'sex'           =>  $sex,   
                                'age'           =>  $age,
                                'residency'     =>  $residency, 
                                'phone'         =>  $phone,
                                'nature_of_visit'   =>  $natureOfV, 
                                'company'       =>  $company,   
                                'company_add'   =>  $company_add,
                                'q1_a'          =>  $q1_a,
                                'q1_b'          =>  $q1_b,
                                'q1_c'          =>  $q1_c,
                                'q1_d'          =>  $q1_d,
                                'q2'            =>  $q2,
                                'q3'            =>  $q3,
                                'q4'            =>  $q4,
                                'q5'            =>  $q5, 
                                'other_place'   =>  $ncrPlace,
                                'txndate'       =>  date('Y-m-d')
                            );

        HealthDeclaration::create([
            'empno'     =>  $empno,
            'txndate'   =>  date('Y-m-d'), 
            'txntime'   =>  date('H:i:s'),
            'health_declaration'    =>  json_encode($declaration, JSON_FORCE_OBJECT)
        ]);

        return Response::json('ok');
    }

    private function company($entity01){

        return Company::where('entity01', $entity01)->first();
    }

    public function test(){
        return 'test';
    }
}

@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mt-5">
            <label for="qr_code"><h1>SCAN YOUR QR CODE</h1></label>
        </div>
        <div class="col-sm-6 col-md-3">
            <form action="" id="qr_form">
                <input type="password" class="form-control text-center" name="qr_code" id="qr_code" autofocus autocomplete="off">
            </form>
        </div>
    </div>
</div>


<script>

function enableTextbox(){
    var q5 = $('input[name="q5"]:checked').val();

    if(q5 == "Y"){
        $('#ncrPlace').attr('disabled', false);
    }
    else{
        $('#ncrPlace').attr('disabled', true);
    }
}

function natureOfvisit(){
    var natureOfV = $('input[name="nOv"]:checked').val();

    if(natureOfV == 'Personal'){
        $('#company').attr('disabled', true);
        $('#company_add').attr('disabled', true);
    }
    else{
        $('#company').attr('disabled', false);
        $('#company_add').attr('disabled', false);
    }
}

$("#qr_form").on("submit", function(e) {
    e.preventDefault();
    var qr_code =   $('#qr_code').val();
    
    parsed_qr   =   JSON.parse(qr_code);

    var natureOfvisit   =   parsed_qr.nature_of_visit;
    var question1_a     =   parsed_qr.q1_a;
    var question1_b     =   parsed_qr.q1_b;
    var question1_c     =   parsed_qr.q1_c;
    var question1_d     =   parsed_qr.q1_d;
    var question2       =   parsed_qr.q2;
    var question3       =   parsed_qr.q3;
    var question4       =   parsed_qr.q4;
    var question5       =   parsed_qr.q5;
    // console.log(natureOfvisit, question1_a, question1_b, question1_c, question1_d, question1_d, question2, question3, question4, question5);

    var radio_natureOfvisit =   '';
    if(natureOfvisit == "Official"){
        radio_natureOfvisit =   '<div class="col-xs-2 col-sm-2 col-md-2">'+
                                    '<input type="radio" class="icheck-primary d-inline natureV1" name="nOv" id="natureV1" checked value="Official" onclick="natureOfvisit()"> <label for="natureV1"><small>Official</small></label>'+
                                '</div>'+
                                '<div class="col-xs-2 col-sm-2 col-md-2">'+
                                    '<input type="radio" class="icheck-primary d-inline natureV1" name="nOv" id="natureV2" value="Personal" onclick="natureOfvisit()"> <label for="natureV2"><small>Personal</small></label>'+
                                '</div>';
    }else{
        radio_natureOfvisit =   '<div class="col-xs-2 col-sm-2 col-md-2">'+
                                    '<input type="radio" class="icheck-primary d-inline natureV1" name="nOv" id="natureV1" value="Official" onclick="natureOfvisit()"> <label for="natureV1"><small>Official</small></label>'+
                                '</div>'+
                                '<div class="col-xs-2 col-sm-2 col-md-2">'+
                                    '<input type="radio" class="icheck-primary d-inline natureV1" name="nOv" id="natureV2" checked value="Personal" onclick="natureOfvisit()"> <label for="natureV2"><small>Personal</small></label>'+
                                '</div>';

        $('#company').attr('disabled', true);
        $('#company_add').attr('disabled', true);
    }

    var radio_q1_a  =   '';
    if(question1_a  ==  "N"){
        radio_q1_a  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-a" name="q1_a" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-a" name="q1_a" value="N" checked></small></td>';
    }else{
        radio_q1_a  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-a" name="q1_a" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-a" name="q1_a" value="N"></small></td>';
    }

    var radio_q1_b  =   '';
    if(question1_b  ==  "N"){
        radio_q1_b  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-b" name="q1_b" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-b" name="q1_b" value="N" checked></small></td>';
    }else{
        radio_q1_b  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-b" name="q1_b" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-b" name="q1_b" value="N"></small></td>'
    }

    var radio_q1_c  =   '';
    if(question1_c  ==  "N"){
        radio_q1_c  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-c" name="q1_c" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-c" name="q1_c" value="N" checked></small></td>';
    }else{
        radio_q1_c  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-c" name="q1_c" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-c" name="q1_c" value="N"></small></td>';
    }

    var radio_q1_d  =   '';
    if(question1_d  ==  "N"){
        radio_q1_d  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-d" name="q1_d" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-d" name="q1_d" value="N" checked></small></td>';
    }else{
        radio_q1_d  =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-d" name="q1_d" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q1-d" name="q1_d" value="N"></small></td>';
    }

    var radio_q2    =   '';
    if(question2    ==  "N"){
        radio_q2    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q2" name="q2" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q2" name="q2" value="N" checked></small></td>';
    }else{
        radio_q2    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q2" name="q2" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q2" name="q2" value="N"></small></td>';
    }

    var radio_q3    =   '';
    if(question3    ==  "N"){
        radio_q3    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q3" name="q3" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q3" name="q3" value="N" checked></small></td>';
    }else{
        radio_q3    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q3" name="q3" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q3" name="q3" value="N"></small></td>';
    }

    var radio_q4    =   '';
    if(question4    ==  "N"){
        radio_q4    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q4" name="q4" value="Y"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q4" name="q4" value="N" checked></small></td>';
    }else{
        radio_q4    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q4" name="q4" value="Y" checked></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q4" name="q4" value="N"></small></td>';
    }

    var radio_q5    =   '';
    if(question5    ==  "N"){
        radio_q5    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q5" name="q5" value="Y" onclick="enableTextbox()"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q5" name="q5" value="N" checked onclick="enableTextbox()"></small></td>';
    }else{
        radio_q5    =   '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q5" name="q5" value="Y" checked onclick="enableTextbox()"></small></td>'+
                        '<td class="text-center"><small><input type="radio" class="icheck-primary d-inline q5" name="q5" value="N" onclick="enableTextbox()"></small></td>';
    }

        $.confirm({
            columnClass: 'col-xs-12 col-sm-12 col-md-9',
            containerFluid: true, // this will add 'container-fluid' instead of 'container'
            animation: 'zoom',
            animateFromElement: false,
            draggable: false,
            icon: 'fa fa-heartbeat',
            title: 'Health Checklist',
            content: 
            '<form>'+
                '<div class="col-xs-12 col-sm-12 col-md-12">'+
                
                    '<div class="form-group row mt-2">'+
                        '<div class="col-xs-3 col-sm-3 col-md-2"><small class="font-weight-bold text-uppercase text-danger">Temperature </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-2 col-sm-2 col-md-2"><input type="text" class="form-control form-control-sm text-center temperature"/></div>'+
                    '</div>'+

                    '<div class="form-group row">'+
                        '<div class="col-xs-2 col-sm-2 col-md-2"><small>Name </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-5 col-sm-4 col-md-6"><small class="font-weight-bold">'+parsed_qr.name+'</small></div>'+

                        '<div class="col-xs-2 col-sm-2 col-md-1"><small>Sex </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-1 col-sm-1 col-md-1"><small class="font-weight-bold">'+parsed_qr.sex+'</small></div>'+

                        '<div class="col-xs-2 col-sm-2 col-md-1"><small>Age </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-1 col-sm-1 col-md-1"><small class="font-weight-bold">'+parsed_qr.age+'</small></div>'+
                    '</div>'+

                    '<div class="form-group row">'+
                        '<div class="col-xs-2 col-sm-2 col-md-2"><small>Residence </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-6 col-sm-6 col-md-6"><small class="font-weight-bold text-uppercase">'+parsed_qr.residency+'</small></div>'+
                        '<input type="hidden" class="form-control form-control-sm residency" name="residency" id="residency" value="'+parsed_qr.residency+'" />'+
                        '<input type="hidden" class="form-control form-control-sm empno" name="empno" id="empno" value="'+parsed_qr.empno+'"/>'+
                        '<input type="hidden" class="form-control form-control-sm empName" name="empName" id="empName" value="'+parsed_qr.name+'"/>'+
                        '<input type="hidden" class="form-control form-control-sm sex" name="sex" id="sex" value="'+parsed_qr.sex+'"/>'+
                        '<input type="hidden" class="form-control form-control-sm age" name="age" id="age" value="'+parsed_qr.age+'"/>'+
                        
                        '<div class="col-xs-2 col-sm-2 col-md-2"><small>Phone # </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-2 col-sm-2 col-md-2"><small class="font-weight-bold text-uppercase">'+parsed_qr.phone+'</small></div>'+
                        '<input type="hidden" class="form-control form-control-sm phone" name="phone" value="'+parsed_qr.phone+'" />'+
                    '</div>'+

                    '<div class="form-group row">'+
                        '<div class="col-xs-2 col-sm-2 col-md-2"><small>Nature of Visit </small><span class="float-right">:</span></div>'+
                            radio_natureOfvisit +
                        '<div class="col-xs-6 col-sm-6 col-md-6"><small>If Official, fill-in company details below</small></div>'+
                    '</div>'+
                    
                    '<div class="form-group row">'+
                        '<div class="col-xs-2 col-sm-2 col-md-2 mt-1"><small>Company </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-10 col-sm-10 col-md-10 mt-1"><input type="text" class="form-control form-control-sm font-weight-bold text-sm company" name="company" id="company" value="'+parsed_qr.company+'" /></div>'+

                        '<div class="col-xs-2 col-sm-2 col-md-2 mt-1"><small>Company Address </small><span class="float-right">:</span></div>'+
                        '<div class="col-xs-10 col-sm-10 col-md-10 mt-1"><input type="text" class="form-control form-control-sm font-weight-bold text-sm company_add" name="company_add" id="company_add" value="'+parsed_qr.company_add+'"/></div>'+
                    '</div>'+

                    '<div class="form-group row">'+
                        '<div class="table-responsive">'+
                            '<table width=100% class="table-bordered">'+
                                '<tbody>'+
                                    '<tr>'+
                                        '<td colspan=2><small></small></td>'+
                                        '<td width=5% class="text-center"><small>Yes</small></td>'+
                                        '<td width=5% class="text-center"><small>No</small></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td rowspan=4><small>&nbsp; 1. Are you experiencing : <br>(nakararanas ka ba ng:)</small></td>'+
                                        '<td><small>&nbsp; a. Sore Throat (pananakit ng lalamunan/ masakit lumunok)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q1_a +
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><small>&nbsp; b. Body Pains (pananakit ng katawan)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q1_b +
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><small>&nbsp; c. Headache (pananakit ng ulo)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q1_c +
                                    '</tr>'+
                                    '<tr>'+
                                        '<td><small>&nbsp; d. Fever for the past few days (lagnat sa nakalipas ng mga araw)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q1_d +
                                    '</tr>'+

                                    '<tr>'+
                                        '<td colspan=2><small>&nbsp; 2. Have you worked together or stayed in the same close environment of a confirmed COVID-19 case? <br> (May nakasama ka ba o nakatrabahong tao na kumpirmadong may COVID-19?)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q2 +
                                    '</tr>'+

                                    '<tr>'+
                                        '<td colspan=2><small>&nbsp; 3. Have you had any contact with anyone with fever, cough, colds, and sore throat in the past 2 weeks? (Mayroon ka bang nakasama na may lagnat, ubo, sipon, o sakit ng lalamunan sa nakalipas na dalawang linggo?)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q3 +
                                    '</tr>'+

                                    '<tr>'+
                                        '<td colspan=2><small>&nbsp; 4. Have you travelled outside of the Philippines in the last 14 days? (Ikaw ba ay nagbyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?)</small> <i class="text-danger font-weight-bold float-right">*</i> </td>'+
                                        radio_q4 +
                                    '</tr>'+

                                    '<tr>'+
                                        '<td colspan=2><small>&nbsp; 5. Have you travelled to any area in NCR aside from your home? (Ikaw ba ay nagpunta sa iba pang parte ng NCR o Metro Manila bukod sa iyong bahay?) <br>'+
                                        'Specify (Sabihin kung saan): </small> <i class="text-danger font-weight-bold float-right">*</i> <input type="text" class="form-control form-control-sm ncrPlace" name="ncrPlace" id="ncrPlace" disabled/></td>'+
                                        radio_q5 +
                                    '</tr>'+

                                '</tbody>'+
                            '</table>'+

                        '</div>'+
                    '</div>'+

                    '<div class="form-group row">'+
                        '<div class="col-xs-8 col-md-12"><small>I hereby authorize <b>Ideaserv Systems, Inc., Phillogix Systems, Inc., ApSoft Inc., and NuServ Solutions, Inc.'+
                        '</b>, to collect and process the data indicated herein for the purpose of effecting control of the COVID-19 infection. I understand that my personal information is protected by <b>RA 10173</b>'+
                        ', Data Privacy Act of 2012, and that I am required by <b>RA 11469</b>, Bayanihan to Heal as One Act, to provide truthful information.</small></div>'+
                    '</div>'+

                '</div>'+
            '</form>',
            buttons:{
                cancel:{
                    btnClass: 'btn-danger',
                    action: function(){
                        $('#qr_code').val('');
                    }
                },
                formSubmit:{
                    text: 'Submit',
                    btnClass: 'btn-primary',
                    action: function(){
                        var temperature   =     this.$content.find('.temperature').val();
                        var empno       =   this.$content.find('.empno').val();
                        var name        =   this.$content.find('.empName').val();
                        var sex         =   this.$content.find('.sex').val();
                        var age         =   this.$content.find('.age').val();
                        var residency   =   this.$content.find('.residency').val();
                        var phone       =   this.$content.find('.phone').val();
                        var company     =   this.$content.find('.company').val();
                        var company_add =   this.$content.find('.company_add').val();
                        // var natureOfV   = this.$content.find('.natureV1').attr('');
                        var natureOfV   =   $('input[name="nOv"]:checked').val();
                        var q1_a    =   $('input[name="q1_a"]:checked').val();
                        var q1_b    =   $('input[name="q1_b"]:checked').val();
                        var q1_c    =   $('input[name="q1_c"]:checked').val();
                        var q1_d    =   $('input[name="q1_d"]:checked').val();
                        var q2      =   $('input[name="q2"]:checked').val();
                        var q3      =   $('input[name="q3"]:checked').val();
                        var q4      =   $('input[name="q4"]:checked').val();
                        var q5      =   $('input[name="q5"]:checked').val();
                        var ncrPlace =   this.$content.find('.ncrPlace').val();

                        if(!temperature){
                            $.alert('Temperature is required!');
                            return false;
                        }

                        if(!residency || !phone || !q1_a || !q1_b || !q1_c || !q1_d || !q2 || !q3 || !q4 || !q5){
                            $.alert('Please fill up the required fields!');
                            return false;
                        }

                        if(q5 == 'Y' && !ncrPlace){
                            $.alert('Please specify the place!');
                            return false;                            
                        }

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            data:{
                                temperature :   temperature,
                                empno       :   empno,
                                name        :   name,
                                sex         :   sex,
                                age         :   age,
                                residency   :   residency,
                                phone       :   phone,
                                natureOfV   :   natureOfV,
                                company     :   company,
                                company_add :   company_add,
                                q1_a        :   q1_a,
                                q1_b        :   q1_b,
                                q1_c        :   q1_c,
                                q1_d        :   q1_d,
                                q2          :   q2,
                                q3          :   q3,
                                q4          :   q4,
                                q5          :   q5,
                                ncrPlace    :   ncrPlace
                            },
                            url: '/post/health_list',
                            dataType: 'JSON',
                            success: function(response){
                                if(response == 'ok'){
                                    $.confirm({
                                        animation: 'zoom',
                                        animateFromElement: false,
                                        icon: 'fa fa-thumbs-up',
                                        title: 'Successful',
                                        content: 'Submitted!',
                                        buttons:{
                                            confirm:{
                                                text: 'Ok',
                                                btnClass: 'btn-primary',
                                                action: function(){
                                                    location.reload();
                                                }
                                            }
                                        }
                                    });
                                }
                            },
                            error: function(xhr, status, error){
                                var errorMessage = xhr.status + ': ' + xhr.statusText
                                console.log(status, xhr, error);
                                $.alert('Error - ' + errorMessage);
                                $('#qr_code').val('');
                                
                            }
                        });

                    }
                }
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });

});
</script>

@endsection
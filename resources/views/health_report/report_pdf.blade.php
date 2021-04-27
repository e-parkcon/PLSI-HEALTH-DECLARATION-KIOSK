<!DOCTYPE html>

<html>
    <head>
        <title>Health Checklist</title>
        
        <style>
            body{
                width: 50%;
            }

            .justify{
                font-size: 13px;
                text-align: justify;
                text-justify: inter-word;
            }

            .table, table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 13px;
                padding: 2px;
                text-align: left;
            }

            .table_1{
                border-collapse: collapse;
                border: 0px solid black;
            }
        </style>
    </head>

    <body>

        <div class="form-group row">

            <table class="table_1" style="width: 100%;">
                <tr>
                    <td colspan="4" style="text-transform: uppercase;">Health Checklist</td>
                    <td colspan="2" style="text-transform: uppercase;"><small>Temperature : {{ $details['temperature'] }}</small></td>
                </tr>

                <tr>
                    <td width=20%><small style="text-transform: uppercase;">Name</small></td>
                    <td colspan="3"><small>: {{ $details['name'] }}</small></td>
                    <td style="text-transform: uppercase;"><small>Sex :</small> <small style="text-align: right;">{{ $details['sex'] }}</small></td>
                    <td style="text-transform: uppercase;"><small>Age :</small> <small>{{ $details['age'] }}</small></td>
                </tr>

                <tr>
                    <td style="text-transform: uppercase;"><small>Residence</small></td>
                    <td colspan="3" style="text-transform: uppercase;"><small>: {{ $details['residency'] }}</small></td>
                    <td colspan="2" style="text-transform: uppercase;"><small>Phone # :</small> <small>{{ $details['phone'] }}</small></td>
                </tr>

                <tr>
                    <td style="text-transform: uppercase;"><small>Nature of Visit</small></td>
                    <td style="text-transform: uppercase;" colspan="5"><small>: {{ $details['nature_of_visit'] }}</small></td>
                </tr>

                <tr>
                    <td style="text-transform: uppercase;"><small>Company Name</small></td>
                    <td style="text-transform: uppercase;" colspan="5"><small>: {{ $details['company'] }}</small></td>
                </tr>

                <tr>
                    <td style="text-transform: uppercase;"><small>Company Address</small></td>
                    <td style="text-transform: uppercase;" colspan="5"><small>: {{ $details['company_add'] }}</small></td>
                </tr>
            </table>

            <br>

            <table class="table" style="width:100%;">
                <tbody>
                    <tr>
                        <td colspan=2><small></small></td>
                        <td width=2% style="text-align: center;"><small>Yes</small></td>
                        <td width=2% style="text-align: center;"><small>No</small></td>
                    </tr>
                    <tr>
                        <td rowspan="4" width=10%><small>&nbsp; 1. Are you experiencing : (nakararanas ka ba ng:)</small></td>
                        <td width=15%><small>&nbsp; a. Sore Throat (pananakit ng lalamunan/ masakit lumunok)</small></td>
                        <td style="text-align:center;">{{ $details['q1_a'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q1_a'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td><small>&nbsp; b. Body Pains (pananakit ng katawan)</small></td>
                        <td style="text-align:center;">{{ $details['q1_b'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q1_b'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td><small>&nbsp; c. Headache (pananakit ng ulo)</small></td>
                        <td style="text-align:center;">{{ $details['q1_c'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q1_c'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td><small>&nbsp; d. Fever for the past few days (lagnat sa nakalipas ng mga araw)</small></td>
                        <td style="text-align:center;">{{ $details['q1_d'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q1_d'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><small>&nbsp; 2. Have you worked together or stayed in the same close environment of a confirmed COVID-19 case? (May nakasama ka ba o nakatrabahong tao na kumpirmadong may COVID-19?)</small></td>
                        <td style="text-align:center;">{{ $details['q2'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q2'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><small>&nbsp; 3. Have you had any contact with anyone with fever, cough, colds, and sore throat in the past 2 weeks? (Mayroon ka bang nakasama na may lagnat, ubo, sipon, o sakit ng lalamunan sa nakalipas na dalawang linggo?)</small></td>
                        <td style="text-align:center;">{{ $details['q3'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q3'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><small>&nbsp; 4. Have you travelled outside of the Philippines in the last 14 days? (Ikaw ba ay nagbyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?)</small></td>
                        <td style="text-align:center;">{{ $details['q4'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q4'] == 'N' ? '*' : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><small>&nbsp; 5. Have you travelled to any area in NCR aside from your home? 
                                (Ikaw ba ay nagpunta sa iba pang parte ng NCR o Metro Manila bukod sa iyong bahay?) 
                                <br>Specify (Sabihin kung saan): </small>
                                <small style="text-transform: uppercase;">"{{ $details['q5'] == 'Y' ? $details['other_place'] : '' }}"</small>
                        </td>
                        <td style="text-align:center;">{{ $details['q5'] == 'Y' ? '*' : '' }}</td>
                        <td style="text-align:center;">{{ $details['q5'] == 'N' ? '*' : '' }}</td>
                    </tr>
                </tbody>
            </table>

            <br>
            <div class="justify">
                <small>I hereby authorize <b>Ideaserv Systems, Inc., Phillogix Systems, Inc., ApSoft Inc., and NuServ Solutions, Inc.
                </b>, to collect and process the data indicated herein for the purpose of effecting control of the COVID-19 infection. I understand that my personal information is protected by <b>RA 10173</b>
                , Data Privacy Act of 2012, and that I am required by <b>RA 11469</b>, Bayanihan to Heal as One Act, to provide truthful information.</small>
            </div>

            <br>
            <br>

            <div>
                <small>Signature over printed name : </small> <small>{{ $details['name'] }}</small>
            </div>

            <br>
            <div>
                <small>Date : </small> <small>{{ date('F d, Y', strtotime($details['txndate'])) }}</small>
            </div>

        </div>

    </body>
</html>
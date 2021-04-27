@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Health Report
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width=90%>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($checklist as $list)
                                    <tr>
                                        <td>{{ date('F d, Y', strtotime($list->txndate)) }}</td>
                                        <td class="text-center">
                                            <a href="#" id="view" txndate="{{ $list->txndate }}" fullDate="{{ date('F d, Y', strtotime($list->txndate)) }}" class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>

$('a#view').click(function(){

    var txndate =   $(this).attr('txndate');
    var fullDate    =   $(this).attr('fullDate');

    console.log('click', txndate);

    $.confirm({
        columnClass: 'col-xs-12 col-sm-12 col-md-9',
        containerFluid: true, // this will add 'container-fluid' instead of 'container'
        animation: 'zoom',
        animateFromElement: false,
        draggable: false,
        icon: 'fa fa-heartbeat',
        title: 'Health Checklist for ' + fullDate,
        content: function(){
            var self    =   this;

            return $.ajax({
                url     :   '/reportPerday/' + txndate,
                dataType:   'JSON',
                method  :   'GET'
            }).done(function(response){
                self.setContentAppend('<div class="table-responsive">'+
                                        '<table class="table">'+
                                            '<th style="font-size: 12px;" width=10%>Name</th>'+
                                            '<th style="font-size: 12px; text-align:center;" width=10%>Time</th>'+
                                            '<th style="font-size: 12px; text-align:center;" width=10%>Action</th>'+
                                        '</table>'+
                                    '</div>');
                for(i=0; i < response.length; i++){
                    self.setContentAppend('<div class="table-responsive">'+
                                            '<table class="table">'+
                                                '<tr>'+
                                                    '<td style="font-size: 12px;" width=10%>'+response[i].name+'</td>'+
                                                    '<td style="font-size: 12px; text-align:center;" width=10%>'+response[i].txntime+'</td>'+
                                                    '<td style="font-size: 12px; text-align:center;" width=10%><a href="/pdf'+response[i].url+'" target="_blank">Print PDF</a></td>'+
                                                '</tr>'+
                                            '</table>'+
                                        '</div>');
                }
            }).fail(function(){
                $.alert('Something went wrong!');

                return false;
            });
        },
        buttons:{
            close:{
                btnClass:   'btn-danger',
                action  :   function(){

                } 
            }
        }
    });

});

</script>

@endsection
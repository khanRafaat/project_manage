@extends('admin.includes.main')
@section('admin')
<!-- 
Edit Modal Start  -->
<div class="modal fade zoom" tabindex="1" id="adminedit" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body modal-body-lg">
                <form action="#" method="POST" id="assigneeEdit">
                    @csrf
                    @method('PUT')
                    <div class="row col-12">
                       
                            <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label" for="assingedWork">Assinged Work</label>
                                <div class="form-control-wrap">
                                    <p id="assigned_work"></p>
                                </div>
                                </div>
                            </div>
                        
                        <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-label" for="email-address-1">Performance of Assignee</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="pf_assignee" id="pfassignee" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Work Done</label>
                                <div class="form-control-wrap">
                                    <textarea id="done_work" name="done_work" class="form-control" id=""></textarea>
                                </div>
                            </div>
                          
                        </div>
                      
                       
                    </div>
            </div>
            <button class="btn btn-success center" type="submit">Save Changes</button>
            </form>
            <div class="modal-footer bg-light">
                <div class="row col-12">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#timer" role="tab" aria-controls="home" aria-selected="true">Auto Timer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menual_input" role="tab" aria-controls="profile" aria-selected="false">Menual Input</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <input type="hidden" id="timer_start" name="">
                                     <input type="hidden" id="timer_stop" name="">
                                    <div class="tab-pane fade show active" id="timer" role="tabpanel" aria-labelledby="home-tab">
                                      

                                        <div class="center">
                                        <div class="alert alert-info timerDisplay"><h5>00 : 00 : 00</h5></div>
                                        </div>


                                        <div class="center mt-5">

                                       <button type="submit" class="btn btn-secondary timer_button_start mr-2">Start</button>
                                        <button type="submit" class="btn btn-danger timer_button_stop" disabled>Stop</button>
                                        </div>
                                    </div>

                                   
                                    
                                 





                                    <div class="tab-pane fade" id="menual_input" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <input type="hidden" id="task_id" name="task_id" value="">
                                            <label class="form-label">Start Time</label>
                                            <div class="form-control-wrap">
                                                <input type="time" name="start_time" id="get_start_time" class="get_start_time form-control" data-toggle="tooltip" data-placement="top" title="Click for current time">
                                                <p id="start_time_error"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no-1">End time</label>
                                            <div class="form-control-wrap">
                                                <input type="time" name="end_time" id="get_end_time" class="get_end_time form-control " data-toggle="tooltip" data-placement="top" title="Click for current time">
                                                <p id="end_time_error"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <button type="submit " class="btn btn-secondary add_time">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <table class="table-serial table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Start Time</th>
                                                    <th scope="col">End Time</th>
                                                    <th scope="col">Total Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="timeListTable">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Edit Modal End  -->
<!-- Delete Modal start -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Time</h5>
            </div>
            <div class="modal-body">
                <input id="delete_time_id" type="hidden">
                <h3>Are you sure want to delete this data ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete_time_btn">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal end -->
<div class="nk-block nk-block-lg">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <a style="margin-bottom: 10px" href="{{route('assignee.index')}}?day=yesterday" class="btn btn-primary">Yesterday</a>
    <a style="margin-bottom: 10px" href="{{route('assignee.index')}}?day=all" class="btn btn-primary">All Task</a>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Reporter</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Duty Time</th>
                            <th scope="col">Performance Time</th>
                            <th scope="col">Performance Reporter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($AssignTask as $Task)
                        <tr data-toggle="modal" data-target="#adminedit" onclick="viewTaskDeltails('{{$Task->id}}')">
                            <th scope=" row">{{$i++}}</th>
                            <td data-toggle="tooltip" data-placement="top" title="Assigned Work : {{$Task->assigned_work}} ">{{$Task->ReporterName->name}}</td>
                            <td>{{Carbon\Carbon::parse($Task->date)->format('d/m/Y')}}</td>
                            <td>
                                @if ($Task->time == NULL)
                                NO Data
                                @else
                                {{$Task->time}}
                                @endif
                            </td>
                            <td>
                                @if ($Task->duty_time == NULL)
                                NO Data
                                @else
                                {{$Task->duty_time}}
                                @endif
                            </td>
                            <td>
                                @if ($Task->pf_time == NULL)
                                NO Data
                                @else
                                {{$Task->pf_time}}
                                @endif
                            </td>
                            <td>
                                @if ($Task->pf_reporter == NULL)
                                NO Data
                                @else
                                {{$Task->pf_reporter}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
var taskArray = @json($AssigneeTaskArray);

function viewTaskDeltails(id) {

    $("#assigned_work").html(taskArray[id]['assigned_work']);
    $("#done_work").text(taskArray[id]['done_work']);
    $("#pfassignee").val(taskArray[id]['pf_assignee']);
    $("#task_id").val(taskArray[id]['id']);
    $("#assigneeEdit").attr('action', '{{url('assignee')}}' + '/' + taskArray[id]['id']);

    fatchTime()
    $(".timer_button_stop").prop("disabled", true);
    $(".add_time").prop("disabled", false);
    $(".add_time").text("Save");



}


$(document).on('click', '.add_time', function(e) {

  

    e.preventDefault();

    var d = new Date();
    var st = $('.get_start_time').val();
    var et = $('.get_end_time').val();
    var startTimeStamp = new Date(d.toString().split(":")[0].slice(0,-2) + st);
    var endTimeStamp = new Date(d.toString().split(":")[0].slice(0,-2) + et);
    $(".add_time").prop("disabled", true);
    $(".add_time").text("Please Wait...");

    var timeData = {
        'task_id': $('#task_id').val(),
        'start_time': startTimeStamp,
        'end_time': endTimeStamp,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        type: "POST",
        url: "{{route('times.store')}}",
        data: timeData,
        dataType: "json",
        success: function(response) {

            console.log(response);
            if (response.status == 400) {


                $("#start_time_error").show();
                $("#end_time_error").show();
                $("#start_time_error").text(response.errors.start_time);
                $("#start_time_error").addClass('badge badge-danger');
                $("#end_time_error").text(response.errors.end_time);
                $("#end_time_error").addClass('badge badge-danger');
                $(".add_time").prop("disabled", false);
                $(".add_time").text("Save");




            } else {
                fatchTime()
                $("#start_time_error").hide();
                $("#end_time_error").hide();
                $("#time_status").addClass('badge badge-success');
                $("#time_status").text(response.message);
                $("#time_status").show(1000);
                $("#time_status").hide(4000);
                $(".add_time").prop("disabled", false);
                $(".add_time").text("Save");

                toastr.clear();
                NioApp.Toast(response.message, 'success', {
                    position: 'top-right'
                });


            }

        }
    });

});


function fatchTime() {

    $.ajax({

        type: "GET",
        url: "/times/list/" + $('#task_id').val(),
        dataType: "json",
        success: function(response) {

            console.log(response.timeList);



            $('#timeListTable').html('');



            $.each(response.timeList, function(key, times) {


                var date1 = new Date(times.start_time); 
                var date2 = new Date(times.end_time);
                if (date2 < date1) {
                  date2.setDate(date2.getDate() + 1);
                }
                var diff = date2 - date1;
                var msec = diff;
                var hh = Math.floor(msec / 1000 / 60 / 60);
                msec -= hh * 1000 * 60 * 60;
                var mm = Math.floor(msec / 1000 / 60);
                msec -= mm * 1000 * 60;
                var ss = Math.floor(msec / 1000);
                msec -= ss * 1000; 







                $('#timeListTable').append(`

                                                
                                    <tr >
                                        <td>&nbsp;</td>
                                        <td> ` +dateAndMonth(times.start_time) + ` </td>

                                        <td> ` +getTimeFromDate(times.start_time) + ` </td>

                                        <td> ` +getTimeFromDate(times.end_time) + ` </td>

                                        <td> ` +(hh <= 9 ? "0" : "")+hh+":"+(mm <= 9 ? "0" : "")+mm+":"+(ss <= 9 ? "0" : "")+ss+  `</td>
                                        
                                        <td> <button id="scheduledelete" value="` + times.id + `" class=" delete_time btn btn-danger btn-sm" style="padding: 2px;">Delete</button></td>
                                    </tr>`


                );


            });



        }
    });


}

$(document).on('click', '.delete_time', function(e) {

    e.preventDefault();
    var time_id = $(this).val();
    $("#delete_time_id").val(time_id);
    $("#delete_modal").modal('show');

});

$(document).on('click', '.delete_time_btn', function(e) {

    e.preventDefault();




    var time_id = $("#delete_time_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        type: "DELETE",
        url: "/times/" + time_id,
        success: function(response) {
            fatchTime()
            $("#delete_modal").modal('hide');
            toastr.clear();
            NioApp.Toast(response.message, 'error', {
                position: 'top-right'
            });

            //  console.log(response);

        }

    });


});


let [seconds,minutes,hours] = [0,0,0];
let timerRef = document.querySelector('.timerDisplay');
let int = null;




$(document).on('click', '.timer_button_start', function(e) {
     e.preventDefault();
     var date = new Date();
    currentHours = date.getHours();
    currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes() +":"+ date.getSeconds();

    $("#timer_start").val("");
    var currentTime = document.querySelector("#timer_start");
    currentTime.value = date;


      $(".timer_button_start").prop("disabled", true);
        $(".timer_button_stop").prop("disabled", false);


if(int!==null){
        clearInterval(int);
    }
    int = setInterval(displayTimer,1000);

    
    
});


$(document).on('click', '.timer_button_stop', function(e) {
     e.preventDefault();
     var date = new Date();
    currentHours = date.getHours();
    currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes()+":"+ date.getSeconds();

$("#timer_stop").val("");
var currentTime = document.querySelector("#timer_stop");
    currentTime.value = date;
     

  clearInterval(int);
    [seconds,minutes,hours] = [0,0,0];
    timerRef.innerHTML = '<h5>00 : 00 : 00</h5>';




 var timeData = {
        'task_id': $('#task_id').val(),
        'start_time': $('#timer_start').val(),
        'end_time': $('#timer_stop').val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        type: "POST",
        url: "{{route('times.store')}}",
        data: timeData,
        dataType: "json",
        success: function(response) {

            console.log(response);
            if (response.status == 400) {




                fatchTime()
              
                toastr.clear();
                NioApp.Toast(response.message, 'error', {
                    position: 'top-right'
                });

                 $(".timer_button_start").prop("disabled", false);
                 $(".timer_button_stop").prop("disabled", true);



             
            } else {
                fatchTime()
              
                toastr.clear();
                NioApp.Toast(response.message, 'success', {
                    position: 'top-right'
                });

                 $(".timer_button_start").prop("disabled", false);
                 $(".timer_button_stop").prop("disabled", true);


            }

        }
    });


});


function displayTimer(){
    seconds+= 1;
    
        if(seconds == 60){
            seconds = 0;
            minutes++;
            if(minutes == 60){
                minutes = 0;
                hours++;
            }
        }
   
    let h = hours < 10 ? "0" + hours : hours;
    let m = minutes < 10 ? "0" + minutes : minutes;
    let s = seconds < 10 ? "0" + seconds : seconds;
    

    timerRef.innerHTML = `<h5> ${h} : ${m} : ${s} </h5>`;
}

   

$("#get_start_time").click(function() {
     var date = new Date();
    currentHours = date.getHours();
   currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes()+":"+ date.getSeconds();
    var currentTime = document.querySelector("#get_start_time");
    currentTime.value = currentHours;
});

$("#get_end_time").click(function() {
      var date = new Date();
    currentHours = date.getHours();
    currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes()+":"+ date.getSeconds();
   var currentTime = document.querySelector("#get_end_time");
   currentTime.value = currentHours;
});


function dateAndMonth(getDate){

    var timeFromDate = new Date(getDate)
   var month = timeFromDate.toLocaleString('default', { month: 'short' });
   var dateOfMonth = timeFromDate.getDate();
   return dateOfMonth +" " +month;



}

function getTimeFromDate(timestamp) {
       var timeFromDate = new Date(timestamp)
      var currentHours = timeFromDate.getHours();
        currentHours = ("0" + currentHours).slice(-2) + ":" + timeFromDate.getMinutes() ;
       
        var ts = currentHours;
        var H = +ts.substr(0, 2);
        var h = (H % 12) || 12;
        h = (h < 10) ? ("0" + h) : h;
        var ampm = H < 12 ? " AM" : " PM" ;
        min = ts.substr(2,3);
        console.log(min);
        minn = (min < 10) ? ("0" + min) : min;
        ts = h +minn+ ampm;
         return ts;

}



</script>
@endsection

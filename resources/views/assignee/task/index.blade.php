@extends('admin.includes.main')
@section('admin')


{{-- Edit Modal Start --}}

<div class="modal fade zoom" tabindex="1" id="adminedit">
    <div class="modal-dialog modal-xl modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body modal-body-lg">

                <form action="#" method="POST" id="AdminEdit">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="assingedWork">Assinged Work</label>
                                <div class="form-control-wrap">
                                    <p id="assigned_work"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Work Done</label>
                                <div class="form-control-wrap">
                                    <textarea id="done_work" name="done_work" class="form-control" id=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Performance of Assignee</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="pf_assignee" id="pfassignee" class="form-control">
                                </div>
                            </div>
                        </div>


                    </div>
            </div>
            <button class="btn btn-success center"  type="submit">Save Changes</button>
            </form>

            <div class="modal-footer bg-light" style=" margin-top:20px">
            
                     
                        <div class="row col-12" style="margin-left:-150px" >

                            <div class="col-md-8" >
                                <div class="form-group">
                             
                                    <div class="form-control-wrap">

                                        <table class="table">
                                            <thead>
                                                <tr>

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

                 <div class=" col-12" id="timeForm">
                        <div class="col-md-4" style="margin-left:600px; margin-top:-100px;">
                            <div class="form-group">
                                
                           
                                <label class="form-label" >Start Time</label>
                                <div class="form-control-wrap">
                                    
                                    <input type="time" name="start_time" id="get_start_time"  class="get_start_time form-control"  data-toggle="tooltip" data-placement="top"
                            title="Click for current time">
                            <p id="start_time_error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-left:600px; ">
                            <div class="form-group">
                                <label class="form-label" for="phone-no-1">End time</label>
                                <div class="form-control-wrap">
                                    <input type="time" name="end_time"  id="get_end_time" class="get_end_time form-control"  data-toggle="tooltip" data-placement="top"
                            title="Click for current time" >
                            <p id="end_time_error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-left:55em; margin-top: 20px ">
                            <div class="form-group">

                                <div class="form-control-wrap">
                                    <button type="submit " class="btn btn-secondary add_time">Save Time</button>
                                </div>
                            </div>
                           
                        </div>
                       
                 </div>

                </div>
            
             

         </div>

           
        </div>
    </div>
</div>

{{-- Edit Modal End --}}


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
                         
                            <td data-toggle="tooltip" data-placement="top"
                            title="Assigned Work : {{$Task->assigned_work}} " >{{$Task->ReporterName->name}}</td>
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

                $("#assigned_work").text(taskArray[id]['assigned_work']);
                $("#done_work").text(taskArray[id]['done_work']);
                $("#pfassignee").val(taskArray[id]['pf_assignee']);
                $("#AdminEdit").attr('action','{{url('assignee')}}'+'/'+ taskArray[id]['id']);

                fatchTime()

             function fatchTime(){

                    $.ajax({

                        type:"GET",
                        url:"/times/list/"+taskArray[id]['id'],
                        dataType: "json",
                        success: function(response){

                            console.log(response.timeList);
                            $('#timeListTable').html("");
                            $.each(response.timeList, function (key,times){
                        $('#timeListTable').append(`

                                    
                        <tr>\
                            <td> `+times.start_time +` </td>\

                            <td> `+times.end_time +` </td>\

                            <td> 00:00:00</td>\
                            
                            <td> <button id="scheduledelete" value="`+times.id +`" class="btn btn-danger btn-sm" style="padding: 2px;">Delete</button></td>\
                        </tr>` );



                            });



                        }
        });


     }           

$(document).on('click','.add_time',function(e){

        e.preventDefault();
        $(".add_time").prop("disabled",true);
        $(".add_time").text("Saving...");

        var timeData ={
            'task_id':taskArray[id]['id'],
            'start_time': $('.get_start_time').val(),
            'end_time': $('.get_end_time').val(),
        }

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({

            type: "POST",
            url:"{{route('times.store')}}",
            data: timeData,
            dataType: "json",
            success: function(response){
            console.log(response);
            if(response.status == 400)
            {
                
       
        $("#start_time_error").show();
        $("#end_time_error").show();
        $("#start_time_error").text(response.errors.start_time);
        $("#start_time_error").addClass('badge badge-danger');
        $("#end_time_error").text(response.errors.end_time);
        $("#end_time_error").addClass('badge badge-danger');
        $(".add_time").prop("disabled",false);
        $(".add_time").text("Save Time");




     }
     else{
        
  
        $("#start_time_error").hide();
        $("#end_time_error").hide();
        $("#time_status").addClass('badge badge-success');
        $("#time_status").text(response.message);
        $("#time_status").show(1000);
        $("#time_status").hide(4000);
        $(".add_time").prop("disabled",false);
        $(".add_time").text("Add Time");
        $("#timeForm").find('input').val('');
        fatchTime()
        toastr.clear();
        NioApp.Toast(response.message, 'success', {position: 'top-right'});
       
      
                    }

            }
        });

 });

}


$( "#get_start_time" ).click(function() {
    var date = new Date();
    currentHours = date.getHours();
    currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes();
    var currentTime = document.querySelector("#get_start_time");
    currentTime.value = currentHours;
});

$( "#get_end_time" ).click(function() {
    var date = new Date();
    currentHours = date.getHours();
    currentHours = ("0" + currentHours).slice(-2) + ":" + date.getMinutes();
    var currentTime = document.querySelector("#get_end_time");
    currentTime.value = currentHours;
});


   



</script>
@endsection

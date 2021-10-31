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
            <div class="modal-footer bg-light">
                
                <button class="btn btn-success center" style="position:center" type="submit">Save Changes</button>
                

            </div>

            </form>
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
                         
                            <td data-toggle="tooltip" data-placement="bottom"
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
             }

</script>
@endsection

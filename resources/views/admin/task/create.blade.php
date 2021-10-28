@extends('admin.includes.main')
@section('admin')




<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Create Project Task</h4>
            <div class="nk-block-des">
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

            </div>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Task Information</h5>
            </div>
            <form action="{{route('admin.store')}}" method="POST" id="AdminCreateTask">
                @csrf
                <div class="row g-12">

                    <div class="col-md-4">
                        @php
                         $defaultDate = date('m/d/Y');
                        @endphp
                        <div class="form-group">
                            <label class="form-label" for="">Date</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" name="date"
                                    class="form-control  form-control-outlined date-picker" id="outlined-date-picker" value="{{$defaultDate}}">
                                <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="phone-no-1">Reporter</label>
                            <div class="form-control-wrap">
                                <select id="" class="form-control" name="reporter">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="">Assignee</label>
                            <div class="form-control-wrap">
                                <select id="" class="form-control" name="assignee">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Assigned Work</label>
                            <div class="form-control-wrap">
                                <textarea name="assigned_work" class="form-control" cols="100" rows="6"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-12" style="margin-top: 20px">
                        <div class="form-group center">
                            <button type="submit" class="btn btn-lg btn-success">Save Task</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- .nk-block -->
@endsection



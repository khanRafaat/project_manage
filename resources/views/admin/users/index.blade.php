@extends('admin.includes.main')
@section('admin')

{{-- Edit Modal Start --}}

<div class="modal fade zoom" tabindex="1" id="adminedit">
    <div class="modal-dialog modal-xl modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Information</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body modal-body-lg">

                <form action="#" method="POST" id="AdminEdit">
                    @csrf
                    @method('PUT')
                    <div class="row g-12">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="name">User Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4" style="margin-top: 20px">
                            <div class="form-group">
                                <label class="form-label" for="duty_time">Daily Duty Time</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="duty_time" id="duty_time" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4" style="margin-top: 20px">
                            <div class="form-group">
                                <label class="form-label" for="weekly_duty">Weekly Duty</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="weekly_duty" id="weekly_duty" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4" style="margin-top: 20px">
                            <div class="form-group">
                                <label class="form-label" for="role">Role</label>
                    
                                <div class="form-control-wrap">
                                    <select id="role" class="form-control" name="role">
                                     
                                        
                                      
                                    </select>
                                </div>
                            </div>
                        </div>



                    </div>
            </div>
            <div class="modal-footer bg-light">
                <button class="btn btn-success" type="submit">Save Changes</button>

            </div>

            </form>
        </div>
    </div>
</div>

{{-- Edit Modal End --}}


<div class="nk-block nk-block-lg">


    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">

                        <th class="nk-tb-col nk-tb-col-check">

                            <div class="custom-control custom-control-sm custom-checkbox notext">

                        </th>
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Duty Time</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Weekly Duty</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Updated At</span></th>


                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)


                    <tr class="nk-tb-item" data-toggle="modal" data-target="#adminedit"
                        onclick="viewTaskDeltails('{{$user->id}}')">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">


                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{$user->name}}<span class="dot dot-success d-md-none ml-1"> </span></span>
                                    <span>{{$user->email}}</span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>{{$user->phone}} </span>
                        </td>
                       
                        <td class="nk-tb-col tb-col-md">
                            <span>
                                @forelse ($user->roles->take(1) as $role)
                                {{$role->name}}
                                @empty
                                <span class="text-danger">Not Assigned</span>
                                @endforelse

                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>0 Hours</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>0 Days</span>
                        </td>
                            <td class="nk-tb-col tb-col-lg">
                            <span>

                                @if($user->updated_at == NULL)
                                <span class="text-danger">No Data</span>
                                @else
                                {{Carbon\Carbon::parse($user->updated_at)->diffForhumans() }}
                                @endif




                            </span>
                        </td>


                    </tr><!-- .nk-tb-item  -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->


</div>
@endsection


@section('js')

<script>
    var userInfoArray = @json($userInfoArray);
    var roles = @json($roles);
    var dutyTime =@json($dutyTime);

    function viewTaskDeltails(id) {
        
        $("#name").val(userInfoArray[id]['name']);
        $("#phone").val(userInfoArray[id]['phone']); 
        $("#email").val(userInfoArray[id]['email']);
        $("#weekly_duty").val(userInfoArray[id]['duty_time']['weekly_duty']);
        $("#duty_time").val(userInfoArray[id]['duty_time']['duty_time']);
        $("#AdminEdit").attr('action','{{route('assignee.store')}}'+'/'+ userInfoArray[id]['id']);

        var ht="";
        $.each(roles, function (i) {
            if (userInfoArray[id]['role_id'] ==roles[i].id ) {
                $("#role").val(roles[i].id);
                ht+='<option value="'   +roles[i].id+     '"  selected="selected" > '+roles[i].name+'</option>';
            }
            else{

                ht+='<option value="'+roles[i].id+'"> '+roles[i].name+'</option>';
            }
           
        });
        $("#role").html(ht);
        

        
    }
 
</script>
@endsection

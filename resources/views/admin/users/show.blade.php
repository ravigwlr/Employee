@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header" style="font-size:16px;">{{ __('View Employee') }}</div>

            <div class="card-body">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning float-right" style="font-size:12px;">Edit</a>
                @if(empty($family_detail))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addfamily" style="font-size:12px;">
                Add Family Details
                </button>
                @endif
                @if(empty($prev_exp))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addprevexp" style="font-size:12px;">
                Add Previous Experience
                </button>
                @endif
                @if(empty($education_detail))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addeducation" style="font-size:12px;">
                Add Education Details
                </button>
                @endif
                <table class="table table-borderless">

                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role->title ?? '--' }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $user->gender }}</td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td>{{ $user->dob }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td>{{ $user->designation }}</td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td>{{ $user->salary }}</td>
                    </tr>

                </table>
                
            </div>
        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active" href="#family_detail" data-toggle="tab" style="font-size:16px;">Family Detail</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#prev_exp" data-toggle="tab" style="font-size:16px">Previous Experience</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#education_detail" data-toggle="tab" style="font-size:16px">Education Detail</a>
                </li>
            </ul>

            <div class="tab-content mt-3">
            <div class="tab-pane active" id="family_detail">
                @if(!empty($family_detail))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#editfamily" style="font-size:12px;">
                    Edit
                </button>
                <table class="table table-borderless">
                    <tr>
                        <th>Father Name</th>
                        <td>{{ $family_detail->father_name }}</td>
                    </tr>
                    <tr>
                        <th>Mother Name</th>
                        <td>{{ $family_detail->mother_name }}</td>
                    </tr>
                    <tr>
                        <th>Total Member</th>
                        <td>{{ $family_detail->total_member }}</td>
                    </tr>
                </table>
                
                <div class="modal fade" id="editfamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Family Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action = "{{ route('admin.editfamily') }}">
                                <input type="hidden" name="id" value="{{$family_detail->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group">
                                    <label for="fname">Father Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{$family_detail->father_name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="mname">Mother Name</label>
                                    <input type="text" class="form-control" id="mname" name="mname" value="{{$family_detail->mother_name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="mname">Total Member</label>
                                    <input type="number" class="form-control" id="tmember" name="tmember" value="{{$family_detail->total_member}}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="tab-pane" id="prev_exp">
                @if(!empty($prev_exp))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#editprevexp" style="font-size:12px;">
                    Edit
                </button>
                <table class="table table-borderless">
                    <tr>
                        <th>Company Name</th>
                        <td>{{ $prev_exp->company_name }}</td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td>{{ $prev_exp->designation }}</td>
                    </tr>
                    <tr>
                        <th>Total Years</th>
                        <td>{{ $prev_exp->total_years }}</td>
                    </tr>
                </table>
                
                <div class="modal fade" id="editprevexp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Previous Experience</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action = "{{ route('admin.editexperience') }}">
                                <input type="hidden" name="id" value="{{$prev_exp->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{$prev_exp->company_name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{$prev_exp->designation}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_years">Total Years</label>
                                    <input type="text" class="form-control" id="total_years" name="total_years" value="{{$prev_exp->total_years}}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="tab-pane" id="education_detail">
                @if(!empty($education_detail))
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#editeducation" style="font-size:12px;">
                    Edit
                </button>
                <table class="table table-borderless">
                    <tr>
                        <th>Course Name</th>
                        <td>{{ $education_detail->course }}</td>
                    </tr>
                    <tr>
                        <th>Grade</th>
                        <td>{{ $education_detail->grade }}</td>
                    </tr>
                    <tr>
                        <th>Year Of Passing</th>
                        <td>{{ $education_detail->year_of_passing }}</td>
                    </tr>
                </table>
                
                <div class="modal fade" id="editeducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Education Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action = "{{ route('admin.editeducation') }}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="id" value="{{$education_detail->id}}">
                                <div class="form-group">
                                    <label for="course">Graducation Course Name</label>
                                    <input type="text" class="form-control" id="course" name="course" value="{{$education_detail->course}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control" id="grade" name="grade" value="{{$education_detail->grade}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="yop">Year of Passing</label>
                                    <input type="text" class="form-control" id="yop" name="yop" value="{{$education_detail->year_of_passing}}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
                    
<!-- Modal -->
<div class="modal fade" id="addfamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Family Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{ route('admin.family') }}">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label for="fname">Father Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Father Name" required>
            </div>
            <div class="form-group">
                <label for="mname">Mother Name</label>
                <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Mother Name" required>
            </div>
            <div class="form-group">
                <label for="mname">Total Member</label>
                <input type="number" class="form-control" id="tmember" name="tmember" placeholder="Enter Total Member" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addprevexp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Previous Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{ route('admin.experience') }}">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
            </div>
            <div class="form-group">
                <label for="total_years">Total Years</label>
                <input type="text" class="form-control" id="total_years" name="total_years" placeholder="Enter Total Years" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addeducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Education Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{ route('admin.education') }}">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label for="course">Graducation Course Name</label>
                <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
            </div>
            <div class="form-group">
                <label for="yop">Year of Passing</label>
                <input type="text" class="form-control" id="yop" name="yop" placeholder="Enter Year of passing" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

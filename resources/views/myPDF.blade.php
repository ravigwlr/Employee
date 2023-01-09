<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
</head>
<body>
    <table class="table table-borderless table-hover">
        <tr class="bg-info text-light">
            <th class="text-center">ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Role</th>
            <th>Salary</th>
            <th>Designation</th>
            <th>Address</th>
            <th>
                &nbsp;
            </th>
        </tr>
        @forelse ($users as $user)
            <tr>
                <td class="text-center">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->title ?? "--"}}</td>
                <td>{{$user->salary}}</td>
                <td>{{$user->designation}}</td>
                <td>{{$user->address}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="100%" class="text-center text-muted py-3">No Users Found</td>
                </tr>
        @endforelse
    </table>
</body>
</html>
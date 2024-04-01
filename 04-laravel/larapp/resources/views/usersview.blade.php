<table>
    <thead>
        <tr>
            <th>FullName</th>
            <th>Email</th>
            <th>Age</th>
            <th>Created id</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->age}}</td>
        <td>{{\Carbon\Carbon::parse($user->birthdate)->diffForHumans()}}</td>
        <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
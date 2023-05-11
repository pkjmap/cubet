<a href="/student/create">Add Student</a>
<a href="/dashboard">Dashboard</a>
<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Reporting Teacher</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td>{{$student->gender}}</td>
        <td>{{$student->teacher->name}}</td>

        <td><a href='/student/{{$student->id}}/edit'>Edit</a> &nbsp;
            <form method="POSt" action="/student/{{$student->id}}">
                @csrf
                <input type="hidden" name="_method" value="delete" />
                <button onclick="javascript:this.form.submit()">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
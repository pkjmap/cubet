<a href="/student/create">Add Student</a>
<a href="/dashboard">Dashboard</a>
<table>
    @foreach($students as $student)
    <tr><td>{{$student->name}}</td></tr>
    @endforeach
</table>
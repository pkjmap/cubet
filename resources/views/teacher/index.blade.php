<a href="/teacher/create">Add Teacher</a>
<a href="/dashboard">Dashboard</a>
<table>
    @foreach($teachers as $teacher)
    <tr><td>{{$teacher->name}}</td></tr>
    @endforeach
</table>
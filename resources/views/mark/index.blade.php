<a href="/mark/create">Add Mark</a>
<a href="/dashboard">Dashboard</a>
<table>
    <tr>
        <th>Student</th>
        <th>Maths</th>
        <th>SCience</th>
        <th>History</th>
        <th>Term</th>
        <th>Total</th>
    </tr>
    @foreach($marks as $mark)
    <tr>
        <td>{{$mark->student->name}}</td>
        <td>{{$mark->maths}}</td>
        <td>{{$mark->science}}</td>
        <td>{{$mark->history}}</td>
        <td>{{$mark->term}}</td>
        <td>{{$mark->total}}</td>
    </tr>
    @endforeach
</table>
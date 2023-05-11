<a href="/mark/create">Add Mark</a>
<a href="/dashboard">Dashboard</a>
<table>
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Maths</th>
        <th>SCience</th>
        <th>History</th>
        <th>Term</th>
        <th>Total</th>
        <th>Created On</th>
        <th>Action</th>
    </tr>
    @foreach($marks as $mark)
    <tr>
        <td>{{$mark->id}}</td>
        <td>{{$mark->student->name}}</td>
        <td>{{$mark->maths}}</td>
        <td>{{$mark->science}}</td>
        <td>{{$mark->history}}</td>
        <td>{{$mark->term}}</td>
        <td>{{$mark->total}}</td>
        <td>{{date('M d, Y H:i A', strtotime($mark->created_at))}}</td>
        <td><a href='/mark/{{$mark->id}}/edit'>Edit</a> &nbsp;
            <form method="POSt" action="/mark/{{$mark->id}}">
                @csrf
                <input type="hidden" name="_method" value="delete" />
                <button onclick="javascript:this.form.submit()">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</table>
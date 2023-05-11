<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form method="POST" action="/mark/{{$mark->id}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Student</label>
                <select name="student_id" class="form-control" id="exampleInputEmail1">
                    @foreach($students as $student)
                    <option value="{{$student->id}}" @if($mark->student_id == $student->id) selected @endif>{{$student->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Maths</label>
                <input type="number" name="maths" class="form-control" id="exampleInputEmail1" value="{{$mark->maths}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">science</label>
                <input type="number" name="science" class="form-control" id="exampleInputEmail1" value="{{$mark->science}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">History</label>
                <input type="number" name="history" class="form-control" id="exampleInputEmail1" value="{{$mark->history}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Term</label>
                <select name="term" class="form-control" id="exampleInputEmail1">
                    <option value="One" @if($mark->term == 'One') selected @endif>One</option>
                    <option value="Two" @if($mark->term == 'Two') selected @endif>Two</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
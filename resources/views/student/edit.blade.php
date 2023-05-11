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
        <form method="POST" action="/student/{{$student->id}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$student->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" name="age" class="form-control" id="exampleInputEmail1" value="{{$student->age}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select name="gender" class="form-control" id="exampleInputEmail1">
                    <option value="Male" @if($student->age=='Male') selected @endif>Male</option>
                    <option value="Female" @if($student->age=='Female') selected @endif>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Reporting to</label>
                <select name="reporting_to" class="form-control" id="exampleInputEmail1">
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" @if($student->reporting_to==$teacher->id) selected @endif>{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
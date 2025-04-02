<html>
    <head></head>
    <body>
            @if($errors->any())
               <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> 
            @endif
        <form method="POST" action="{{ route('register.student') }}">
            @csrf
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="mname" placeholder="Middle Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="text" name="sname" placeholder="Suffix">
            <label>Gender</label>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F">Female
            <input type="date" name="bdate" placeholder="Birth Date">
            <button type="submit">Submit</button>
        </form>

        <table border="1">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->studno }}</td>
                        <td>{{ $student->lname }}, {{ $student->fname }} {{ $student->mname }} {{ $student->sname }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->bdate }}</td>
                        <td>
                            <a href="{{ route('update.student',['id'=>$student->studno]) }}" style="background:yellow;">Update</a>
                            <a href="{{ route('delete.student', ['id'=>$student->studno]) }}" style="background:red;">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
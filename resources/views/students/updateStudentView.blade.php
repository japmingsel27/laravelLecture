<form method="POST" action="">
    @csrf
    <input type="text" name="fname" placeholder="First Name" value="{{ $student->fname }}">
    <input type="text" name="mname" placeholder="Middle Name" value="{{ $student->mname }}">
    <input type="text" name="lname" placeholder="Last Name" value="{{ $student->lname }}">
    <input type="text" name="sname" placeholder="Suffix" value="{{ $student->sname }}">
    <label>Gender</label>
    <input type="radio" name="gender" value="M">Male
    <input type="radio" name="gender" value="F">Female
    <input type="date" name="bdate" placeholder="Birth Date" value="{{ $student->bdate }}">
    <button type="submit">Submit</button>
</form>
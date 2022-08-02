<link rel="stylesheet" href="/css/listresumes.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<h2>Resumes list</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Job title</th>
            <th>Company</th>
            <th>Education</th>
            <th>University</th>
            <th>Image</th>
            <th>Delete Resume</th>
            <th>Edit Resume</th>
            <th>Show Resume</th>
        </tr>
        </thead>
        <tbody>

        @foreach($resumes as $resume)
        <tr>
            <td>{{$resume['id']}}</td>
            <td>{{$resume['name']}}</td>
            <td>{{$resume['email']}}</td>
            <td>{{$resume['age']}}</td>
            <td>{{$resume['phone']}}</td>
            <td>{{$resume['address']}}</td>
            <td>{{$resume['worktitle']}}</td>
            <td>{{$resume['workcompany']}}</td>
            <td>{{$resume['educationdiscipline']}}</td>
            <td>{{$resume['educationplace']}}</td>
            <td><img src="/images/{{$resume['image']}}" width="50" height="50" style=" border-radius: 50%"></td>
            <td><button><a href="{{'delete/'.$resume['id']}}">Delete</a></button></td>
            <td><button><a href="{{'edit/'.$resume['id']}}">Edit</a></button></td>
            <td><button><a href="{{'resumes/'.$resume['id']}}">View</a></button></td>


        </tr>
        @endforeach
        <tbody>
    </table>
</div>

<div style="display: flex; justify-content: center; ">
    {{$resumes->links()}}
</div>


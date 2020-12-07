<html lang="en" class="">
<head>
<meta charset="UTF-8">
<title>Laravel Simple Multiple File Upload Example Tutorial</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="card col-md-9">
       <div class="card-header"> Search File</div>
 
         <div class="card-body">
 
         <form action="/file-search" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="search_text" id="exampleInputEmail1" aria-describedby="" placeholder="">
                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="deleted">
                <label class="form-check-label" for="exampleCheck1"> Deleted</label>
            </div>
           <input type="submit"/>
        </form>
 
         </div>
     </div>
  </div>
 <div class="row justify-content-center">
  <div class="card col-md-9">
         <div class="card-body">
 
         @foreach($files as $file)
         <div class="row">
            <div class="col-md-12">
                {{$file->file_name}}
            </div>
         </div>
        @endforeach
        <nav aria-label="...">
            {{ $files->links() }}
        </nav>
         </div>
     </div>
  </div>
</div>
</html>






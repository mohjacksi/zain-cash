<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Json</title>


    <!-- Bootstrap core CSS -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset("css/signin.css")}}" rel="stylesheet">
</head>

<body class="text-center">
<form method="POST" action="{{ route("get_organized_json") }}" class="form-signin" enctype="multipart/form-data">
    @csrf
    <img class="mb-4" src="https://mjacksi.com/files/uploads/2020/04/small-150x150.png" alt="" width="72" height="72">

    <h2 class="h3 mb-3 font-weight-normal">Upload .Json File</h2>
    <input name="file" type="file" class="form-control-file" id="file">
    <br>
    <h2 class="h3 mb-3 font-weight-normal">Enter Json</h2>

    <label for="textArea" class="sr-only">Example textarea</label>
    <textarea name="json" class="form-control" id="textArea" rows="5" placeholder="Json" required autofocus>[{"letter.txt":"Richard"},{"paper.pdf":"jack"},{"test.py":"Johnny"},{"numbers.docx":"jack"}]</textarea>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Get Organized Json</button>
    <p class="mt-5 mb-3 text-muted">&copy; Mjacksi.com</p>
    <div class="">
        <label for="textArea" class="sr-only">Example textarea</label>
        <textarea class="form-control" id="textArea" rows="5" placeholder="Json"
                  style="display:{{!isset($value)?"none":""}};"
                  autofocus>{{isset($value) && $value != null ? $value : ""}}</textarea>

    </div>
</form>

</body>
</html>

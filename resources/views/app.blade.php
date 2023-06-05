<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Search Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

    <style>
        body{
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <h2 class="page-header text-center">Laravel Search Ajax</h2>
                <div class="search">
                    <form action="{{ URL::to('find') }}" method="POST" class="navbar-from navbar-left">
                        {{ csrf_field()}}
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search Member">
                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                    </form>
                </div>
            </div>
            <div id="result" class="panel panel-default" style="display:none">
                <ul class="list-group" id="memList">

                </ul>
            </div>
            @yield('content')
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#search').keyup(function(){
                let search = $('#search').val();
                if (search=="") {
                    $("#memList").html("");
                    $("#result").hide();
                }else{
                    $.get("{{ URL::to('search') }}", {search:search}, function (data) {
                        $('#memList').empty().html(data);
                        $('#result').show();
                    })
                }
            });
        });
    </script>
</body>
</html>
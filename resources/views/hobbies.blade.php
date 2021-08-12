<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>HobbiesApp</title>

</head>
<body>
<div id="app">

    <Myheader></Myheader>
    <div>
    <router-view></router-view>

    </div>
    <Myfooter></Myfooter>

</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>


<script>

    export default {

    }
</script>

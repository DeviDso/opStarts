<html>

<head>

    <!-- 1 -->
    <link href="css/dropzone.css" type="text/css" rel="stylesheet" />

    <!-- 2 -->
    <script src="js/dropzone.js"></script>>

</head>

<body>

<!-- 3 -->
<form action="{{ url('uploadFile') }}" class="dropzone">
    {{ csrf_field() }}
</form>

</body>

</html>>
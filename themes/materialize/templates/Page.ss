<!doctype html>
<html class="no-js" lang="en">
<head>
    <% base_tag %>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System</title>
    <link rel="stylesheet" href="$Themedir/bower_components/materialize/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="$Themedir/css/style.css">
</head>
<body>
<div class="navbar-fixed">
    <% include NavMain %>
</div>
<div id="page-wrapper">
    $Layout
</div>
<% include Footer %>
<script src="$Themedir/bower_components/jquery/dist/jquery.js"></script>
<script src="$Themedir/bower_components/materialize/dist/js/materialize.min.js"></script>
<script src="$Themedir/js/app.js"></script>

</body>
</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Vian Azis">
    <meta name="generator" content="Angka Terbilang">
    <title>Angka Terbilang</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>a,a:focus,a:hover{color:#fff}.btn-secondary,.btn-secondary:focus,.btn-secondary:hover{color:#333;text-shadow:none;background-color:#fff;border:.05rem solid #fff}body,html{height:100%;background-color:#333}body{display:-ms-flexbox;display:flex;color:#fff;text-shadow:0 .05rem .1rem rgba(0,0,0,.5)}.cover-container{max-width:42em}.masthead{margin-bottom:2rem}.masthead-brand{margin-bottom:0}.nav-masthead .nav-link{padding:.25rem 0;font-weight:700;color:rgba(255,255,255,.5);background-color:transparent;border-bottom:.25rem solid transparent}.nav-masthead .nav-link:focus,.nav-masthead .nav-link:hover{border-bottom-color:rgba(255,255,255,.25)}.nav-masthead .nav-link+.nav-link{margin-left:1rem}.nav-masthead .active{color:#fff;border-bottom-color:#fff}@media (min-width:48em){.masthead-brand{float:left}.nav-masthead{float:right}}.cover{padding:0 1.5rem}.cover .btn-lg{padding:.75rem 1.25rem;font-weight:700}.bd-placeholder-img{font-size:1.125rem;text-anchor:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}@media (min-width:768px){.bd-placeholder-img-lg{font-size:3.5rem}}.rounded{border-radius:10px!important}.bg-my{background-color:#fff!important;color:#333}.font-larger{font-size:1.5rem;font-weight:600}</style>
</head>

<body class="text-center">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead d-flex w-100 p-3 mx-auto flex-column">
            <div class="inner">
                <h3 class="masthead-brand">Vian Azis - Angka Terbilang</h3>
            </div>
        </header>

        <main role="main" class="inner cover my-auto py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="" method="post" id="terbilang">
                        <h1 class="cover-heading">Input Angka</h1>
                        <textarea autofocus cols="30" rows="10" type="text" name="input" id="input" class="d-flex border border-light rounded w-100 px-3 py-1 bg-my font-larger"></textarea>
                        <input type="text" name="angkaTerbilang" id="angkaTerbilang" class="d-none">
                        <p class="lead mt-3">
                            <button type="button" id="clean" class="btn btn-lg btn-secondary btn-block pt-0 pb-1 rounded">Clean</button>
                        </p>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="cover-heading">Output</h1>
                    <textarea disabled cols="30" rows="10" type="text" name="output" id="output" class="d-flex border border-light rounded w-100 px-3 py-1 bg-my font-larger"></textarea>
                    <button type="button" id="copy" class="btn btn-lg btn-secondary btn-block pt-0 pb-1 rounded mt-3">Copy</button>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>function formatRupiah(t,a){var e=(t=t.replace(/^0+/,"").toString()).replace(/[^,\d]/g,"").toString().split(","),n=e[0].length%3,l=e[0].substr(0,n),u=e[0].substr(n).match(/\d{3}/gi);return u&&(separator=n?".":"",l+=separator+u.join(".")),l=null!=e[1]?l+","+e[1]:l,null==a?l:l?""+l:""}$("#clean").click(function(){$("#input").val("").focus(),$("#output").html("").show()}),$("#copy").click(function(){var t=document.createElement("textarea");document.body.appendChild(t),t.value=$("#output").val(),t.select(),document.execCommand("copy"),document.body.removeChild(t)}),$("#input").keyup(function(){var t=$("#input").val().replace(/[^0-9\-]/,"");$("#input").val(t),$("#input").val(formatRupiah(this.value,"")),0==$("#input").val().length&&$("#input").val(0);var a=$("#input").val().replace(/\./g,"").toString();$("#angkaTerbilang").val(a),$.ajax({type:"POST",url:"./api/angkaTerbilang.php",data:$("#terbilang").serialize(),success:function(t){$("#output").html(t).show()}})});</script>
</body>

</html>
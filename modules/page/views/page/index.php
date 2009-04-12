<html>
<head>
<title>Welcome to <?php if(isset($cmsname)){ echo $cmsname; } else { echo "CodeIgniter"; } ?></title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<h1>Welcome to <?php if(isset($cmsname)){ echo $cmsname; } else { echo "CodeIgniter!"; } ?></h1>

<p>The page you are looking at is being generated dynamically by <?php if(isset($cmsname)){ echo $cmsname; } else { echo "CodeIgniter"; } ?>.</p>

<p>If you would like to edit this page you'll find it located at:</p>
<code>modules/page/views/page/index.php</code>

<p>The corresponding controller for this page is found at:</p>
<code>modules/page/controllers/page.php</code>

<p>You are viewing the <?php if(isset($classname)){ echo $classname; } else { echo "Frontend"; } ?> controller</p>

<p><br />Page rendered in {elapsed_time} seconds</p>

</body>
</html>
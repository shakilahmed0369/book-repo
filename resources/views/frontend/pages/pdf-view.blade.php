<!DOCTYPE html>
<html lang="en">

<head>
  <title>jQuery PDF.js Viewer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body style="margin: 0; overflow:hidden;">
  <div style="height: 100vh">
    <iframe height="100%" width=100% src='{{ asset('frontend/pdf-viewer/public/lib/web/viewer.html?file=').asset('storage/forntend/pdf/Code_Geass.pdf') }}'></iframe>
  </div>
</body>
</html>
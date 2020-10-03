<!DOCTYPE html>
<html>
<head>
<title>Hang Li PHP</title>
</head>
<body>
<h1>Hang Li PHP</h1>

<h1>Hello from webpage</h1>
<p>
<?php
echo "The SHA256 hash of 'Hang Li' is ";
print hash('sha256', 'Hang Li');
echo nl2br ("\n\nASCII ART\n");
//echo (str_repeat('&nbsp;', 4)). '**'.str_repeat('&nbsp', 4).'**';
echo "<pre>
    **    **
    **    **
    ********
    **    **
    **    **</pre>";
?>
</p>
<p>
<pre>
    **    **
    **    **
    ********
    **    **
    **    **
</pre>

</p>
</body>
</html>

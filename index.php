<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>parse url</title>
</head>
<body>
  <h1>Add Link</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" class="text-inp" name="youtube">
    <input type="submit" value="Youtube video"> <br>
    <input type="text" class="text-inp" name="facebook">
    <input type="submit" value="Facebook video"> <br>
    <div id="fb-root"></div>
  <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
</form>
</body>
</html>

<?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $youtube = $_POST["youtube"];
  if($_POST["youtube"] != ""){
  $parseVidY = (parse_url($youtube,PHP_URL_QUERY));
  $parseStrY = parse_str($parseVidY, $arrY);
  echo '<iframe src="https://www.youtube.com/embed/' . $arrY["v"] . '"></iframe>';}

  $facebook = $_POST["facebook"];
  if($_POST["facebook"] != ""){
  $parseVidF = (parse_url($facebook,PHP_URL_QUERY));
  $parseStrF = parse_str($parseVidF, $arrF);
  echo '<div class="fb-video" data-href="https://www.facebook.com/watch/?v=' . $arrF["v"] . '" data-width="1000"></div>';
  }
}
?>
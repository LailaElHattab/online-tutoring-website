<html>

<head>
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function showResult(str) {
      if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("livesearch").innerHTML = this.responseText;
          document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET", "livesearch.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
</head>

<body>
  <div class="container" id="searchContainer">
    <div class="col-md-4 col-md-offset-4">
      <div class="row">
        <div class="form-outline mb-4">
          <h2 class="search">Search:</h2>
        </div>
      </div>
      <form>

        <input type="text" size="30" onkeyup="showResult(this.value) " placeholder="Search...">
        <div class="result" id="livesearch"></div>
      </form>

</body>

</html>
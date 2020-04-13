<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajax Course</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Ajax Course</h2>

    <hr>

    <h4>Fetch text file</h4>
    <button id="button1" type="button" name="button">Get Text File</button>
    <br><br>
    <div id="text1">

    </div>

    <hr>

    <h4>Fetch JSON file</h4>
    <button id="button2" type="button" name="button">Get JSON File</button>
    <br><br>
    <div id="text2">

    </div>
    <div class="footer" style="background:darkgrey">
      <h5>Footer</h5>
    </div>


    <script type="text/javascript">
    // LOAD TEXT
      // Create event listener
      document.getElementById('button1').addEventListener('click', loadText);
      function loadText () {
        // Create XHR Object
        var xhr = new XMLHttpRequest();
        // OPEN - type, url/file, assync
        xhr.open('GET', 'text.txt', true);
        console.log('READYSTATE: ', xhr.readyState);
        xhr.onprogress = function() {
          console.log('Waiting...');
        }
        xhr.onload = function() {
          if(this.status == 200) {
            document.getElementById('text').innerHTML = this.responseText;
            console.log(this.responseText);
            console.log('READYSTATE: ', xhr.readyState);
          } else if (this.status == 404) {
            document.getElementById('text').innerHTML = 'Not found';
          }
        }
        xhr.onerror = function() {
          console.log('Request Error...');
        }
        // Sends reques
        xhr.send();
      }

      // LOAD JSON
      document.getElementById('button2').addEventListener('click', loadJSON);

      function loadJSON() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://api.github.com/users', true);
        xhr.onload = function() {
          if(this.status == 200) {
            console.log(this.responseText);
            var users = JSON.parse(this.responseText);
            output = '';
            for (var i in users) {
              output +=
                '<div class="user">' +
                '<img src="' + users[i].avatar_url + '" width="60" height="60">' +
                '<span>' + users[i].login + '</span>' +
                '</div>';
            }
            document.getElementById('text2').innerHTML = output;
          }
        }
        xhr.send();
      }



      // HTTP STATUSES
      // 200: OK
      // 403: FORBIDDEN
      // 404: NOT FOUND

    </script>
  </div>

</body>
</html>

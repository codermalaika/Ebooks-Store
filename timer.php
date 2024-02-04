<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Competition Start</title>
  <script src="js/index.js"></script>
  <style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Shrikhand&display=swap');

  body {
  padding: 20px;
  font-size: 60px;
  font-weight: bold;
  text-decoration: none;
  text-align: center;
  margin: 50px auto;
  background-color: black;
  
  }


div.front-page {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 32px;
    justify-content: center;
    text-align: center;
}

div.second-page {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 32px;
}

.note-area {
width: 80%;
height: 40vh;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 10px;
  resize: vertical;
}

.bg {
    background-color: white;
    color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: center;
    width: 20%;
    font-family:'Shrikhand', serif;
    font-size: 30px;
}

  </style>


</head>
<body>
  <div id="ten-countdown" style="color: white;"></div>

<script type="text/javascript">
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;
    function twoDigits( n )
    
    {return (n <= 9 ? "0" + n : n);}

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();


    function updateTimer()
    {
        msLeft = endTime - (+new Date);

        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }
}

countdown( "ten-countdown", 30, 0 );

</script>

<!----end-->

<div class="front-page">
    <h2 class="header" style="color: white;">NOW START YOUR ESSAY<BR> ALL THE BEST👍</h2>
        <textarea id="note" name="note-text" class="note-area"></textarea>
        <br>
        <button id="submit" onclick="saveNote()" class="bg">SUBMIT</button>
    
</div>

<script>
    var textElement = document.getElementById("note")
    
    function saveNote() {
        if(textElement.value == "") {
            return alert('Text is empty!')
        }
        const id = getNoteId()
        let noteObject = getExistingNotes()
        if(!noteObject){
            noteObject = {}
        }
        noteObject[id] = textElement.value
        localStorage.setItem('notes', JSON.stringify(noteObject))
        alert('Note Saved')
    }
    </script>
</body>
</html>

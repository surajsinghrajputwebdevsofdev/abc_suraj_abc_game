
      @include('layouts.app')

      <!DOCTYPE html>
      <html lang="en">
      
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Document</title>
          <style>
              .card {
                  margin-top: 2%;
                  margin-left: 30%;
                  width: 800px;
                  border-radius: 15px;
                  overflow: hidden;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.01);
              }
      
              .container {
                  padding: 20px;
                  border: 1px solid #ccc;
                  background-color: #fff;
              }
      
              .display {
                  width: 100%;
                  margin-bottom: 10px;
                  padding: 10px;
                  font-size: 1.5em;
                  border: 1px solid #ccc;
                  border-radius: 5px;
                  box-sizing: border-box;
              }
      
              .buttons {
                  display: grid;
                  grid-template-columns: repeat(4, 1fr);
                  gap: 5px;
              }
      
              .buttons button {
                  padding: 20px;
                  font-size: 1.6em;
                  border: none;
                  border-radius: 5px;
                  background-color: #eef11d;
                  color: #131212;
                  cursor: pointer;
              }
      
              .btn-warning {
                  font-family: Raleway-SemiBold;
                  font-size: 13px;
                  color: rgba(240, 173, 78, 0.75);
                  letter-spacing: 1px;
                  line-height: 15px;
                  border: 2px solid rgba(240, 173, 78, 0.75);
                  border-radius: 40px;
                  background: transparent;
                  transition: all 0.3s ease 0s;
                  height: 50px;
                  width: 180px;
              }
      
              .btn1-warning:hover {
                  color: #FFF;
                  background: rgba(49, 138, 255, 0.75);
                  border: 2px solid rgba(49, 138, 255, 0.75);
              }
      
      
              .btn1-warning {
                  font-family: Raleway-SemiBold;
                  font-size: 13px;
                  color: rgba(49, 138, 255, 0.75);
                  letter-spacing: 1px;
                  line-height: 15px;
                  border: 2px solid rgba(78, 135, 240, 0.75);
                  border-radius: 40px;
                  background: transparent;
                  transition: all 0.3s ease 0s;
                  height: 50px;
                  width: 180px;
              }
      
              .btn-warning:hover {
                  color: #FFF;
                  background: rgb(240, 173, 78, 0.75);
                  border: 2px solid rgba(240, 173, 78, 0.75);
              }
              
      
              .drop {
                  margin-top: 2%;
                  margin-left: 30%;
                  padding: 10px;
                  font-size: 25px;
                  border: none;
                  border-radius: 5px;
                  background-color: #ffffff;
                  width: 800px;
                 
              }
      
              .drop:hover {
                  background-color: #fffdfd;
              }
      
              .drop option {
                  padding: 10px;
                  border-bottom: 1px solid #ffffff;
              }
      
              .drop option:hover {
                  background-color: #ffffff;
              }
              
              .number-0 { color: #eef11d; }
        .number-1 { color: #f7f9fa;}
        .number-2 { color: #f7f9fa; }
        .number-3 { color: #313131; }
        .number-4 { color: #313131;; }
        .number-5 { color: #1e87d4;}
        .number-6 { color: #1e87d4; }
        .number-7 { color:  #ff4545; }
        .number-8 { color: #ff4545; }
        .number-9 { color: #eef11d; }
        .number-x { color: #eef11d; }
      .number-decrement { color: gray; } 
        
</style>

<body>

        <form method="POST" action="{{ route('enternumber') }}">
            @csrf

            <input hidden id="totalnumbers" name="totalnumbers" style="margin-left:60%;" value="">
    
        <ul class="drop">
            <li style="height: 50px;" id="terno" name="terno" value="">1.
                <input type="hidden" id="ternone" name="ternone" value="">
            </li>
            <li style="height: 50px;" id="tentwo" name="ternwo" value="">2.
                <input type="hidden" id="terntwo" name="terntwo" value="">
            </li>
            <li style="height: 50px;" id="terthree" name="ternhree" value="">3.
                <input type="hidden" id="ternthree" name="ternthree" value="">
            </li>
            <li style="height: 50px;" id="ternfor" name="tenfour" value="">4.
                <input type="hidden" id="ternfour" name="ternfour" value="">
            </li>
            <li style="height: 50px;" id="terfive" name="terfive" value="">5.
                <input type="hidden" id="ternfive" name="ternfive" value="">
            </li>
            <li style="height: 50px;" id="tersix" name="ternix" value="">6.
             <input type="hidden" id="ternsix" name="ternsix" value="">
            </li>
        </ul>
        <button type="submit"
         style="background-color: #1a1a1a; color:#FFF; margin-left:68%; height:40Px; width:100px; border-radius:
          40px; font-size: 18px;">Submit</button>
    </form>
    <div class="card">
        <div class="container">
            <svg style="margin-left: 70%; margin-top:1%;" width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 9V13M10 2H14M17.6569 7.34315L19 6M12 21C16.4183 21 20 17.4183 20 13C20 8.58172 16.4183 5 12 5C7.58172 5 4 8.58172 4 13C4 17.4183 7.58172 21 12 21Z"
                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <button type="button" class="btn btn-warning" id="totalButton" style="font-size: 1.2em;">Total:
                0</button>
            <button type="button" class="btn1 btn1-warning" id="timerDisplay" style="font-size: 1.2em;">Average: 3:00
            </button>
            <div class="buttons" style="margin-top: 2%">
                <button type="button" data-value="10">X</button>
                <button type="button" data-value="0">0</button>
                <button type="button" data-value="9">9</button>
                <button type="button" data-value="8" style="background-color: #ff4545;">8</button>
                <button type="button" data-value="7" style="background-color: #ff4545;">7</button>
                <button type="button" data-value="6" style="background-color: #1e87d4;">6</button>
                <button type="button" data-value="5" style="background-color: #1e87d4;">5</button>
                <button type="button" data-value="4" style="background-color: #313131; color: #f7f9fa;">4</button>
                {{-- <button type="button" data-value="" style="background-color: #f7f9fa;"></button> --}}
                <button type="button" data-value="3" class="operators" style="background-color: #313131; color: #f7f9fa;">3</button>
                <button type="button" data-value="2" class="operators" style="background-color: #f7f9fa;">2</button>
                <button type="button" data-value="1" class="operators" style="background-color: #f7f9fa;">1</button>
                <button type="button" data-value="-1" style="background-color: #f7f9fa;" id="decrement"><-</button>

                {{-- <button type="button" data-value="m" class="operators" style="background-color: #45a049;">M</button> --}}
             
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let total = 0;
            let currentListIndex = 0;
            let currentCount = 0;
            let currentSum = 0;
            const totalButton = document.getElementById('totalButton');
            const buttons = document.querySelectorAll('.buttons button');
            const timerDisplay = document.getElementById('timerDisplay');
            const nextButton = document.getElementById('nextButton');
            const listItems = document.querySelectorAll('.drop li');
            const hiddenInputs = document.querySelectorAll('.drop input');
            let timer;
            let Average = 180; 
            
        function updateTotal(value) {
        if (currentListIndex >= listItems.length) {
            return;
        }
        if (value === 'X') {
            total += 10;
        } else if (value === '-1') {
            total -= 1;
        } else if (!isNaN(value) && parseInt(value) < 36) {
            total += parseInt(value);
        }
        totalButton.textContent = 'Total = ' + total;
        totalnumbers.value = total;
    } 

            function updateList(value) {
                if (currentListIndex < listItems.length) {
                    if (currentCount < 6) {
                        let colorClass = getColorClass(value);
                        listItems[currentListIndex].innerHTML += `<span class="${colorClass}">${value}</span> `;
                        if (value !== 'X' && value !== '<-') {
                            currentSum += parseInt(value);
                        } else if (value === 'X') {
                            currentSum += 10;
                        } else if (value === '<-') {
                            currentSum -= 1;
                        }
                        currentCount++;
                        if (currentCount === 6) {
                            listItems[currentListIndex].innerHTML += `= ${currentSum}`;
                            hiddenInputs[currentListIndex].value = currentSum;
                            currentListIndex++;
                            currentCount = 0;
                            currentSum = 0;
                        }
                      inputField = listItems[currentListIndex].querySelector('input');
                         inputField.value += value + ',';
                    }
                }
            }
    
            function getColorClass(value) {
                switch(value) {
                    case '0': return 'number-0';
                    case '1': return 'number-1';
                    case '2': return 'number-2';
                    case '3': return 'number-3';
                    case '4': return 'number-4';
                    case '5': return 'number-5';
                    case '6': return 'number-6';
                    case '7': return 'number-7';
                    case '8': return 'number-8';
                    case '9': return 'number-9';
                    case 'X': return 'number-x';
                    case '<-': return 'number-decrement';
                    default: return '';
                }
            }

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const value = button.getAttribute('data-value');
                    updateTotal(value);
                    updateList(value);
                });
            });

            function disableButtons() {
                      buttons.forEach(button => {
                          button.disabled = true;
                      });
                  }
      
                  function enableButtons() {
                      buttons.forEach(button => {
                          button.disabled = false;
                      });
                  }

        function startTimer() {
                      timer = setInterval(() => {
                          if (Average <= 0) {
                              clearInterval(timer);
                          } else {
                              if (Average === 30) {
                                  disableButtons();
                              }
                              let minutes = Math.floor(Average / 60);
                              let seconds = Average % 60;
                              timerDisplay.textContent =
                                  `Average: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
                              Average--;
                          }
                      }, 1000);
                  }
      
                  startTimer();
              });
        
    </script>
</body>

</html> 






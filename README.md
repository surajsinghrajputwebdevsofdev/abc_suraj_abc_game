<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

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
            style="background-color: #1a1a1a; color:#FFF; margin-left:68%; height:40Px; width:100px; border-radius: 40px; font-size: 18px;">
            Submit
        </button>
    </form>
    <div class="card">
        <div class="container">
            <svg style="margin-left: 70%; margin-top:1%;" width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 9V13M10 2H14M17.6569 7.34315L19 6M12 21C16.4183 21 20 17.4183 20 13C20 8.58172 16.4183 5 12 5C7.58172 5 4 8.58172 4 13C4 17.4183 7.58172 21 12 21Z"
                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <button type="button" class="btn btn-warning" id="totalButton" style="font-size: 1.2em;">Total: 0</button>
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
                <button type="button" data-value="3" class="operators" style="background-color: #313131; color: #f7f9fa;">3</button>
                <button type="button" data-value="2" class="operators" style="background-color: #f7f9fa;">2</button>
                <button type="button" data-value="1" class="operators" style="background-color: #f7f9fa;">1</button>
                <button type="button" data-value="-1" style="background-color: #f7f9fa;" id="decrement"><-</button>
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
            const listItems = document.querySelectorAll('.drop li');
            const hiddenInputs = document.querySelectorAll('.drop input');
            let timer;
            let average = 180;

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
                document.getElementById('totalnumbers').value = total;
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
                        const inputField = listItems[currentListIndex].querySelector('input');
                        inputField.value += value + ',';
                    }
                }
            }

            function getColorClass(value) {
                switch (value) {
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
                    if (value === '-1') {
                        decrementNumber();
                    } else {
                        updateTotal(value);
                        updateList(value);
                    }
                });
            });

            function decrementNumber() {
                if (currentCount > 0) {
                    const lastValue = listItems[currentListIndex].querySelector('span:last-child').textContent.trim();
                    currentSum -= parseInt(lastValue);
                    currentCount--;
                    listItems[currentListIndex].querySelector('span:last-child').remove();
                } else if (currentListIndex > 0) {
                    currentListIndex--;
                    const lastValue = listItems[currentListIndex].querySelector('span:last-child').textContent.trim();
                    currentSum = parseInt(hiddenInputs[currentListIndex].value);
                    currentCount = 5;
                    listItems[currentListIndex].querySelector('span:last-child').remove();
                    hiddenInputs[currentListIndex].value = currentSum - parseInt(lastValue);
                }
                total -= parseInt(lastValue);
                totalButton.textContent = 'Total = ' + total;
                document.getElementById('totalnumbers').value = total;
            }

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



--------------------------------------------------------------------------------------------------------------------------------------

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

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
            style="background-color: #1a1a1a; color:#FFF; margin-left:68%; height:40Px; width:100px; border-radius: 40px; font-size: 18px;">
            Submit
        </button>
    </form>
    <div class="card">
        <div class="container">
            <svg style="margin-left: 70%; margin-top:1%;" width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 9V13M10 2H14M17.6569 7.34315L19 6M12 21C16.4183 21 20 17.4183 20 13C20 8.58172 16.4183 5 12 5C7.58172 5 4 8.58172 4 13C4 17.4183 7.58172 21 12 21Z"
                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <button type="button" class="btn btn-warning" id="totalButton" style="font-size: 1.2em;">Total: 0</button>
            <button type="button" class="btn1 btn1-warning" id="timerDisplay" style="font-size: 1.2em;">Average: 3:00
            </button>
            <div style="margin-top: 2%; margin-bottom: 2%;">
                <label for="hours">Hours:</label>
                <input type="number" id="hours" min="0" max="23" value="0">
                <label for="minutes">Minutes:</label>
                <input type="number" id="minutes" min="0" max="59" value="3">
                <label for="seconds">Seconds:</label>
                <input type="number" id="seconds" min="0" max="59" value="0">
                <button type="button" id="setTimer">Set Timer</button>
            </div>
            <div class="buttons" style="margin-top: 2%">
                <button type="button" data-value="10">X</button>
                <button type="button" data-value="0">0</button>
                <button type="button" data-value="9">9</button>
                <button type="button" data-value="8" style="background-color: #ff4545;">8</button>
                <button type="button" data-value="7" style="background-color: #ff4545;">7</button>
                <button type="button" data-value="6" style="background-color: #1e87d4;">6</button>
                <button type="button" data-value="5" style="background-color: #1e87d4;">5</button>
                <button type="button" data-value="4" style="background-color: #313131; color: #f7f9fa;">4</button>
                <button type="button" data-value="3" class="operators" style="background-color: #313131; color: #f7f9fa;">3</button>
                <button type="button" data-value="2" class="operators" style="background-color: #f7f9fa;">2</button>
                <button type="button" data-value="1" class="operators" style="background-color: #f7f9fa;">1</button>
                <button type="button" data-value="-1" style="background-color: #f7f9fa;" id="decrement"><-</button>
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
        const listItems = document.querySelectorAll('.drop li');
        const hiddenInputs = document.querySelectorAll('.drop input');
        const hoursInput = document.getElementById('hours');
        const minutesInput = document.getElementById('minutes');
        const secondsInput = document.getElementById('seconds');
        const setTimerButton = document.getElementById('setTimer');
        let timer;

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
                    let inputField = listItems[currentListIndex].querySelector('input');
                    inputField.value += value + ',';
                }
            }
        }

        function getColorClass(value) {
            switch (value) {
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

        function decrementNumber() {
            if (currentCount > 0) {
                const lastValue = listItems[currentListIndex].querySelector('span:last-child');
                const value = lastValue.textContent.trim();
                if (value === 'X') {
                    currentSum -= 10;
                } else if (value === '<-') {
                    currentSum += 1;
                } else {
                    currentSum -= parseInt(value);
                }
                lastValue.remove();
                currentCount--;
                total -= parseInt(value);
                totalButton.textContent = 'Total = ' + total;
                totalnumbers.value = total;
            } else if (currentListIndex > 0) {
                currentListIndex--;
                const values = listItems[currentListIndex].querySelectorAll('span');
                currentSum = 0;
                currentCount = 0;
                values.forEach(valueSpan => {
                    const value = valueSpan.textContent.trim();
                    if (value === 'X') {
                        currentSum += 10;
                    } else if (value !== '<-') {
                        currentSum += parseInt(value);
                    }
                    currentCount++;
                });
                listItems[currentListIndex].innerHTML = listItems[currentListIndex].innerHTML.split('=')[0];
                hiddenInputs[currentListIndex].value = '';
            }
        }

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const value = button.getAttribute('data-value');
                if (value === '-1') {
                    decrementNumber();
                } else {
                    updateTotal(value);
                    updateList(value);
                }
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

        function startTimer(hours, minutes, seconds) {
            let totalTime = (hours * 3600) + (minutes * 60) + seconds;

            timer = setInterval(() => {
                if (totalTime <= 0) {
                    clearInterval(timer);
                } else {
                    if (totalTime === 30) {
                        disableButtons();
                    }
                    let displayHours = Math.floor(totalTime / 3600);
                    let displayMinutes = Math.floor((totalTime % 3600) / 60);
                    let displaySeconds = totalTime % 60;
                    timerDisplay.textContent = `Timer: ${displayHours}:${displayMinutes < 10 ? '0' + displayMinutes : displayMinutes}:${displaySeconds < 10 ? '0' + displaySeconds : displaySeconds}`;
                    totalTime--;
                }
            }, 1000);
        }

        setTimerButton.addEventListener('click', () => {
            const hours = parseInt(hoursInput.value) || 0;
            const minutes = parseInt(minutesInput.value) || 0;
            const seconds = parseInt(secondsInput.value) || 0;
            startTimer(hours, minutes, seconds);
        });
    });
</script>



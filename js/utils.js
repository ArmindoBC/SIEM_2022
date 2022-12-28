function validateDate() {

  var date_ini = document.forms['date-form']['date-ini'].value;
  var date_end = document.forms['date-form']['date-end'].value;
  var error_message = document.getElementById('error-message');

  if (date_ini != '' && date_end != '' && date_ini > date_end) {
    error_message.innerHTML = "The final date needs to be after the initial one";
    return false;
  } else if (date_ini == '' || date_end == '') {

    error_message.innerHTML = "One of the dates is empty";
    return false;
  }

  return true;
}

//example of the password strenght
function validatePassword(password) {

  var out_div = document.getElementById("out-div");
  var in_div = document.getElementById("in-div");
  var msg = document.getElementById("msg");

  if (password.length == 0) {
    out_div.style.display = 'none';

  } else {
    out_div.style.display = 'block';
  }

  //Way to validate if the password contains the several types of characters
  //Search more about Regular expressions
  var matchedCase = new Array();
  matchedCase.push("[$@$!%*#?&~^´`«»º ª|]"); // Special Characters
  matchedCase.push("[A-Z]"); // Uppercase Alpabates
  matchedCase.push("[0-9]"); // Numbers
  matchedCase.push("[a-z]"); // Lowercase Alphabates

  var ctr = 0;

  //Loop to validate which regular expressions match
  //When the regular expression matches it means that the password has that type of character
  //You see it using the test method-
  for (var i = 0; i < matchedCase.length; i++) {
    if (new RegExp(matchedCase[i]).test(password)) {
      ctr++;
    }

  }

  var msg_text = '';
  var width = '';
  var color = '';
  //Switch case to attribute a color and width to the progress bar
  switch (ctr) {
    case 1:
      msg_text = 'Muito Fraco';
      width = '25%';
      color = 'red';
      break;
    case 2:
      msg_text = 'Fraco';
      width = '50%';
      color = 'orange';
      break;
    case 3:
      msg_text = 'Moderada';
      width = '75%';
      color = 'yellow';
      break;
    case 4:
      msg_text = 'Forte';
      width = '100%';
      color = 'green';
      break;

  }

  //Assign the values
  msg.innerHTML = msg_text;
  msg.style.color = color;
  in_div.style.width = width;
  in_div.style.backgroundColor = color;


}

function serverRequest() {

  var name = document.forms['greeting']['name'].value;
  var greeting = document.forms['greeting']['greeting'].value;
  //this creates a XML request (Object)
  var xhttp = new XMLHttpRequest();
  //Create a function that will run everytime the request changes its state

  // ReadyState:
  // 0  UNSENT
  // 1 OPENED - the method OPEN was called
  // 2 HEADERS_RECIEVED method send was called and the request headers are available
  // 3 Loading
  // 4 DONE - the request ended

  xhttp.onreadystatechange = function() {
    //STATUS:
    // 200: OK
    // 300: Forbidden - no credentials to access
    // 40X -erros 404 - page not found

    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("greeting-section").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "getGreeting.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("name=" + name + "&greeting=" + greeting);
}

function loadChart() {

  //AJAX request

  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "../database/salesService.php", true);
  xhttp.send();

  //CREATE or Load data into the chart
  xhttp.onreadystatechange = function() {
    //STATUS:
    // 200: OK
    // 300: Forbidden - no credentials to access
    // 40X -erros 404 - page not found
    if (this.readyState == 4 && this.status == 200) {
      var labels = JSON.parse(this.responseText)['labels'];
      var data = JSON.parse(this.responseText)['data'];

      new Chart(document.getElementById("chart-sales"), {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#3e95cd"],
            data: data
          }]
        },
        options: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: 'Sales Per Month '
          }
        }
      });
    }


  };

}

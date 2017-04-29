import $ from 'jquery';

// request example

function restCall() {
  $.ajax({
    url: 'http://localhost:8000/foo'
  })
  .done((data) => {
    // do something
  })  
}

restCall();

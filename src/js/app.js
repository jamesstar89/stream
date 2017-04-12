import React from 'react';
import { render } from 'react-dom';
import $ from 'jquery';

function restCall() {
  $.ajax({
    url: 'http://localhost:8000/foo'
  })
  .done((data) => {
    renderButton(data.name);
  })  
}

function renderButton(name) {
  render(<PrimaryButton name={name} />, document.getElementById('something'));
}

class PrimaryButton extends React.Component {
  render () {
    return (
    <button className={this.props.className}>{this.props.name}</button>
    );
  }
}

restCall();

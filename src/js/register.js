import React from 'react';
import { Link } from 'react-router-dom';

class Register extends React.Component {
  render () {
    return (
      <div>
        <h1>Register page</h1>
        <ul>
          <li><Link to="/">Home</Link></li>
          <li><Link to="/posts">Posts</Link></li>
          <li><Link to="/register">Register</Link></li>
        </ul>
      </div>
    );
  }
}

export default Register;

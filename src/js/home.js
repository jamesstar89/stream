import React from 'react';
import { Link } from 'react-router-dom';

class Home extends React.Component {
  render () {
    return (
      <div>
        <h1>Home page</h1>
        <ul>
          <li><Link to="/">Home</Link></li>
          <li><Link to="/posts">Posts</Link></li>
          <li><Link to="/register">Register</Link></li>
        </ul>
      </div>
    );
  }
}

export default Home;

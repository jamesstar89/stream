import React from 'react';
import { HashRouter as Router, Route } from 'react-router-dom';

import Home from './home';
import Posts from './posts';
import Register from './register';

export default (
  <Router>
    <div>
      <Route exact path="/" component={Home} />
      <Route path="/posts" component={Posts} />
      <Route path="/register" component={Register} />
    </div>
  </Router>
);
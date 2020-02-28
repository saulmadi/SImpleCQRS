import React, { Component } from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import { Container } from 'semantic-ui-react';


import Navbar from './NavBar';

import Home from './Home';

import Orders from './Orders';

import FormOrder from './FormOrder';


class App extends Component {
  render() {
    return (
        <Router>
            <Navbar />
            <Container text style={{ marginTop: '7em' }}>
                <Route path="/" exact component={Home} />
                <Route path="/orders" component={Orders} />
                <Route path="/create-orders" component={FormOrder} />
                <Route path="/update-orders/:orderId" component={FormOrder} />
            </Container>
      </Router>
    );
  }
}

export default App
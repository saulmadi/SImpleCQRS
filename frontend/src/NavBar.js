import React, { Component } from 'react';

import { Container, Menu } from 'semantic-ui-react';

class Navbar extends Component {
       


  render() {
    return (
      <div>
        <Menu fixed="top" inverted>
          <Container>
            <Menu.Item as="a" header href="/">
              Home
            </Menu.Item>
            {<Menu.Item id="orders-button" as="a" href="/orders">Orders</Menu.Item>}
           </Container>
        </Menu>
      </div>
    );
  }
}

export default Navbar;
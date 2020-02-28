import React, { Component } from 'react';
import { Header, Message, Table, Button } from 'semantic-ui-react';

import { API_BASE_URL } from './Config'

class Orders extends Component {

    constructor(props) {
        super(props);
        this.state = {
            orders: null,
            isLoading: null
        };
    }

    componentDidMount() {
        this.getOrders();
    }

    async getOrders() {
        if (! this.state.orders) {
            try {
                this.setState({ isLoading: true });
                 const response = await fetch(API_BASE_URL + '/orders', {
                    headers: {

                    },
                });
                const ordersData = await response.json();
                this.setState({ orders: ordersData.data, isLoading: false});
            } catch (err) {
                this.setState({ isLoading: false });
                console.error(err);
            }
        }
    }

    render() {
        return (
            <div>
                <div>
                <Header as="h1">Orders</Header>
                <Button  floated='right' primary onClick={()=>{this.props.history.push('/create-orders')}}>Create order</Button>
           


                </div>
                
                {this.state.isLoading && <Message info header="Loading orders..." />}
                {this.state.orders &&

                    <div>
                        
                        <Table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Client Address</th>
                                    <th>Client Phone</th>
                                    <th>Client Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            {this.state.orders.map(
                                    order =>
                                        <tr id={order.id} key={order.id}>
                                            <td>{order.id}</td>
                                            <td>{order.clientName}</td>
                                            <td>{order.clientAddress}</td>
                                            <td>{order.clientPhone}</td>
                                            <td>{order.clientEmail}</td>
                                            <td>
                                                Action buttons placeholder
                                            </td>
                                        </tr>
                            )}
                            </tbody>
                        </Table>
                    </div>
                }
            </div>
        );
    }

};

export default Orders;
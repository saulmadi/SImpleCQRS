import React, { Component } from 'react';
import { Button, Form, Message } from 'semantic-ui-react'

import { API_BASE_URL } from './Config'


class CreateForm extends Component {

    constructor(props) {
        super(props);

        this.state = {
            clientName: '',
            clientAddress: '',
            clientPhone: '',
            clientEmail: '',
            errorMessage: '',
            error: false,
            errorFields: {},
            isLoading: false
        }
        this.handleChange = this.handleChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    handleChange(e) {
        let field = e.target.name;
            let value = e.target.value;
        this.setState({[field]: value})
    }

    async onSubmit(e) {
        e.preventDefault();
        this.setState({
            isLoading: true,
            error: false,
            errorFields: {},
            errorMessage: ''
        });

        const response = await fetch(API_BASE_URL + '/orders', {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
                Accept: 'application/json'
            },
            body: JSON.stringify({
                "clientName": this.state.clientName,
                "clientAddress": this.state.clientAddress,
                "clientEmail": this.state.clientEmail,
                "clientPhone": this.state.clientPhone
            })
        });
        const r = await response.json();

        if (r.errors) {
            this.setState({
                isLoading: false,
                error: true,
                errorMessage: r.message,
                errorFields: r.errors
            });
        } else {
            this.setState({
                name: '',
                isLoading: false,
                error: false,
                errorMessage: '',
                errorFields: {}
            });

            this.props.history.goBack();
        }
        
    }


    render(){
        return (

            <Form error={this.state.error} onSubmit={this.onSubmit}>
            <Form.Field error={this.state.errorFields.clientName}>
                <label>Client Name:</label>
                <input placeholder='enter client name' 
                name="clientName" 
                value={this.state.clientName} 
                onChange={this.handleChange}/>
            
            { this.state.errorFields.clientName &&
            <Message size='mini'
                error
               
                content={this.state.errorFields.clientName[0]}
            />
            }

           
            </Form.Field>

            <Form.Field error={this.state.errorFields.clientAddress}>
                <label>Client Address:</label>
                <input placeholder='enter client address' 
                name="clientAddress" 
                value={this.state.clientAddress}
                type="text" 
                onChange={this.handleChange}/>
            { this.state.errorFields.clientAddress &&
            <Message size='mini'
            error
              content={this.state.errorFields.clientAddress[0]}
            />
            }
           
            </Form.Field>


            <Form.Field error={this.state.errorFields.clientEmail}>
                <label>Client Email:</label>
                <input placeholder='enter client email' 
                name="clientEmail" 
                value={this.state.clientEmail}
                type="text" 
                onChange={this.handleChange}/>

            { this.state.errorFields.clientEmail &&
             <Message size='mini'
             error
              content={this.state.errorFields.clientEmail[0]}
            />
            }

           
            </Form.Field>

            <Form.Field error={this.state.errorFields.clientPhone}>
                <label>Client phone:</label>
                <input placeholder='enter client phone' 
                name="clientPhone" 
                value={this.state.clientPhone}
                type="text" 
                onChange={this.handleChange}/>

            { this.state.errorFields.clientPhone &&
             <Message size='mini'
             error
               content={this.state.errorFields.clientPhone[0]}
            />
            }

           
            </Form.Field>

           
            <Button type='submit' loading={this.state.isLoading} primary>Add Order</Button>
            <Button  loading={this.state.isLoading} onClick={()=>{   this.props.history.goBack(); }} color="red"> Cancel </Button>
        </Form>
        );
    }

}

export default CreateForm;

## Simple CQRS

This application is an small implementation of the [CQRS Pattern](https://martinfowler.com/bliki/CQRS.html).

It handles a Sales domain in the laravel backend, you can see  Commands, Events, Entities, Repository, Command/EventHandlers in the folder [/App/Domain/Sales](https://github.com/saulmadi/SImpleCQRS/tree/master/app/Domain/Sales). 
Also use some basic implementation for [Common](https://github.com/saulmadi/SImpleCQRS/tree/master/app/Common) objects that I create in other projects like CommandBus, EventDispatcher, Repository, AggregateRoot. 

# Frontend

The frontend is a simple react app that lives in the [Frontend](https://github.com/saulmadi/SImpleCQRS/tree/master/frontend) directory, created with [Create React App](https://create-react-app.dev/) boilerplate

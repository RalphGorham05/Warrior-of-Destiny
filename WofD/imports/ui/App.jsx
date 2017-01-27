import React, { Component } from 'react';
 
// App component - represents the whole app
export default class App extends Component 
{

  render() {
    return (
      <div className="container">
        <header>
          <h1 id = 'header'>Warrior of Destiny</h1>
        </header>
 
        <ul>
          <li><a class="btn btn-primary btn-lg" href="#" role="button">Join the Warrior Ranks</a></li>
          <li><a class="btn btn-primary btn-lg" href="#" role="button">Continued Saved Game</a></li>
          <li><a class="btn btn-primary btn-lg" href="#" role="button">Help</a></li>
        </ul>      
      </div>
    );
  }
}
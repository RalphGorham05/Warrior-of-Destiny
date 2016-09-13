import { Template } from 'meteor/templating';
import { ReactiveVar } from 'meteor/reactive-var';

import './main.html';


var Animal = new Class({
    initialize: function(age){
        this.age = age;
        Animal.prototype.testFunction = function (){
          alert('testing2');
        }
    }
});
var Cat = new Class({
    Extends: Animal,
    initialize: function(name, age){
        this.parent(age); // calls initalize method of Animal class
        this.name = name;
    }
});



Template.mainBox.events({
  'click': function(event, template) {

  	event.preventDefault();

    var myCat = new Cat('Micia', 20);
    alert(myCat.name); // alerts 'Micia'.
    alert(myCat.age); // alerts 20.
    myCat.testFunction();
  }
});

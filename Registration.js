function validate()

{

            var first= document.forms["myform"]["fname"].value;

            var last= document.forms["myform"]["lname"].value;

var date= document.forms["myform"]["date"].value;

            var email= document.forms["myform"]["email"].value;

            var phone= document.forms["myform"]["phone"].value;

            var gender= document.forms["myform"]["gender"].value;

            var address = document.forms["myform"]["address"].value;

            var state= document.forms["myform"]["state"].value;

            

// first name validation

if(first == "")

            {

alert("enter the name");

            return false;

            }

if(!isNaN(first))

            {

            alert("name should be in character");

            return false;

            }

//last name validation

if(last == "")

            {

            alert("enter the last name");

            return false;  }

if(!isNaN(last))

            {

            alert("name should be in character");

            return false;

            }

// DOB validation

if(date == "")

            {

            alert("enter date");

            return false;

            }

// email validation

var at = email.indexOf("@");

var dot = email.lastIndexOf(".");

if(at<1||dot<at+2||dot+2 >= email.lenght)

            {

            alert("Not a valid email");

            return false;

            }

//phone no. validation

if(phone == "")

            {

alert("enter phone no.");

return false;}

if(isNaN(phone))

            {

            alert("phone no. should be in digit.");

            return false;

            }

if( phone.length != 10)

{

            alert("must be 10 digit no.");

            return false;

            }

//gender radio validation

if(gender=="")

{

alert("select a gender");

return false;

}

// address validation

if(address == "")

            {

            alert("Enter Address");

            return false;

            }

// state validation

if(state=="Select a state")

            {

            alert("select a state");

            return false;

            }

// hobbies validation

if(!hobby.checked)

            {

            alert("select a hobby");

            return false;

            }

}

document.getElementById("register").addEventListener("click", function(){
  var email=document.getElementById("email").value;  
  var password =document.getElementById("password").value;  
  var city =document.getElementById("city").value;  
  var street =document.getElementById("street").value;  
  var phone =document.getElementById("phone").value;  
  var fname =document.getElementById("fname").value;  
  var lname =document.getElementById("lname").value;  
   

  auth.createUserWithEmailAndPassword(email, password).then(cred => {
   
   
   var errorCode = error.code;
   var errorMessage = error.message;
   console.log(errorMessage);
   
  });

  var user = firebase.auth().currentUser;
  var id=user.uid;
  var str="http://localhost/firebaseWebLogin/newuser.php?id="+io;
  //window.alert(str);
  window.location.replace(str);


  
});

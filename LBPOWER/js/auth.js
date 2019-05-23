var id;

var config = {
    apiKey: "AIzaSyDlGs_wsl8JiMzUlpLBkiz1SUiWhxuAddM",
    authDomain: "electrofe-7d33b.firebaseapp.com",
    databaseURL: "https://electrofe-7d33b.firebaseio.com",
    projectId: "electrofe-7d33b",
    storageBucket: "electrofe-7d33b.appspot.com",
    messagingSenderId: "809041229097"
  };
  firebase.initializeApp(config);
  const auth = firebase.auth();
  firebase.auth().onAuthStateChanged(function(user) {
     var user = firebase.auth().currentUser;
     
 
      if(user != null){ 
        id=user.uid;
       // window.alert("success "+id);
      
        ////TODO: TESTING PURPPOSE MUST BE REMOVED UPON FINISH
        
    } else {
      location.replace("http://localhost/final/LBPOWER/");
    }
  });

  function logout(){
    firebase.auth().signOut();


    var str="http://localhost/final/LBPOWER/client/destroy.php"
      //window.alert(str);
      window.location.replace(str);
    
  }


  function update(){
    
//     var email=document.getElementById("email").value;  
//     var user = firebase.auth().currentUser;

// user.updateEmail(email).then(function() {
//  window.alert("Success");
// }).catch(function(error) {
//   var errorMessage = error.message;
//   window.alert("Error : " + errorMessage);
// });
    
  }
  function pay(id)
  {
  

    // $.ajax({

    //   type: "GET",
    //   url: 'getid.php',
    //   data: "id=" + id, // appears as $_GET['id'] @ your backend side
    //   success: function(data) {
    //         // data is ur summary
    //        $('#df').html(data);
    //   }
 
    // });
   /// var paymodal=document.getElementById("pay").value; 

  //  document.getElementById("d").value=id;
  //  document.getElementById("d").style.display=none;
           
  var xhr = new XMLHttpRequest();

  xhr.DONE = function () {

    window.alert(this.responseText);
  var s = this.responseText;
  document.getElementById("df").innerHTML=s;
    
  };
  xhr.open("POST", 'getid.php', true);

  //Send the proper header information along with the request
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("id="+id);
  
  
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//       if (this.readyState == 4 && this.status == 200) {
  
//         var s = this.responseText;
      
// document.getElementById("df").innerHTML=s;     
// //document.getElementById("pays").click();  
//       }
//     };
//     xhttp.open("POST", "getid.php", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("id="+id);
    //method click modal


  }
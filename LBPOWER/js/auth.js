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

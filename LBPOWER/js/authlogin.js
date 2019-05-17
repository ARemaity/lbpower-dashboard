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
     
  //$.post( "test.php", { id: io } );
  //
      if(user != null){ 
        id=user.uid;
        window.alert("success "+io);////TODO: TESTING PURPPOSE MUST BE REMOVED UPON FINISH
        
    } else {
     
    }
  });

  function logout(){
    firebase.auth().signOut();
    location.replace("http://localhost/final/LBPOWER/");
  }


function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }


  function closeNav2() {
    document.getElementById("myNav").style.height = "0%";
  }

  function openset() { 
    document.getElementById("set").style.display = "block";
  }     

  function openset_img() { 
    document.getElementById("setimg").style.display = "block";
  } 
  


  function open_log() { 
    document.getElementById("log").style.display = "block";
  } 
  
  function open_d_user() { 
    document.getElementById("d_user").style.display = "block";
  } 


  function  close0(){
    document.getElementById("d_user").style.display  = "none";
    document.getElementById("set").style.display = "none";
    document.getElementById("setimg").style.display = "none";
    document.getElementById("log").style.display = "none";
  
  }



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
    close0();
    document.getElementById("set").style.display = "block";
  }     

  function openset_img() { 
    close0();
    document.getElementById("setimg").style.display = "block";
  } 
  


  function open_log() { 
    close0();
    document.getElementById("log").style.display = "block";
  } 
  
  function open_d_user() { 
    close0();
    document.getElementById("d_user").style.display = "block";
  } 


  function  close0(){
    document.getElementById("d_user").style.display  = "none";
    document.getElementById("set").style.display = "none";
    document.getElementById("setimg").style.display = "none";
    document.getElementById("log").style.display = "none";
  
  }



  function open_updir() { 
    close1();
    document.getElementById("updir").style.display = "block";
  } 
  function open_upfile() { 
    close1();
    document.getElementById("upfile").style.display = "block";
  } 
  function close1(){
    document.getElementById("updir").style.display = "none";
    document.getElementById("upfile").style.display = "none";
  }

 


  function o_music() {
    close2();
    close1();
    close3();
    document.getElementById("music").style.display = "block";
  } 
  function o_photos() {
    close2();
    close1();
    close3();
    document.getElementById("photos").style.display = "block";
  } 
  function close2(){
    document.getElementById("music").style.display = "none";
    document.getElementById("photos").style.display = "none";

  }
  function close3(){
    document.getElementById("updir_img").style.display = "none";
    document.getElementById("upfile_img").style.display = "none";

  }
  function o_file_img() { 
    close3();
    document.getElementById("upfile_img").style.display = "block";
  } 
  function o_updir_img() { 
    close3();
    document.getElementById("updir_img").style.display = "block";
 
  } 
  function loader1(){ 
    document.getElementById("loader").style.display = "block";
  } 
var x = document.getElementById("myAudio");
document.getElementById("play").style.display = "block";
document.getElementById("pause").style.display = "none";
document.getElementById("myRange").style.display = "none";
document.getElementById("speaker").style.display = "block";
var queue=[];
var  song_q;

function print_q(){
  var queue_d="";
  for (i = 0; i < queue.length ; i++) {
    queue_d += queue[i] + "<br>";
  }
  document.getElementById("song_queue").innerHTML=queue_d;
}

var slider = document.getElementById("myRange");
var speaker = document.getElementById("speaker");
var slider_c_time = document.getElementById("c_time");
var c_time = x.currentTime;
var devise = document.getElementById("speaker_m");
var devise_div = document.getElementById("speaker_devise");

speaker.onmouseover= function(){
  document.getElementById("speaker").style.display = "none";
  document.getElementById("myRange").style.display = "block";
 
}
slider.onmouseout= function(){
  document.getElementById("myRange").style.display = "none";
  document.getElementById("speaker").style.display = "block";
}


setCurTime();
slider_c_time.oninput = function(){
  x.currentTime=this.value;
}

x.volume=slider.value/100;
slider.oninput = function(){
  x.volume=this.value/100;
}

function playAudio() { 
    x.currentTime=getCurTime();
    document.getElementById("song_n").innerHTML=song_q;

    document.getElementById("pause").style.display = "block";
    document.getElementById("play").style.display = "none";
    x.play(); 
   
  }


  function play_next_bt(){
    setCurTime();
    playnext();
  }

function playnext(){
  if(x.currentTime== 0 || x.currentTime==getduration()){
    song_q=queue.shift();
    x.src = "Media_Library/music/"+ song_q;
    playAudio();
  }
} 


function start(){
  var d=getduration();
 if(d>0){
  autoplay_f();
  console.log(d);
}
  document.getElementById("player_div").style.display = "block";
  setInterval(up_time_val, 1000);
}

function up_time_val(){
  slider_c_time.value=getCurTime();
  var intvalue = Math.trunc( getduration()/60 );
  var intsec= Math.trunc( getduration())-intvalue*60; 
  
  var min= Math.trunc( getCurTime()/60);
  var sec = Math.trunc( getCurTime())- min*60; 

  document.getElementById("e_time").innerHTML=intvalue;
  document.getElementById("sec_time").innerHTML=intsec;

  document.getElementById("s_time").innerHTML=min;
  document.getElementById("sec_time_s").innerHTML=sec;
  print_q();
  if(queue.length !=0){
    playnext();
  }
}

function pauseAudio() { 
  x.pause(); 
  document.getElementById("play").style.display = "block";
  document.getElementById("pause").style.display = "none";


} 

function autoplay_f(){
  x.autoplay = true;
  x.load();
  playAudio();
}
function getCurTime(){ 
return x.currentTime;
} 

function getduration(){ 
  var y = document.getElementById("myAudio").duration;
  document.getElementById("c_time").max=y;
  return y;
} 

function setCurTime(){ 
  x.currentTime=0;
}




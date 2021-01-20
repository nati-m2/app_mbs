function validation(){
    var name= document.getElementById("name").value;
    var password=document.getElementById("pass").value;
    var password2=document.getElementById("pass2").value;
    if(name==''){
        document.getElementById("result").innerHTML="נא למלא שדות חובה";
        document.getElementById("name").style.borderColor="red";
        
        return false;
    }

    else if( password==''){
        document.getElementById("result").innerHTML="נא למלא שדות חובה";
        document.getElementById("pass").style.borderColor="red";
        return false;
    }
      else if(password2==''){
        document.getElementById("result").innerHTML="נא למלא שדות חובה";
        document.getElementById("pass2").style.borderColor="red";
        return false;
      }
      

    if(name.length<5){
        document.getElementById("result").innerHTML="שם משתמש חייב להכיל לפחות 5 תווים";
        document.getElementById("name").style.borderColor="red";
        return false;}

        else if(!user(name)){
            document.getElementById("result").innerHTML="שם משתמש לא יכול להתחיל במיספר"
            document.getElementById("name").style.borderColor="red";
            return false;
    }
   
  
    document.getElementById("name").style.borderColor="green";
    if(!validpass('pass'))
    {
        return false;
    }
    else if(!checkpass('pass,pass2'))
    {
        return false;
    }
   
   else if(!le(name)){
    document.getElementById("name").style.borderColor="red";
    document.getElementById("result").innerHTML="קלט לא חוקי";
    return false;
   }
    else{
        
        document.getElementById("name").style.borderColor="green";
        return true;
    }
}


function validpass()
    {
        var password=document.getElementById("pass").value;
        var capital=0;
        var lower=0;
        var num=0;
        if(password.length<8)
        {
            document.getElementById("result").innerHTML="הסיסמה חייבת להיות 8 תווים לפחות ותכלול לפחות אות אחת גדולה וקטנה באנגלית ומיספר אחד"
            document.getElementById("pass").style.borderColor="red";
            return false;
        }
        else 
        {
            for(i=0;i<password.length;i++)
            {
                if(password[i]>='A'&&password[i]<='Z')
                {
                    capital+=1
                }
                if(password[i]>='a'&&password[i]<='z')
                {
                    lower+=1
                }
                if(password[i]>='0'&&password[i]<='9')
                {
                    num+=1
                }
            }
            if(capital<1||lower<1||num<1)
            {
            document.getElementById("result").innerHTML="הסיסמה חייבת להיות 8 תווים לפחות ותכלול לפחות אות אחת גדולה וקטנה באנגלית ומיספר אחד"
            document.getElementById("pass").style.borderColor="red";
            return false;
            }
            capital=0;
            lower=0;
            num=0;

            if(!le(password)){
                document.getElementById("pass").style.borderColor="red";
                document.getElementById("result").innerHTML="קלט לא חוקי";
                return false;
               }
        }
        document.getElementById("pass").style.borderColor="green";
        return true;
    }
 function checkpass()
{
    var password=document.getElementById("pass").value;
    var password2=document.getElementById("pass2").value;
    for(i=0;i<password.length;i++)
    {

        if(password2[i]!=password[i])
        {
            document.getElementById("result").innerHTML="סיסמאות לא תואמות";
            document.getElementById("pass").style.borderColor="red";
            document.getElementById("pass2").style.borderColor="red";
            return false;
        }

    }
    if(password2.length!= password.length){
            document.getElementById("result").innerHTML="סיסמאות לא תואמות";
            document.getElementById("pass").style.borderColor="red";
            document.getElementById("pass2").style.borderColor="red";
            return false;
    }
    
            document.getElementById("pass").style.borderColor="green";
            document.getElementById("pass2").style.borderColor="green";
    return true
}
    
    
    function le(note){
        for(i=0;i<note.length;i++)
        {
            if((note[i]>='A'&&note[i]<='Z')||(note[i]>='a'&&note[i]<='z')||(note[i]>='0'&&note[i]<='9')){
           continue;
            }      
    else
    return false;
}
return true;
    }




      function user(name){
if(name[0]>='0'&&name[0]<='9'){
    return false;
}else{
    return true;}
      }

      
      function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
    
    
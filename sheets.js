const form =document.getElementById("form");

function Submit(){
  const email=document.getElementById("email").value;
  var ar=Array.from(email);
  const b=['@','b','m','s','c','e','.','a','c','.','i','n'];
  var x=ar.length;
  console.log(x);
  var j=0;
  var f=1;
  while(j!=12){
    if(b[j]===ar[x-12+j]){
      j++;
    }
    else{
      alert("You are not allowed to enter");
      f=0;
      break;
    }
  }
  if(f===1){
    window.open("index.html");
  }
}
function Submit1(){
  const email=document.getElementById("newemail").value;
  var ar=Array.from(email);
  const b=['@','b','m','s','c','e','.','a','c','.','i','n'];
  var x=ar.length;
  console.log(x);
  var j=0;
  var f=1;
  while(j!=12){
    if(b[j]===ar[x-12+j]){
      j++;
    }
    else{
      alert("Your email id is invalid");
      f=0;
      break;
    }
  }
  if(f===1){
    window.open("index.html");
    
  }
}
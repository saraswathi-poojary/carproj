
// const mongoose = require('mongoose');
// main()
// .then((res)=>{
//     console.log("connection successfull");
// })
//.catch((err) => console.log(err));
let btn3 = document.getElementById("btn3");
let para= document.getElementById("parag");
let one=document.getElementById("one");
let email=document.getElementById("email");
let out1=document.getElementById("out1");


// async function main() {
//     await mongoose.connect("mongodb://127.0.0.1:27017/logindb"); //databse link which need to connect
    
// }

// const logintb=new mongoose.Schema({
//     email:String,
//     pass:String
// });
// const User=mongoose.model("User",logintb);

// const animation=out.animate(
//     [
//         {transform:'translateX(50%)'},
//         {transform:'translateX(100%)'},
//     ],

//        {duration:2000,
//         easing:linear
    
//        }


// )
let count=0;

btn3.addEventListener("click",()=>{
    one.value="";
    email.value="";
   
});

let btn4=document.getElementById("btn4");
btn4.addEventListener("click",()=>{
    console.log("hello");
    count=count+1;
    console.log(count);
// out1.style.animation='none';
// setTimeout(()=>{
//     out1.style.animation='anima 2s ease-in-out';
// },10);
    
    if(count%2==0){
        btn4.innerText="sign in"
        out1.style.left='-0%';
        out1.style.borderBottomLeftRadius='0';
        out1.style.borderBottomRightRadius='20%';
        out1.style.borderTopLeftRadius='0%';
        out1.style.borderTopRightRadius='20%';
        out1.style.transition='1s';
        para.innerText="Please click on sign in , if you are already have an account.";
    }
    
    else{
        btn4.innerText="sign up"
        
        out1.style.left='35%';
        out1.style.borderBottomLeftRadius='20%';
        out1.style.borderBottomRightRadius='0';
        out1.style.borderTopLeftRadius='20%';
        out1.style.borderTopRightRadius='0';
        out1.style.transition='1s';
        para.innerText="Please click on sign up , if you are not have an account.";
    }

    
    // out1.style.animationName='anima';
    // out1.style.animationDuration='2s';
    // out1.style.animationTimimngFunction='linear';
});

let btn=document.getElementById("btn");
let inp1=document.getElementById("inp1");
let inp2=document.getElementById("inp2");
let inp3=document.getElementById("inp3");
btn.addEventListener("click",()=>{
    inp1.value="";
    inp2.value="";
    inp3.value="";
   
});


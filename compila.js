function submitForm(){
  let sem=0;
  const imp = document.querySelectorAll(".inputheader");

  log.innerHTML = "";
  if(s.textContent==1)
  {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(imp[2].value))
    {
      for (let i=0;i<vemail.length;i++)
      {
        if(vemail[i]==imp[2].value)
        {
          sem=4;
        }
      }
    }else {
      sem=3
    }
    if(imp[3].value!==imp[4].value)
    {
      sem=2;
    }
    if(!/^[a-zA-Z0-9_]{5,15}$/.test(imp[4].value))
    {
      let header = document.createElement('h1');
      var t = document.createTextNode("Sono ammesse lettere, numeri e underscore.Min 5 Max. 15");
      header.appendChild(t);
      log.appendChild(header);
      event.preventDefault();
    }
  }

  for (const box of imp)
  {
    if(box.value==="" )
    {
      sem=1;
    }
 }


 if(sem===1)
 {
   let header = document.createElement('h1');
   var t = document.createTextNode("riempi tutti i campi!!");
   header.appendChild(t);
   log.appendChild(header);
   event.preventDefault();
 }else if(sem===2){
   let header = document.createElement('h1');
   var t = document.createTextNode("le password non coincidono");
   header.appendChild(t);
   log.appendChild(header);
   event.preventDefault();
 }else if(sem===3){
   let header = document.createElement('h1');
   var t = document.createTextNode("email non valida");
   header.appendChild(t);
   log.appendChild(header);
   event.preventDefault();
 }else if (sem===4) {
   let header = document.createElement('h1');
   var t = document.createTextNode("email esistente");
   header.appendChild(t);
   log.appendChild(header);
   event.preventDefault();
 }
}


 function onResponse(response) {
   return response.json();
 }

 function onText(text) {
   for (let i=0;i<text.mhw4.length;i++)
   {
     vemail[i]=text.mhw4[i].esiste;
   }
}

function email(){
  fetch('apiemail.php').then(onResponse).then(onText)
}

const s = document.querySelector('.nascosto');
const log = document.querySelector('.errore');
let vemail = new Array();
email()

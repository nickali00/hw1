function submitForm(){
  let sem=0;
  log.innerHTML = "";
  const imp = document.querySelectorAll(".inputheader");
  if(s.textContent==0)
  {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(imp[0].value))
    {
      codice = new Array();
      let tok="";
      for(let i=0;i<6;i++){
        codice[i]=Math.round(Math.random() * 10);
        tok=tok+codice[i]

      }
      for (let i=0;i<vemail.length;i++)
      {
        if(vemail[0][i]==imp[0].value)
        {
          fetch("http://nicolaaliuni.altervista.org/recuperapass/tbrecupera.php?tk="+tok+"&email="+imp[0].value);
          fetch("apitoken.php?tk="+tok+"&email="+imp[0].value);
          sem=1;
        }
      }
      if(sem!=1)
      {
        sem=3;
      }else{
        sem=0;
      }
    }else {
        sem=1;
    }

  }


  if(s.textContent==1)
  {
    if(5<imp[0].value.length)
    {
    if(imp[1].value==imp[2].value)
    {
      for (let i=0;i<vemail.length;i++)
      {
        if(vemail[1][i]==imp[0].value)
        {
          fetch("apicredenziali.php?pass="+imp[2].value+"&tk="+imp[0].value);
          sem=1;
        }
      }
      if(sem!=1)
      {
        sem=4;
      }else{
        sem=0;
      }

    }else{
      sem=5;
    }
  }else{
    sem=4;
  }

  if(!/^[a-zA-Z0-9_]{5,15}$/.test(imp[2].value))
  {
    let header = document.createElement('h1');
    var t = document.createTextNode("Password non valida: sono ammesse lettere, numeri e underscore.Min 5 Max. 15");
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
  var t = document.createTextNode("riempi tutti i campi");
  header.appendChild(t);
  log.appendChild(header);
  event.preventDefault();
}else if(sem===2){
  let header = document.createElement('h1');
  var t = document.createTextNode("inserisci email");
  header.appendChild(t);
  log.appendChild(header);
  event.preventDefault();
}else if(sem===3){
  let header = document.createElement('h1');
  var t = document.createTextNode("email inesistente");
  header.appendChild(t);
  log.appendChild(header);
  event.preventDefault();
}else if (sem===4) {
  let header = document.createElement('h1');
  var t = document.createTextNode("codice non valido");
  header.appendChild(t);
  log.appendChild(header);
  event.preventDefault();
}else if (sem===5) {
  let header = document.createElement('h1');
  var t = document.createTextNode("le password non coincidono");
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
    vemail[0][i]=text.mhw4[i].esiste;
    vemail[1][i]=text.mhw4[i].livello;
  }
  //console.log(vemail);
}

function email(){
  fetch('apiemail.php').then(onResponse).then(onText)
}
const log = document.querySelector('.errore');
const s = document.querySelector('.nascosto');
let vemail = new Array();
vemail[0] = new Array();
vemail[1] = new Array();
email()

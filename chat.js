function escapeJS(str){
	try {
		return str.replace(/['"`\\]/g,
		tag => ({
				"'":"\\\\'",
        '"':'\"',
        '`':"\\\\'"
	}[tag]));
	} catch (e) {
	console.error(e);
	}
}
function onText2(text) {
	let boxes = document.querySelector('#modal-view section');
  let i=0;
  for (i;i<text.mhw4.length;i++)
  {
		let conte = document.createElement('div');
		if(text.mhw4[i].ut==io){
    	conte.className="io";
    }else{
      conte.className="nonio";
    }
    let header = document.createElement('h1');
    var t = document.createTextNode(text.mhw4[i].nome+" "+text.mhw4[i].cognome);
    header.appendChild(t);
    conte.appendChild(header);
    header = document.createElement('p');
    t = document.createTextNode(text.mhw4[i].scritta );
    header.appendChild(t);
    conte.appendChild(header);
    boxes.appendChild(conte);
  }
  let dd = document.createElement('div');
  dd.className="scrivi";
  const x = document.createElement("INPUT");
	x.setAttribute("type", "text");
  x.className="scrivimess";
  x.setAttribute("placeholder", "Messaggio");
  dd.appendChild(x);
	const bot = document.createElement('INPUT');
  bot.setAttribute("type", "button");
	bot.onclick = function(){
	  	let te = document.querySelector('.scrivimess');
	    if(te.value!=="" )
	    {

	      let txconv=escapeJS(te.value);
			//	 txconv = txconv.replaceAll("'","\\\\'");
	  		fetch("apiinsert.php?id="+premuto+"&tx="+txconv+"&ut="+io).then(onResponse);
	    }
	    const millis=1000;
	    const date = new Date();
	   	let curDate = null;
	  	do {
				curDate = new Date();
			}while(curDate-date < millis);
	    modalView.innerHTML = '';
	   	conte = document.createElement('div');
	    conte.className="chiudi";
	    let header = document.createElement('img');
	  	header.src="http://nicolaaliuni.altervista.org/mhw4/immagini/close.png";
	    header.onclick = function() {
	    	document.body.classList.remove( 'no-scroll');
	   		modalView.classList.add('hidden');
	    	modalView.innerHTML = '';
	    };
	    conte.appendChild(header);
	    modalView.appendChild(conte);
	    modalView.classList.remove('hidden');
	    header = document.createElement('section');
	    header.className="conversazione";
	    modalView.appendChild(header);
	    const link="apichat.php?num="+premuto;
	  	fetch(link).then(onResponse2).then(onText2);
    };
    bot.setAttribute("value", "invia");
    bot.className="inv";
    dd.appendChild(bot);
    modalView.appendChild(dd);
 }
 function onResponse2(response) {
   return response.json();
 }
 function onResponse(response) {
   return response.json();
 }

function onThumbnailclick(event) {
	premuto=event.currentTarget.attributes.num.nodeValue;
  io=event.currentTarget.attributes.user.nodeValue;
 	document.body.classList.add('no-scroll');
 	modalView.style.top = window.pageYOffset + 'px';
  conte = document.createElement('div');
  conte.className="chiudi";
  let header = document.createElement('img');
  header.src="http://nicolaaliuni.altervista.org/mhw4/immagini/close.png";
  header.onclick = function() {
  	document.body.classList.remove( 'no-scroll');
  	modalView.classList.add('hidden');
  	modalView.innerHTML = '';
  };
  conte.appendChild(header);
 	modalView.appendChild(conte);
 	modalView.classList.remove('hidden');
  header = document.createElement('section');
  header.className="conversazione";
  modalView.appendChild(header);
  const link="apichat.php?num="+premuto;
  fetch(link).then(onResponse2).then(onText2);
 }





 function aggiev()
 {
 	let boxes = document.querySelectorAll('.chat');
 	for (const box of boxes)
   {
 		box.addEventListener('click', onThumbnailclick);
 	 }
 }

var premuto;
var io;

const modalView = document.querySelector('#modal-view');
aggiev();

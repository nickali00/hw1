function onText(text) {
  let boxes = document.querySelector('section');
  let i=0;
  for (i;i<text.mhw4.length;i++)
  {
     let conte = document.createElement('div');
     conte.className="cont";
     let header = document.createElement('h1');
     var t = document.createTextNode("titolo: "+text.mhw4[i].titolo);
     header.appendChild(t);
     conte.appendChild(header);
     header = document.createElement('h1');
     t = document.createTextNode("data: "+text.mhw4[i].data );
     header.appendChild(t);
     conte.appendChild(header);
     boxes.appendChild(conte);
     conte = document.createElement('div');
     conte.className="cont";
     conte2 = document.createElement('div');
     conte2.className="cont2";
     header = document.createElement('h1');
     t = document.createTextNode("descrizione: ");
     header.appendChild(t);
     conte2.appendChild(header);
     header = document.createElement('p');
     t = document.createTextNode(text.mhw4[i].descrizione);
     header.appendChild(t);
     conte2.appendChild(header);
     conte.appendChild(conte2);
     conte2 = document.createElement('div');
     conte2.className="cont2";
     header = document.createElement('img');
     header.className="logo";
     header.src="immagini/"+text.mhw4[i].img;
     conte2.appendChild(header);
     conte.appendChild(conte2);
     boxes.appendChild(conte);
     conte = document.createElement('div');
     conte.className="cont";
     let ten = document.createElement('div');
     header = document.createElement('img');
     header.src="http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png";
     ten.appendChild(header);
     let header2 = document.createElement('h1');
     t = document.createTextNode(text.mhw4[i].like); // Create a text element
     header2.appendChild(t);
     ten.appendChild(header2);
     conte.appendChild(ten);
     boxes.appendChild(conte);
     conte = document.createElement('div');
     conte.className="spazio";
     boxes.appendChild(conte);
  }
}


function onResponse(response) {
  return response.json();
}

function prendoapi()
{
 fetch('apiindex.php').then(onResponse).then(onText);
}

prendoapi();

function onJson(json){
    console.log('ricevuto');

    const box= document.querySelector('.raggruppamento');
    box.innerHTML='';
    doc=json.parsed[0].food;

    const alimento=doc.label;
    const img=doc.image;

    const kcal= doc.nutrients.ENERC_KCAL
    const carbo= doc.nutrients.CHOCDF;
    const grassi= doc.nutrients.FAT;
    const proteine=doc.nutrients.PROCNT;

    const span1= document.createElement('span');
    const span2= document.createElement('span');
    const span3= document.createElement('span');
    const span4= document.createElement('span');
    const h1= document.createElement('h1');
    const image=document.createElement('img');
    const div=document.createElement('div');

    h1.textContent=alimento;
    image.src=img;
    span1.textContent=carbo + (' grammi di carboidrati');
    span2.textContent=grassi + (' grammi di grassi');
    span3.textContent=proteine + (' grammi di proteine');
    span4.textContent=kcal + (' kcal');
    

    box.appendChild(image);
    box.appendChild(div);
    div.appendChild(h1);
    div.appendChild(span1);
    div.appendChild(span2);
    div.appendChild(span3);
    div.appendChild(span4);
    
}



function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function search(event)
  {
    // Impedisci il submit del form
    event.preventDefault();
  
    const container= document.querySelector('#food');
    const value_correct= encodeURIComponent(container.value);
    rest_url = 'api_food.php';
    url= rest_url + "?alimento=" + value_correct;
  
    // Esegui fetch
    fetch(url).then(onResponse).then(onJson);
  }
  
  // Aggiungi event listener al form
  const form = document.querySelector('form');
  form.addEventListener('submit', search);
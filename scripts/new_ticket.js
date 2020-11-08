let tBodyRef = document.querySelector('#tBody');
let templateRef = document.querySelector('#rowTemplate');


function newTicket(name) {
  let clone = templateRef.content.cloneNode(true);
  let td = clone.querySelectorAll("td");

  tBodyRef.appendChild(clone);
}

function deleteTicket(o){
  //select parent node and remove it
  let p=o.parentNode.parentNode.parentNode;
  p.parentNode.removeChild(p);
}

Barras.addEventListener('click', (event) => {
   // alert('hi');
   event.preventDefault();
   este.style.width = '10%';
   titulo.style.fontSize = '20px';
   opcion1.style.fontSize = '15px';
   opcion.style.fontSize = '15px';
   opcion2.style.fontSize='15px';

   menuIcons = document.getElementsByClassName('menuIcons');
   for(let i =0;i<menuIcons.length;i++){
        menuIcons[i].style.display = 'none'
   }
})


document.getElementById("rol").addEventListener("change", function () {
    var cajaInput = document.getElementById("NoCaja");
    if (this.value === "cajero") {
        cajaInput.removeAttribute("disabled");
    } else {
        cajaInput.setAttribute("disabled", "disabled");
    }
})

function script(){
    this.initialize = function(){
        this.registerEvents();
    };
    this.registerEvents = function(){
        document.addEventListener('click', function(e){
            targetElement = e.target;
            classList = targetElement.classList;
            if(classList.contains('updateUser')){
                e.preventDefault();
               // alert('Editando');


               nombre = tarjetElement.closet('tr'.querySelector('td.nombre'));
               nit =tarjetElement.closet('tr'.querySelector('td.nit'));
               telefono = tarjetElement.closet('tr'.querySelector('td.telefono'));

               BoostrapDialog.confirm({
                title: 'Update '+ nombre,
                mesage: nombre + ' ' + nit + ' ' + telefono
               });
            }
        });
    };
}
var script = new script;
script.initialize();
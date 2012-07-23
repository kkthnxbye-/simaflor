function validar(){
   if(document.getElementById('user').value == "" ){
      alert('Digita un nombre de usuario');
      return false;
   }
   if(document.getElementById('pass').value == "" ){
      alert('Digita una clave');
      return false;
   }
   
   return true;
}

function go(value){
   if(value != ""){
      window.location.href = 'carga.php?finca='+value;
      return true;
   }else{
      alert('Seleccione una finca');
      return false;
   }
}

function goCarga(){
   if(document.getElementById('file').value == ""){
      alert('Seleccione un archivo para subir y procesar');
      return false;
   }
   return true;
}
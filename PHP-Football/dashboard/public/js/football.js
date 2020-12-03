function triggerClick(){
    document.getElementById("playerimg").click();
}
function displayImg(e){
    console.log(e.target);
   if(e.files[0]) {
    console.log(e.files[0]);
       var reader = new FileReader();
       reader.onload = function(e){
        document.getElementById("displayimg").setAttribute('src',e.target.result);
        
       }
       reader.readAsDataURL(e.files[0]);
   }
}
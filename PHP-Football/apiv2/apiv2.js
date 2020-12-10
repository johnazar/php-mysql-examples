// get all links
const keys = Array.from(document.querySelectorAll('.key'));
console.log(keys)
// add transiton and event listener
keys.forEach(key => key.addEventListener('click', getdata)); 

async function getdata(){
    // get the value
    console.log(this.dataset.key);
    // set api uri
    const apiuri = (this.dataset.key=="")?"players":`players/${this.dataset.key}`;
    // fetch data with value
    let response = await fetch(`https://football.johnazar.com/apiv2/${apiuri}`);
    let recived = await response.json();
    // call display fun with data
    myDisplayer(recived.data);
    //console.log(recived);
    //console.log(recived.data);
    
}
async function addeplayer(){
    //TODO get data from forms
    const firstname =document.getElementById('name');

    //TODO Prepare data
    let formdata =new FormData();
    formdata.append('first_name',firstname);

    let response = await fetch(`https://football.johnazar.com/apiv2/players/`,
    {
        method:'POST',
        body:formdata
    });
    let recived = await response.json();
    

    if(recived.status===true){
        await getdata();
    }

}

//Remove Player
async function removeplayer(id){
    //TODO
    let response = await fetch(`https://football.johnazar.com/apiv2/players/${id}`,
    {
        method:'DELETE'
    });
    let recived = await response.json();
    console.log(recived);
    if(recived.status===true){
        await getdata();
    }

}

async function updateplayer(){
    //TODO

}

function myDisplayer(data) {
    // remove any fetched data before
    document.getElementById("demozone").innerHTML ="";
    //render players cards
    data.forEach(element => {
        document.getElementById("demozone").innerHTML +=`
        <!-- Player card -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img src="${element.img}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">${element.firstname} ${element.lastname}</h5>
                    <h6>${element.tname}</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="card-link">update</a>
                        <a class="card-link" onclick="removeplayer(${element.id})">delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Player card -->
        `;
        
    });
    
  }
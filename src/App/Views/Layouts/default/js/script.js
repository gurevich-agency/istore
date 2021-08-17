window.addEventListener('load', function(){   

    // Handler for Select changing   
    if(window.location['pathname'] == '/list/' || window.location['pathname'] == '/list'){
        const arUserType = {};
        const arFavorite = {};

        document.addEventListener('change', function(e){
            const id = e.target.dataset.id;
            const value = e.target.options[e.target.selectedIndex].value;

            e.target.dataset.name == 'usertype' ? arUserType[id] = value : arFavorite[id] = value; 
        });

        // Handler for User update button
        document.addEventListener('click', function(e){     
            
            if (e.target.classList.contains('js-save-changes')) { 

                fetch('/edit/', {
                    method: 'POST', 
                    body: JSON.stringify({action: 'update', userType: arUserType, favorite: arFavorite}), 
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                });;           
            }        
        });



        // Handler to delete user    
        document.addEventListener('click', function(e){
            if(e.target.classList.contains('js-delete-record')){
                const userId = e.target.dataset.id;
                fetch('/edit/', {
                    method: 'POST', 
                    body: JSON.stringify({action: 'delete', id: userId}), 
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    if (data > 0){
                        alert(`Record ${data} successfully deleted`);
                       document.querySelector(`[data-rowid='${data}']`).remove();
                    }
                    console.log(data);
                });; 
            }
        });   
        
    }  


    
    // GetPhoto    
    if(!(window.location['pathname'] == '/add/' || window.location['pathname'] == '/add')){
        return;
    }
   

    const promise = new Promise((resolve, reject) => {
        fetch('https://thatcopy.pw/catapi/rest/')
        .then((response) => {
            resolve(response.json());
        });
    });
      
    promise.then((value) => {        
        document.getElementById('cat-picture').src = value.url;
        document.getElementsByName('image')[0].value = value.url;
    });
    

    
    document.addEventListener('click', function(e){         

        // Adding of User
        if(e.target.classList.contains('js-add-user-button')){            

            const errors =[];
            const values = {};
            const inputs = document.getElementById('add-user').elements;            
            
            for (const input of inputs) {

                if(input.value == '' && input.type !== 'button'){
                    input.classList.add('is-invalid');
                    errors.push(input);
                } else{                    
                    input.classList.remove('is-invalid');
                    values[input.name] = input.value;
                }  
            }  

            if(errors.length > 0){
                return;
            }

            fetch('/edit/', {
                method: 'POST', 
                body: JSON.stringify({action: 'add', values}), 
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {               
                if (data.status == 'ok'){
                    alert('Record successfully added=)');
                    location.reload();
                }
            });;   


        }
        
    });
})
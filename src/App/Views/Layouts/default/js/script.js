window.addEventListener('load', function(){   

    // Handler for Select changing   
    const arUserType = {};
    const arFavorite = {};

    document.addEventListener('change', function(e){

        const id = e.target.dataset.id;
        const value = e.target.options[e.target.selectedIndex].value;

        e.target.dataset.name == 'usertype' ? arUserType[id] = value : arFavorite[id] = value;             
        
    });

    document.addEventListener('click', function(e){         

        // Handler for User update button
        if (e.target.classList.contains('js-save-changes')) { 

            fetch('http://172.23.0.4/edit/', {
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







    document.addEventListener('click', function(e){ 
        if(e.target.classList.contains('js-add-user-button')){

            const errors =[];
            const values = {};
            const inputs = document.getElementById('add-user').elements;

            console.log(inputs);
            
            for (const input of inputs) {

                if(input.value == '' && input.type !== 'button'){
                    input.classList.add('is-invalid');
                    errors.push(input);
                } else{
                    console.log(input);
                    input.classList.remove('is-invalid');
                    values[input.name] = input.value;
                }               
                
            }
            

            if(errors.length > 0){
                return;
            }

            fetch('http://172.23.0.4/edit/', {
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
                console.log(data);
            });;   


        }
    });
})
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
    }
    


    
    // GetPhoto
    if(window.location['pathname'] == '/add/'){

        let catPhoto;
        
        let promise = fetch('https://thatcopy.pw/catapi/rest/')
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.log(data['url']);  
                  
        });

        

    }

    // Adding of User
    document.addEventListener('click', function(e){ 
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

            // const formData = new FormData();
            // const fileField = document.querySelector('input[type="file"]');

            // formData.append('username', 'abc123');
            // formData.append('avatar', fileField.files[0]);

            // try {
            // const response = await fetch('https://example.com/profile/avatar', {
            //     method: 'PUT',
            //     body: formData
            // });
            // const result = await response.json();
            // console.log('Успех:', JSON.stringify(result));
            // } catch (error) {
            // console.error('Ошибка:', error);
            // }

            

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
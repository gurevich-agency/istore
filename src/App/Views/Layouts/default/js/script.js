window.addEventListener('load', function(){   

    // Handler for Select changing   
    const arUserType = {};
    const arFavorite = {};

    document.addEventListener('change', function(e){

        const id = e.target.dataset.id;
        const value = e.target.options[e.target.selectedIndex].value;

        e.target.dataset.name == 'usertype' ? arUserType[id] = value : arFavorite[id] = value;
        console.log(arUserType, arFavorite);       
        
    });

    document.addEventListener('click', function(e){         

        // Handler for User update button
        if (e.target.classList.contains('js-save-changes')) {            

            console.log(arUserType, arFavorite); // en

            fetch('http://172.23.0.4/edit/', {
                method: 'POST', 
                body: JSON.stringify({userType: arUserType, favorite: arFavorite}), 
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
    })
})
window.onload = function(){

    var seatsContainer = document.querySelector(".seats");
    
    
    var row = document.createElement('div');
    row.classList.add('d-flex', 'justify-content-around');

    for(let i = 0; i < seatsOfThisTheater; i++){
        
        
        if(i % 8 == 0){
            var row = document.createElement('div');
            row.classList.add('d-flex', 'justify-content-around');
            seatsContainer.insertAdjacentElement('beforeend', row);
        }
        
        

        var seat = document.createElement('span');
        seat.classList.add('seat', 'bg-white', 'mb-3', 'col-1', 'rounded');
        seat.style = "height: 40px; width: 40px";
        seat.dataset.id = i+1;
        
        row.appendChild(seat);

        
    }


    window.chosen = [];
    document.querySelectorAll(".seat").forEach(seat => {
        

        for(var i = 0; i < seatsTaken.length; i++){
            if(seatsTaken[i] == seat.dataset.id){
                seat.classList.remove('bg-white');
                seat.classList.add('bg-danger');
            }
        }

        seat.addEventListener("click", function(){
            var availableSeats = parseInt(document.querySelector("#seats").value);
            var seatNo = this.dataset.id;
        
            //if user clicks on a seat and its not marked
            if(this.classList.contains('bg-white')){
                
                //check if number of seats allowed is exceeded or not
                if(chosen.length < availableSeats){
                    document.querySelector(".seats-chosen").innerHTML = "";
                    this.classList.remove('bg-white');
                    this.classList.add('bg-success');
                    chosen.push(seatNo);
                    chosen.map(seatId => {
                        document.querySelector(".seats-chosen").innerHTML += seatId + ", ";
                    })
                    document.querySelector(".total-price").innerHTML = "$"+ (chosen.length*window.price)
                
                }  
                    
                else{
                    alert('Increase the number of seats needed to choose another seat')
                }
            
            }

            //if the seat is already marked 
            else if(this.classList.contains('bg-success')){
                document.querySelector(".seats-chosen").innerHTML = "";
                this.classList.add('bg-white');
                this.classList.remove('bg-success');
                const index = chosen.indexOf(this.dataset.id);
                if (index > -1) {
                    chosen.splice(index, 1);
                }
                chosen.map(seatId => {
                    document.querySelector(".seats-chosen").innerHTML += seatId + ", ";
                })
                document.querySelector(".total-price").innerHTML = "$"+ (chosen.length*window.price)

            }
            //already booked
            else{
                alert('This Seat is already taken')
            }

            //set the values of the hidden inputs
            document.querySelector('[name="just_taken"]').value = chosen.length;
            document.querySelector('[name="seats"]').value = chosen.toString();
            document.querySelector('[name="price"]').value = chosen.length*window.price;

        });
        
    });


}
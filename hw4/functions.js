function playGame(){
    
    
    var cars = new Array(
    {car: "bug", speed: 90}, 
    {car: "bugatti", speed: 250}, 
    {car: "challenger", speed: 120}, 
    {car: "charger", speed: 160}, 
    {car: "ford", speed: 70})
    
    $('#content').empty()
    var randcar1 = cars[Math.floor(Math.random()*cars.length)]
    var randcar2 = cars[Math.floor(Math.random()*cars.length)]
    
    $('#content').append('<button type="button" class="btn btn-primary btn-lg" onclick="playGame()">Race!</button></input><br>')
    $('#content').append('<img src="img/'+randcar1.car+'.png" />' + 'Car: ' + randcar1.car + ' - Top Speed: ' + randcar1.speed + '<br>')
    $('#content').append('<img src="img/'+randcar2.car+'.png" />' + 'Car: ' + randcar2.car + ' - Top Speed: ' + randcar2.speed + '<br><br>')
    
    if(randcar1.speed > randcar2.speed){
        $('#content').append('Winner is '+randcar1.car)
    }
    else if(randcar1.speed < randcar2.speed){
        $('#content').append('Winner is '+randcar2.car)
    }
    else{
        $('#content').append('There is a tie')
    }
}
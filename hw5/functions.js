            
$(document).ready(function() {
    $("#submitbtn").click(function(e){
        if(!verif()){
            console.log("Failed");
            $('#formstatus').text("Please correct the indicated fields")
            return false;
        }
        $('#results').empty();
        var query = $('#queryinput').val();
        var page = $('#pageinput').val();
        query = query.replace(/\s+/g, "+");
        var sessionVar = "qstring-"+query;
        
        if (sessionStorage.sessionVar) {
            sessionStorage.sessionVar = Number(sessionStorage.sessionVar) + 1;
        } else {
            sessionStorage.sessionVar = 1;
        }
        console.log("Times query has been searched: " + sessionStorage.sessionVar);
        $('#searchcount').text("This has been search " + sessionStorage.sessionVar + " times.");
        
        $.getJSON('https://api.giphy.com/v1/gifs/search?q=' + query + '&api_key=LIbfh25VldF4EGl0plYVxKZ5eEU1jq3f&limit=5&offset=' + (page-1)*5).done(function(data){
            var gifs = data.data;
            for(var i = 0; i < gifs.length; i++){
                var gifurl = gifs[i].images.fixed_height.url;
                console.log(gifurl);
                $('#results').append($('<img>',{'src': gifurl}));
            }
        })
       
    });
    $('form').submit(function(e){
        return false;
    })
});

$(document).ajaxError(function(){
    console.log("An AJAX error occurred!");
});

function verif(){
    
    var query = $('#queryinput').val();
    var page = $('#pageinput').val();
    (page.length == 0)? page = "1" : page;
    var querymatch = query.match(/^[a-zA-Z\s]+$/);
    var pagematch = page.match(/[0-9]+/);
    
    
    query = query.replace(/\s+/g, "+");
    var sessionvar = "qstring-"+query;
    console.log(sessionvar);
    
    $('#searchstatus').text((querymatch==null?"Only enter letters and spaces":"Valid"));
    $('#searchstatus').css("color", (querymatch==null?"red":"green"));
    
    $('#pagestatus').text((pagematch==null?"Please enter a numerical value (1 by default)":"Valid"));
    $('#pagestatus').css("color", (pagematch==null?"red":"green"));

    return(pagematch != null && querymatch != null);
    
}

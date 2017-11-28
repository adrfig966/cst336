var states = [ "AK",
                "AL",
                "AR",
                "AS",
                "AZ",
                "CA",
                "CO",
                "CT",
                "DC",
                "DE",
                "FL",
                "GA",
                "GU",
                "HI",
                "IA",
                "ID",
                "IL",
                "IN",
                "KS",
                "KY",
                "LA",
                "MA",
                "MD",
                "ME",
                "MI",
                "MN",
                "MO",
                "MS",
                "MT",
                "NC",
                "ND",
                "NE",
                "NH",
                "NJ",
                "NM",
                "NV",
                "NY",
                "OH",
                "OK",
                "OR",
                "PA",
                "PR",
                "RI",
                "SC",
                "SD",
                "TN",
                "TX",
                "UT",
                "VA",
                "VI",
                "VT",
                "WA",
                "WI",
                "WV",
                "WY"];

var users = [ "alice1",
                "bob23",
                "cullen420"];
                
$(document).ready(function() {
    for(var i = 0; i < states.length; i++){
        $('#states').append("<option>"+states[i]+"</option>");
    }
    
    $("form").submit(function(e){
        if(!verif()){
            $('#formstatus').text("Please correct the indicated fields")
            return false;
        }
    });
});

$(document).ajaxError(function(){
    console.log("An AJAX error occurred!");
});

function stateinput(){
    var state = $('#states').val().toLowerCase();
    console.log(state)
    $('#counties').empty();
    
    $.getJSON("http://hosting.otterlabs.org/laramiguel/ajax/countyList.php?state="+state).done(function (data) {
        console.log(data.counties.length);
        for(var i = 0; i < data.counties.length; i++){
            $('#counties').append("<option>"+data.counties[i].county+"</option>");
        }
    });
}

function zipinput(){
    var zip = $('#zip').val().toLowerCase();
    console.log(zip)
    $('#city').empty();
    $.getJSON("http://hosting.otterlabs.org/laramiguel/ajax/zip.php?zip_code="+zip).done(function (data) {
        console.log(data);
        if(!$.isEmptyObject(data)){
            $('#city').text("City: " + data.city + " - Latitude: " + data.latitude + " - Longitude: " + data.longitude)
        }
    });
}
function verif(){
    
    var usr = $('#usr').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var pwd = $('#pwd').val();
    
    if (phone.length > 10) {
        $('#phone').val(phone.slice(0,9));
        phone = $('#phone').val(); 
    }
    
    var usrmatch = users.indexOf(usr);
    var emailmatch = email.match(/\S+@\S+\.\S+/);
    var phonematch = phone.match(/[0-9]{10}/);
    var pwdmatch = pwd.match(/(?=.*[a-z]*)(?=.*[A-Z]+)(?=.*[0-9]+).*/);
    
    $('#usrstatus').text((usrmatch!=-1?"User name already exists":"User name is available"));
    $('#usrstatus').css("color", (usrmatch!=-1?"red":"green"));
  
    $('#emailstatus').text((emailmatch==null?"Invalid email":"Valid email"));
    $('#emailstatus').css("color", (emailmatch==null?"red":"green"));
    
    $('#phonestatus').text((phonematch==null?"Invalid phone number, please enter 10 digits":"Valid phone number"));
    $('#phonestatus').css("color", (phonematch==null?"red":"green"));
    
    $('#pwdstatus').text((pwdmatch==null?"Password must contain one upper case character and one number":"Valid password"));
    $('#pwdstatus').css("color", (pwdmatch==null?"red":"green"));
    
    return (usrmatch == -1 && emailmatch != null && pwdmatch != null && phonematch != null)
    
}

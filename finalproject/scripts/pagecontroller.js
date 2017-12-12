var currentpage = home;

function home(){
    
    var container = $('#content');
    container.empty();
    var table = $('<table></table>').addClass('table');
    var info = $('<p></p>');
    info.html("Welcome to the online portal for our tattoo shop<br> Below is a list of artists along with contact info<br>"
    + "Use the navigation to your right to make appointments or cancel appointments");
    var header = $('<h1></h1>').text("Available Artists");
    
    $.post("api/interface.php", {action: "getemp"}).done(function(data){
        var jsondata = JSON.parse(data);
        for(var i = 0; i < jsondata.length; i++){
            var tr = $('<tr></tr>');
            var td = $('<td></td>').text(jsondata[i].firstname + " " + jsondata[i].lastname + " - Email: " + jsondata[i].email + " | Phone: " + jsondata[i].phonenumber);
            table.append(tr.append(td));
        }
    });
    
    container.append(info).append("<hr>").append(header).append(table);
}
function manage(){
    var container = $('#content');
    container.empty();
    var passwordinput = $('<input>', {"type": "password", "placeholder": "Appointment Password"});
    var statuslabel = $('<label></label>');
    var managebtn = $('<input>', {"type": "button", "value": "Manage"})
    var aptmtinfo = $('<p>', {"class": "aptmtrow"}).css("font-size", "20px");
    var cancelbtn = $('<input>', {"type": "button", "value": "Cancel Appointment"})
    aptmtinfo.hide();
    cancelbtn.hide();
    managebtn.click(function(){
        aptmtinfo.empty();
        $.post('api/interface.php', {appwd: passwordinput.val()}).done(function(data){
            console.log(data);
            var jsondata = JSON.parse(data);
            if(jsondata.length == 0){
                statuslabel.text("Incorrect password");
            }
            aptmtinfo.append("Appointment ID: " + jsondata[0].id + " | Has color: " + jsondata[0].color + " | Date: " + jsondata[0].date + " | Time: " + jsondata[0].time + " |  $" + jsondata[0].price + " ");
            aptmtinfo.show();
            cancelbtn.click(function(){
               console.log(jsondata[0].id);
               $.post('api/interface.php', {action: "deleteap", apid: jsondata[0].id})
               manage();
            });
            cancelbtn.show();
        });
    });
    container.append(passwordinput).append(statuslabel).append("<br>").append(managebtn).append(aptmtinfo).append(cancelbtn);
}
function find(){
    var container = $('#content');
    container.empty();
    var dateinput = $('<input>', {"type": "date"});
    var timeinput = $('<input>', {"type": "number", "placeholder": "Enter a time in 24hr format (ex. 1300)"});
    var statuslabel = $('<label></label>');
    var findbtn = $('<input>', {"type": "button", "value": "Check availability"});
    var resultsdiv = $('<div></div>');
    
    findbtn.click(function(){
        if(dateinput.val() && timeinput.val()){
            $.post('api/interface.php', {action: "checkopen", date: dateinput.val(), time: timeinput.val()}).done(function(data){
                var jsondata = JSON.parse(data);
                if(jsondata.length > 0){
                    statuslabel.text("Appointments available see below");
                    resultsdiv.empty();
                    console.log(jsondata);
                    for(var i = 0; i < jsondata.length; i++){
                        var bookbtn = $('<input>', {"type": "button", "value": "Make appointment", "empid": jsondata[i].id}).css("font-size", "20px");
                        bookbtn.click(function(){
                            $.post('api/interface.php', {action: "makeap", empid: $(this).attr("empid"), date: dateinput.val(), time: timeinput.val()}).done(function(password){
                                 resultsdiv.empty().text("Appointment has been made. This is your cancellation password: " + password);
                            });
                        });
                        resultsdiv.append(jsondata[i].firstname + " " + jsondata[i].lastname + "<br>").append(bookbtn).append("<br>");
                    }
                }
                else{
                    statuslabel.text("Appointment slot unavailable");
                }
            });
        }
        else{
            statuslabel.text(" Please fill out all fields");   
        }
         
    });
    
    container.append(dateinput).append("<br>").append(timeinput).append("<br>").append(findbtn).append(statuslabel).append("<br>").append(resultsdiv);
}
function editaptmt(apid){ 
    var container = $('#content');
    container.empty();
    $.post('api/interface.php', {action: "getap", id: apid}).done(function(data){
        
        var jsondata = JSON.parse(data);
        var aptmtinfo = $('<p>', {"class": "aptmtrow"}).css("font-size", "20px");
        var priceinput = $('<input>', {"type": "number", "placeholder": "Enter a new price"});
        var dateinput = $('<input>', {"type": "date",});
        var timeinput = $('<input>', {"type": "number", "placeholder": "Enter a new time (24 hr, ex. 1300)", "pattern": "[0-2][0-9][0-5][0-9]", "maxlength": "4"});
        var colorinput = $('<input>', {"type": "checkbox", "value": "hascolor"});
        var submitbtn = $('<input>', {"type": "button", "value": "Change "});
     
        colorinput.prop("checked", Number(jsondata[0].color));
        submitbtn.click(function(){
            
            console.log(priceinput.val() + " " + dateinput.val() + " " + timeinput.val() + colorinput.prop("checked") );
            
            $.post('api/interface.php', {action: "updateap", id: apid, price: priceinput.val(), date: dateinput.val(), time: timeinput.val(), color: (colorinput.prop("checked")?"1":"0")}).done(function(data){
                console.log(data);
                userdashboard();
            });
        });
        
        aptmtinfo.append("Appointment ID: " + jsondata[0].id + " | Has color: " + jsondata[0].color + " | Date: " + jsondata[0].date + " | Time: " + jsondata[0].time + " |  $" + jsondata[0].price + " ");
        container.append(aptmtinfo);
        container.append('<br>').append(priceinput);
        container.append('<br>').append(dateinput);
        container.append('<br>').append(timeinput);
        container.append('<br>').append(colorinput).append(" Has color");
        container.append('<br>').append(submitbtn);
        
    });
}
function userdashboard(){
    var container = $('#content');
    container.empty();
    var logoutbtn = $('<input>', {"type": "button", "value": "Log Out"});
    var sumbtn = $('<input>', {"type": "button", "value": "Total money to be made"});
    var colbtn = $('<input>', {"type": "button", "value": "Color percentage"});
    var avgbtn = $('<input>', {"type": "button", "value": "Your average price"});
    var logoutbtn = $('<input>', {"type": "button", "value": "Log Out"});
    var statuslabel = $('<label></label>');
    
    logoutbtn.click(function(){
        sessionStorage.loggedin = 0;
        sessionStorage.uid = null;
        $('#loginbtn').text("Employee log in");
        login();
    });
    sumbtn.click(function(){
        $.post('api/interface.php', {action: "getsum", uid: sessionStorage.uid}).done(function(data){
            statuslabel.text(" You are on track to make $" + JSON.parse(data)[0][0] + " after completing all appointments");
        });
    });
    avgbtn.click(function(){
        $.post('api/interface.php', {action: "getavg", uid: sessionStorage.uid}).done(function(data){
            statuslabel.text(JSON.parse(data)[0][0] + " is your current average rate per hour");
        });
    });
    colbtn.click(function(){
        $.post('api/interface.php', {action: "getcol", uid: sessionStorage.uid}).done(function(data){
            statuslabel.text("You have " + JSON.parse(data)[0][0] + " appointments that require colored ink");
        });
    });
    var resultstable = $('<table></table>');
    var jsondata;
    $.post('api/interface.php', {action: "getclients", uid: sessionStorage.uid}).done(function(data){
        console.log(data);
        jsondata = JSON.parse(data);
        for(var i = 0; i < jsondata.length; i++){
            var id = jsondata[i].id;
            var editbtn = $('<input>', {"type": "button", "value": "Edit", "appointmentid": id});
            var deletebtn = $('<input>', {"type": "button", "value": "Completed", "appointmentid": id});
            editbtn.click(function(){
                editaptmt($(this).attr("appointmentid"));
                
            })
            deletebtn.click(function(){
                $.post('api/interface.php', {action: "deleteap", apid: $(this).attr("appointmentid")})
                userdashboard();
            })
            var tabledata= $('<td></td>');
            tabledata.text(
                "Appointment ID: " + jsondata[i].id + " | Has color: " + jsondata[i].color + " | Date: " + jsondata[i].date + " | Time: " + jsondata[i].time + " |  $" + jsondata[i].price + " ");
                
            tabledata.append(editbtn);
            tabledata.append(deletebtn);
            var tablerow = $('<tr>', {"class": "aptmtrow"})
            
            resultstable.append(tablerow.append(tabledata));
        }
        
    });
    container.append("<h1>Your appointments</h1><br>");
    container.append(resultstable);
    container.append(logoutbtn).append("<hr>").append(sumbtn).append(avgbtn).append(colbtn).append(statuslabel);
}
function login(){
    var container = $('#content');
    var statuslabel = $('<label></label>');
    container.empty();
    if(sessionStorage.loggedin == 1){
        $('#loginbtn').text("Dashboard");
        userdashboard();
    }
    else{
        var userinput = $('<input>', {"type": "text"});
        var pwdinput = $('<input>', {"type": "password"});
        var loginbtn = $('<input>', {"type": "button", "value": "Log in"});
        loginbtn.click(function(){
            $.post('api/interface.php', {user: userinput.val(), pwd: pwdinput.val()}).done(function(data){
                if(JSON.parse(data).length == 0){
                    console.log("Incorrect user name or password");
                    statuslabel.text("Incorrect user name or password");
                }else{
                    sessionStorage.uid = JSON.parse(data)[0].employeeid;
                    sessionStorage.loggedin = 1;
                    console.log("Logged in, user ID is :" + sessionStorage.uid);
                    login();
                }
            });
        });
        container.append(userinput).append('<br>').append(pwdinput).append('<br>').append(loginbtn).append(statuslabel);
    }
}
function clearcontent(){
    $('#content').empty();
}
function handlenavbar(baritem){
    $(baritem).hide();
}
function wrapper(){
    find();
}
$('.bar-item').click(function(){
    $('.bar-item').removeClass('active');
    $(this).addClass('active');
});
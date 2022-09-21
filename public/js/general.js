
$(document).ready(function(){
    restrictPastDate();
    backToPreviousPage();
   
})

function restrictPastDate(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var today = dtToday.getFullYear()+"-"+(month)+"-"+(day) ;

    var maxDate = year + '-' + month + '-' + day;
    $('.date').attr('min', maxDate);
    
}
function setTodayDate(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    var today = year +"-"+month+"-"+day;
    

   
}

function backToPreviousPage(){
    $('#backPrevious').click(function(){
        history.go(-1);
    });
}

function onlyNumberKey(evt) {
          
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}



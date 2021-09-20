const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const today = new Date();
//console.log(today);
const currentMonth = today.getMonth();
const currentYear = today.getFullYear();
var month=currentMonth;
var year=currentYear;
//console.log(year);

function UpdateCalendar(){
    month=10;
    year=2021;
    ModCell(month,year);
}

function DisplayNextMonth(){
    if (month < 11){
        month++;
    } else if (month == 11) {
        month = 0;
        year++;
    }
    ModCell(month,year);
    LabelCalendar(month,year);
}

/*
function LabelBookings(){

}
*/

function DisplayPreviousMonth(){
    if (month > 0){
        month--;
    } else if (month == 0) {
        month = 11;
        year--;
    }
    ModCell(month,year);
    LabelCalendar(month,year);
    //console.log('done by public .js script');
}

function DisplayCurrentMonth(){
    month=currentMonth;
    year=currentYear;
    ModCell(month,year);
    LabelCalendar(month,year);
}

function ModCell(month,year) {
    //Borrow algorithms from https://medium.com/@nitinpatel_20236/challenge-of-building-a-calendar-with-pure-javascript-a86f1303267d
    
    let firstDay = new Date(year, month).getDay();
    let nextMonth = new Date(year, month, 32).getDate();
    let daysInMonth = 32-nextMonth;

    let cellName;
    let cell;
    let calendarDate=(-1*firstDay)+1;
    let contentString;

    for (let i=1;i<=6;i++){
        for (let j=0;j<=6;j++){
            cellName=i+"_"+j;
            if (calendarDate > 0 && calendarDate <= daysInMonth){
                //document.getElementById(cellName).innerHTML='<p>'+calendarDate+'</p>';
                contentString = "<table><tr>"
                contentString += "<td id='"+calendarDate.toString().padStart(2, '0')+"_morning' style='color:#cccccc;font-size:8px'>●</td>"
                contentString += "<td id='"+calendarDate.toString().padStart(2, '0')+"_afternoon' style='color:#cccccc;font-size:8px'>●</td>"
                contentString += "<td id='"+calendarDate.toString().padStart(2, '0')+"_evening' style='color:#cccccc;font-size:8px'>●</td>"
                contentString += "</tr></table>"+calendarDate;
                
                document.getElementById(cellName).innerHTML = contentString;
                  
            } else {
                document.getElementById(cellName).innerHTML="";
            }
            calendarDate++;
        }
    }
    let calendarTitle = document.getElementById("calendar_title");
    calendarTitle.innerHTML = months[month] + " " + year; 
}
var getCurrentDate = function() {
    var today = new Date();
    return (today.getMonth()+1) +"/"+ today.getDate() +"/"+ today.getFullYear();
}

// Dummy data
var job_headers = ['JOB TITLE', 'OPERATING UNIT', 'CATEGORY', 'STATUS', 'BUSINESS UNIT', 'SUPERVISOR'];
var work_headers = ['COMPANY', 'POSITION', 'APPOINTMENT STATUS', 'DATE FROM', 'DATE TO'];
var education_headers = ['BACKGROUND LEVEL', 'NAME OF SCHOOL', 'DEGREE EARNED', 'INCLUSIVE YEARS', 'HONORS RECEIVED'];

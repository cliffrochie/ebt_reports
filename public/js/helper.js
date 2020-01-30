var getCurrentDate = function() {
    var today = new Date();
    return (today.getMonth()+1) +"/"+ today.getDate() +"/"+ today.getFullYear();
}

// Dummy data
var job_headers = ['JOB TITLE', 'DEPARTMENT', 'CATEGORY', 'STATUS', 'BRANCH', 'SUPERVISOR'];
var job_details = [
    {
        title: 'Instructor II', 
        department: 'Computer Education Department', 
        category: 'Professional',
        status: 'Full-time Contractual',
        branch: 'ACLC Butuan',
        supervisor: 'Gian O. Andyuan'
    },
];

var work_headers = ['COMPANY', 'POSITION', 'APPOINTMENT STATUS', 'DATE FROM', 'DATE TO'];
var work_details = [
    {
        company: 'ABC Company',
        position: 'Junior Developer',
        status: 'Direct Hiring',
        from: '4/12/2017',
        to: '9/21/2018'
    },
    {
        company: 'ABC Company',
        position: 'Junior Developer',
        status: 'Direct Hiring',
        from: '4/12/2017',
        to: '9/21/2018'
    },
];

var education_headers = ['BACKGROUND LEVEL', 'NAME OF SCHOOL', 'DEGREE EARNED', 'INCLUSIVE YEARS', 'HONORS RECEIVED'];
var education_details = [
    {
        level: 'Undergraduate',
        school_name: 'ACLC College of Butuan',
        degree: 'Bachelor of Science in Computer Science',
        inclusive: '2018 - 2019',
        honor: 'Cum Laude'
    },
    {
        level: 'Secondary Level',
        school_name: 'Agusan National High School',
        degree: 'High School',
        inclusive: '2015 - 2016',
        honor: ''
    },
    {
        level: 'Primary Level',
        school_name: 'Butuan Central Elementary School',
        degree: 'Elementary',
        inclusive: '2011 - 2012',
        honor: 'Top 10'
    },
];

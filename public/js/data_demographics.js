// generatePDF();
document.getElementById('current_date').textContent = getCurrentDate();

var dept_pop = document.getElementById('department_population');
var cate_pop = document.getElementById('category_population');
var gend_pop = document.getElementById('gender_population');
var jobv_pop = document.getElementById('job_vacancies_population');

var sample = {
    department_population: [
        {name: 'No Department', total: 6},
        {name: 'EngTech Global Solutions', total: 5},
        {name: 'Computer Education Department', total: 4},
        {name: 'Business Education Department', total: 4},
    ],
    category_population: [
        {name: 'Technical', total: 7},
        {name: 'Professional', total: 6},
        {name: 'Operatives', total: 5},
        {name: 'Office and Clerical Work', total: 3},
        {name: 'Craft Workers', total: 9},
    ],
    gender_population: [
        {name: 'Male', total: 12, background_color: 'rgba(109, 156, 214, 1)', border_color: 'rgba(109, 156, 214, 1)'},
        {name: 'Female', total: 8, background_color: 'rgba(212, 123, 166, 1)', border_color: 'rgba(212, 123, 166, 1)'}
    ],
    job_vacancies: [
        {title: 'Accounts Clerk', total: 3, background_color: 'rgba(52, 180, 235, 1)', border_color: 'rgba(52, 180, 235, 1)'},
        {title: 'Instructor', total: 1, background_color: 'rgba(96, 179, 135, 1)', border_color: 'rgba(96, 179, 135, 1)'},
        {title: 'Assistant Professor', total: 2, background_color: 'rgba(209, 183, 111, 1)', border_color: 'rgba(209, 183, 111, 1)'},
    ]
}

var dept_data = {
    labels: [],
    datasets: [{
        label: '# of Employees per Department',
        data: [],
        backgroundColor: 'rgba(255, 99, 132, 1)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
    }]
};

var cate_data = {
    labels: [],
    datasets: [{
        label: '# of Employees per Category',
        data: [],
        backgroundColor: 'rgba(50, 168, 86, 1)',
        borderColor: 'rgba(50, 168, 86, 1)',
        borderWidth: 1
    }]
};

var gend_data = {
    labels: ['Male', 'Female'],
    datasets: [{
        label: '# of Employees per Gender',
        data: [12, 8],
        backgroundColor: ['rgba(109, 156, 214, 1)', 'rgba(212, 123, 166, 1)'],
        borderColor: ['rgba(109, 156, 214, 1)', 'rgba(212, 123, 166, 1)'],
        borderWidth: 1
    }]
};

var jobv_data = {
    labels: [],
    datasets: [{
        labels: 'Job Vacancies',
        data: [],
        backgroundColor: [],
        borderColor: [],
        borderWidth: 1
    }]
}

// Populate data: Department Population
for(var i = 0; i < sample.department_population.length; i++) {
    dept_data.labels.push(sample.department_population[i].name);
    dept_data.datasets[0].data.push(sample.department_population[i].total);
}

// Populate data: Category Population
for(var i = 0; i < sample.category_population.length; i++) {
    cate_data.labels.push(sample.category_population[i].name);
    cate_data.datasets[0].data.push(sample.category_population[i].total);
}

// Populate data: Job Vacancies
for(var i = 0; i < sample.job_vacancies.length; i++) {
    jobv_data.labels.push(sample.job_vacancies[i].title);
    jobv_data.datasets[0].data.push(sample.job_vacancies[i].total);
    jobv_data.datasets[0].backgroundColor.push(sample.job_vacancies[i].background_color);
    jobv_data.datasets[0].borderColor.push(sample.job_vacancies[i].border_color);
}
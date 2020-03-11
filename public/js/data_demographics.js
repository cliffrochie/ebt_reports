// generatePDF();
document.getElementById('current_date').textContent = getCurrentDate();

var operating_unit_population = document.getElementById('operating_unit_population');
var business_unit_population = document.getElementById('business_unit_population');
var category_population = document.getElementById('category_population');
var gender_population = document.getElementById('gender_population');


// ------------------------------------------------------------------------

function insertOperatingUnit() {

    var data = getOperatingUnit();

    var operating_unit = {
        labels: [],
        datasets: [{
            label: '# of Employees per Operating Unit',
            data: [],
            backgroundColor: 'rgba(255, 99, 132, 1)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    for(var i = 0; i < data.length; i++) {
        operating_unit.labels.push(data[i].name);
        operating_unit.datasets[0].data.push(data[i].population);
    }

    return operating_unit;
}

function insertBusinessUnit() {

    var data = getBusinessUnit();

    var business_unit = {
        labels: [],
        datasets: [{
            label: '# of Operating Unit per Business Unit',
            data: [],
            backgroundColor: 'rgba(50, 168, 86, 1)',
            borderColor: 'rgba(50, 168, 86, 1)',
            borderWidth: 1
        }]
    };

    for(var i = 0; i < data.length; i++) {
        business_unit.labels.push(data[i].name);
        business_unit.datasets[0].data.push(data[i].population);
    }

    return business_unit;
}


function insertCategory() {

    var data = getCategory();

    var category = {
        labels: [],
        datasets: [{
            label: '# of Employees per Category',
            data: [],
            backgroundColor: 'rgba(109, 156, 214, 1)',
            borderColor: 'rgba(109, 156, 214, 1)',
            borderWidth: 1
        }]
    };

    for(var i = 0; i < data.length; i++) {
        category.labels.push(data[i].name);
        category.datasets[0].data.push(data[i].population);
    }

    return category;
}


function insertGender() {

    var data = getGender();

    var gender = {
        labels: [],
        datasets: [{
            label: '# of Employees per Gender',
            data: [],
            backgroundColor: ['rgba(212, 123, 166, 1)','rgba(109, 156, 214, 1)'],
            borderColor: ['rgba(212, 123, 166, 1)','rgba(109, 156, 214, 1)'],
            borderWidth: 1
        }]
    };

    for(var i = 0; i < data.length; i++) {
        gender.labels.push(data[i].name);
        gender.datasets[0].data.push(data[i].population);
    }

    return gender;
}
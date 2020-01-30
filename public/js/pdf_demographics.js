var data = {
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
        {name: 'Office and Clerical Work', total: 2},
        {name: 'Craft Workers', total: 1},
    ],
}

var generateDemographics = function(doc) {
}


// ---------------------------------------------------------------

var generatePDF = function() {
    var doc = new jsPDF('p', 'pt', 'a4');

    doc.setProperties({
        title: 'SERVIO HRMS Demographics',
    });

    generateEmployeeCategory(doc);
}
// Dummy data
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

var generateDemographics = function(doc, data) {

    doc.setFontSize(7);
    doc.text(getCurrentDate(), 545, 18);

    // Main-header
    doc.setFontSize(14);
    doc.setFontStyle('bold');

    doc.text('PORTAL', 18, 50);
    doc.text('DEMOGRAPHICS', 18, 70);

    // Content goes here
    doc.setFontSize(10);
    doc.setFontStyle('normal');

    doc.text('No. of Employees per Category', 18, 110)
    doc.text('Population', 18, 130);
}


// ---------------------------------------------------------------

var generatePDF = function() {
    var doc = new jsPDF('p', 'pt', 'a4');

    doc.setProperties({
        title: 'SERVIO HRMS Demographics',
    });

    generateDemographics(doc, data);
    doc.save('demographics.pdf');
}
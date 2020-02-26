// onclick
function generatePDF() {
    var doc = new jsPDF('p', 'pt', 'a4');
    doc.internal.scaleFactor = 30;

    var chart1 = document.getElementById('department_population');
    var dataURL1 = chart1.toDataURL("image/png");

    var chart2 = document.getElementById('category_population');
    var dataURL2 = chart2.toDataURL('image/png');

    var chart3 = document.getElementById('gender_population')
    var dataURL3 = chart3.toDataURL();

    var chart4 = document.getElementById('job_vacancies_population')
    var dataURL4 = chart4.toDataURL();

    var width = 260;
    var height = 130;


    console.log(dataURL4);

    // Heading
    // ----------------------------------------------------------------------
    // Date
    doc.setFontSize(7);
    doc.text(getCurrentDate(), 545, 18);


    // Main-header
    doc.setFontStyle('bold');
    doc.setFontSize(14);
    doc.text('PORTAL', 18, 50);
    doc.text('DEMOGRAPHICS', 18, 70);
    
    doc.setFontStyle('normal');
    doc.setFontSize(8);
    doc.text('The demographics of employee data.', 18, 100)

    doc.setTextColor(94, 92, 92);   
    doc.text('No. of Employees per Department', 100, 140);
    doc.addImage(dataURL1, 'PNG', 20, 150, width, height);

    doc.text('No. of Employees per Category', 380, 140);
    doc.addImage(dataURL2, 'PNG', 300, 150, width, height);

    doc.text('No. of Employees per Gender', 100, 340);
    doc.addImage(dataURL3, 'PNG', 20, 350, width, height);
    
    doc.text('No. of Job Vacancies and its Position', 380, 340);
    doc.addImage(dataURL4, 'PNG', 300, 350, width, height);

    doc.save('test.pdf');
}
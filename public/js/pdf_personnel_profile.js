var checkEmpty = function(data) {
    if(data == null || data == undefined) {
        data = "";
    }
    return data;
}

var generatePersonalInformation = function(doc, data) {

    // Date
    doc.setFontSize(7);
    doc.text(getCurrentDate(), 545, 18);

    doc.setFontStyle('bold');

    // Main-header
    doc.setFontSize(14);
    doc.text('PORTAL', 18, 50);
    doc.text('PERSONNEL PROFILE', 18, 70);

    // PERSONAL INFORMATION: Header 
    // ===============================================================================================
    doc.setFontSize(9);
    doc.text('PERSONAL INFORMATION', 18, 110);
    doc.rect(18, 120, 560, 130);

    doc.setFontSize(7);
    // PERSONAL INFORMATION: Lines
    doc.line(290, 120, 290, 155); // Vertical
    // Between: GENDER
    doc.line(360, 120, 360, 155); // Vertical
    // Between: BIRTHDAY
    doc.line(430, 120, 430, 155); // Vertical
    // Between: NATIONALITY
    doc.line(500, 120, 500, 155); // Vertical
    // Between: MARITAL
    // ----
    doc.line(18, 155, 578, 155); // Horizontal
    // PRESENT ADDRESS: Lines
    doc.line(430, 155, 430, 200); // Vertical
    doc.line(18, 200, 578, 200); // Horizontal
    // CONTACT DETAILS: Lines
    doc.line(190, 200, 190, 250); // Vertical
    // EMERGENCY CONTACT PERSON

    // PERSONAL INFORMATION: Fields 
    // -----------------------------------------------------------------------------------------------
    doc.setFontStyle('bold');
    doc.text('NAME', 25, 132);
    doc.text('GENDER', 295, 132);
    doc.text('BIRTHDAY', 365, 132);
    doc.text('NATIONALITY', 435, 132);
    doc.text('MARITAL STATUS', 505, 132);

    // PERSONAL INFORMATION: Data
    doc.setFontStyle('normal');
    doc.text(data.name, 25, 143); // NAME: Dummy data
    doc.text(data.gender, 295, 143); // GENDER: Dummy data
    doc.text(data.birthdate, 365, 143); // BIRTH DATE: Dummy data
    doc.text(data.nationality, 435, 143); // NATIONALITY: Dummy data
    doc.text(data.marital_status, 505, 143); // MARITAL STATUS: Dummy data

    // PRESENT ADDRESS: Fields  
    // -----------------------------------------------------------------------------------------------
    doc.setFontStyle('bold');
    doc.text('PRESENT ADDRESS', 25, 167);

    // PRESENT ADDRESS: Sub-Fields
    doc.setFontStyle('italic');
    doc.setFontSize(7);
    doc.text('Street', 25, 179);
    doc.text('City', 120, 179);
    doc.text('State/Province', 190, 179);
    doc.text('Country', 290, 179);
    doc.text('Zip Code', 370, 179);

    // PRESENT ADDRESS: Data
    doc.setFontStyle('normal');
    doc.text(data.street, 25, 190); // Street: Dummy data
    doc.text(data.city, 120, 190); // City: Dummy data
    doc.text(data.state_province, 190, 190); // State: Dummy data
    doc.text(data.country, 290, 190); // Country: Dummy data
    doc.text(data.zip, 370, 190); // Zip Code: Dummy data

    // EMAIL ADDRESS: Fields  
    // -----------------------------------------------------------------------------------------------
    doc.setFontStyle('bold');
    doc.text('EMAIL ADDRESS', 435, 167);
    
    // EMAIL ADDRESS: Data
    doc.setFontStyle('normal');
    doc.text(data.email, 435, 178);

    // CONTACT DETAILS: Fields  
    // -----------------------------------------------------------------------------------------------
    doc.setFontStyle('bold');
    doc.text('CONTACT DETAILS', 25, 212);
    

    // CONTACT DETAILS: Sub-Fields
    doc.setFontStyle('italic');
    doc.setFontSize(7); 
    doc.text('Mobile No.', 25, 225);
    doc.text('Telephone No.', 120, 225);

    doc.setFontStyle('normal');
    doc.text(data.mobile_number, 25, 236); // Mobile No.: Dummy data
    doc.text(data.telephone_number, 120, 236); // Telephone No.: Dummy data

    // EMERGENCY CONTACT PERSON: Fields  
    // -----------------------------------------------------------------------------------------------
    doc.setFontStyle('bold');
    doc.text('EMERGENCY CONTACT INFORMATION', 195, 212);

    // EMERGENCY CONTACT PERSON: Sub-Fields
    doc.setFontStyle('italic');
    doc.setFontSize(7); 
    doc.text('Contact Person', 195, 225);
    doc.text('Relationship', 320, 225);
    doc.text('Mobile No.', 420, 225);
    doc.text('Telephone No.', 500, 225);

    // EMERGENCY CONTACT PERSON: Data
    doc.setFontStyle('normal');
    doc.text(data.emergency_person.contact_name, 195, 236); // Emergency Person: Dummy data
    doc.text(data.emergency_person.relationship, 320, 236); // Relationship: Dummy data
    doc.text(data.emergency_person.mobile, 420, 236); // Mobile No.: Dummy data
    doc.text(data.emergency_person.home_telephone, 500, 236); // Telephone No.: Dummy data
}


// Functions: Employment Information
// ===============================================================================================
var generateEmploymentInformation = function(doc, headers, data, pos) {
    var code = "";
    var isEmpty = true;
    if(data != null || data != undefined) {
        isEmpty = false;
        code = checkEmpty(data[0].code)
    }

    var xstart = pos.xstart;
    var ystart = pos.ystart;
    var y = ystart + 10;
  
    // EMPLOYEE INFORMATION: Header
    doc.setFontStyle('bold');
    doc.setFontSize(9);
    doc.text('EMPLOYMENT INFORMATION', pos.header.x, pos.header.y);
    doc.rect(pos.rect.x, pos.rect.y, pos.rect.w, pos.rect.h);
    doc.setFontSize(7);

    // EMPLOYEE CODE: Fields  
    // -----------------------------------------------------------------------------------------------
    doc.text('EMPLOYEE CODE', pos.code_field.x, pos.code_field.y);

    // EMPLOYEE CODE: Data  
    doc.setFontStyle('normal');
    if(!isEmpty) {
        doc.text(code, pos.code_data.x, pos.code_data.y); // Employee Code: Dummy data
    }

    // Data header
    doc.setFontStyle('bold');
    doc.setFontSize(7);
    doc.text(headers[0], pos.job_header.x, pos.job_header.y);
    doc.text(headers[1], pos.job_header.x + 90, pos.job_header.y);
    doc.text(headers[2], pos.job_header.x + 220, pos.job_header.y);
    doc.text(headers[3], pos.job_header.x + 290, pos.job_header.y);
    doc.text(headers[4], pos.job_header.x + 380, pos.job_header.y);
    doc.text(headers[5], pos.job_header.x + 460, pos.job_header.y);
    
    // Header 
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h
    ); // Vertical Right
   
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y + pos.line_extend, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h + pos.line_extend
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y + pos.line_extend, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h + pos.line_extend
    ); // Vertical Right


    // Data items
    doc.setFontStyle('normal');
    if(!isEmpty) {
        for(var i = 0; i < data.length; i++) {
            pos.line_extend += 10;
            // [18, 345, 18, 355]
            // [578, 345, 578, 355]
            doc.text(checkEmpty(data[i].job_title), xstart, y); // Title
            doc.text(checkEmpty(data[i].department), xstart + 90, y); // Department
            doc.text(checkEmpty(data[i].job_category), xstart + 220, y); // Category
            doc.text(checkEmpty(data[i].employment_status), xstart + 290, y); // Status
            doc.text(checkEmpty(data[i].branch), xstart + 380, y); // Branch
            doc.text(checkEmpty(data[i].supervisor), xstart + 460, y); // Supervisor
    
            doc.line(
                pos.job_vline.left.x,
                pos.job_vline.left.y + pos.line_extend,
                pos.job_vline.left.w,
                pos.job_vline.left.h + pos.line_extend
            );
    
            doc.line(
                pos.job_vline.right.x,
                pos.job_vline.right.y + pos.line_extend,
                pos.job_vline.right.w,
                pos.job_vline.right.h + pos.line_extend
            );
    
            y += 10;
            if((i+1) == data.length) {
                doc.line(
                    pos.job_vline.left.x,
                    pos.job_vline.left.y + pos.line_extend + 10,
                    pos.job_vline.left.w,
                    pos.job_vline.left.h + pos.line_extend + 10
                ); // Vertical line
        
                doc.line(
                    pos.job_vline.right.x,
                    pos.job_vline.right.y + pos.line_extend + 10,
                    pos.job_vline.right.w,
                    pos.job_vline.right.h + pos.line_extend + 10
                ); // Vertical line
    
                doc.line(
                    18,
                    335 + pos.line_extend + 10,
                    578,
                    335 + pos.line_extend + 10
                ); // Horizontal line
    
    
                return 335 + pos.line_extend + 10
            }
        }
    }
    else {
        doc.line(
            pos.job_vline.left.x,
            pos.job_vline.left.y + pos.line_extend + 10,
            pos.job_vline.left.w,
            pos.job_vline.left.h + pos.line_extend + 10
        ); // Vertical line

        doc.line(
            pos.job_vline.right.x,
            pos.job_vline.right.y + pos.line_extend + 10,
            pos.job_vline.right.w,
            pos.job_vline.right.h + pos.line_extend + 10
        ); // Vertical line
        // -----

        doc.line(
            18,
            335 + pos.line_extend + 10,
            578,
            335 + pos.line_extend + 10
        ); // Horizontal line


        return 335 + pos.line_extend + 10
    }
    
}









// Functions: Work Experience
// ===============================================================================================
var generateWorkExperience = function(doc, headers, data, pos) {


    var xstart = pos.xstart;
    var ystart = pos.ystart;
    var y = ystart + 10;
  

    // WORK EXPERIENCE: Header
    doc.setFontStyle('bold');
    doc.setFontSize(9);
    doc.text('WORK EXPERIENCE', pos.header.x, pos.header.y);
    doc.line(pos.top_line.x, pos.top_line.y, pos.top_line.w, pos.top_line.h);
   
    

    // Data header
    doc.setFontStyle('bold');
    doc.setFontSize(7);
    doc.text(headers[0], pos.work_header.x, pos.work_header.y);
    doc.text(headers[1], pos.work_header.x + 100, pos.work_header.y);
    doc.text(headers[2], pos.work_header.x + 230, pos.work_header.y);
    doc.text(headers[3], pos.work_header.x + 380, pos.work_header.y);
    doc.text(headers[4], pos.work_header.x + 460, pos.work_header.y);
    
    // Header 
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h
    ); // Vertical Right
   
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y + pos.line_extend, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h + pos.line_extend
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y + pos.line_extend, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h + pos.line_extend
    ); // Vertical Right


    // Data items
    doc.setFontStyle('normal');
    if(data != null) {
        for(var i = 0; i < data.length; i++) {
            pos.line_extend += 10;
            // [18, 345, 18, 355]
            // [578, 345, 578, 355]
            doc.text(checkEmpty(data[i].company), xstart, y); // Company
            doc.text(checkEmpty(data[i].position), xstart + 100, y); // Position
            doc.text(checkEmpty(data[i].appointment_status), xstart + 230, y); // Status
            doc.text(checkEmpty(data[i].date_from), xstart + 380, y); // From
            doc.text(checkEmpty(data[i].date_to), xstart + 460, y); // To
    
            doc.line(
                pos.job_vline.left.x,
                pos.job_vline.left.y + pos.line_extend,
                pos.job_vline.left.w,
                pos.job_vline.left.h + pos.line_extend
            );
    
            doc.line(
                pos.job_vline.right.x,
                pos.job_vline.right.y + pos.line_extend,
                pos.job_vline.right.w,
                pos.job_vline.right.h + pos.line_extend
            );
    
            y += 10;
            if((i+1) == data.length) {
                doc.line(
                    pos.job_vline.left.x,
                    pos.job_vline.left.y + pos.line_extend + 10,
                    pos.job_vline.left.w,
                    pos.job_vline.left.h + pos.line_extend + 10
                ); // Vertical line
        
                doc.line(
                    pos.job_vline.right.x,
                    pos.job_vline.right.y + pos.line_extend + 10,
                    pos.job_vline.right.w,
                    pos.job_vline.right.h + pos.line_extend + 10
                ); // Vertical line
    
                doc.line(
                    18,
                    pos.end_line + pos.line_extend + 10,
                    578,
                    pos.end_line + pos.line_extend + 10
                ); // Horizontal line
                
                return pos.end_line + pos.line_extend + 10
            }
        }
    }
    else {
        doc.line(
            pos.job_vline.left.x,
            pos.job_vline.left.y + pos.line_extend + 10,
            pos.job_vline.left.w,
            pos.job_vline.left.h + pos.line_extend + 10
        ); // Vertical line

        doc.line(
            pos.job_vline.right.x,
            pos.job_vline.right.y + pos.line_extend + 10,
            pos.job_vline.right.w,
            pos.job_vline.right.h + pos.line_extend + 10
        ); // Vertical line

        doc.line(
            18,
            pos.end_line + pos.line_extend + 10,
            578,
            pos.end_line + pos.line_extend + 10
        ); // Horizontal line
        
        return pos.end_line + pos.line_extend + 10
    }
    
}








// Functions: Education Background
// ===============================================================================================
var generateEducationBackground = function(doc, headers, data, pos) {

    var xstart = pos.xstart;
    var ystart = pos.ystart;
    var y = ystart + 10;
  

    // WORK EXPERIENCE: Header
    doc.setFontStyle('bold');
    doc.setFontSize(9);
    doc.text('EDUCATION BACKGROUND', pos.header.x, pos.header.y);
    doc.line(pos.top_line.x, pos.top_line.y, pos.top_line.w, pos.top_line.h);
   
    

    // Data header
    doc.setFontStyle('bold');
    doc.setFontSize(7);
    doc.text(headers[0], pos.work_header.x, pos.work_header.y);
    doc.text(headers[1], pos.work_header.x + 100, pos.work_header.y);
    doc.text(headers[2], pos.work_header.x + 230, pos.work_header.y);
    doc.text(headers[3], pos.work_header.x + 380, pos.work_header.y);
    doc.text(headers[4], pos.work_header.x + 460, pos.work_header.y);
    
    // Header 
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h
    ); // Vertical Right
   
    doc.line(
        pos.job_vline.left.x, 
        pos.job_vline.left.y + pos.line_extend, 
        pos.job_vline.left.w, 
        pos.job_vline.left.h + pos.line_extend
    ); // Vertical Left
   
    doc.line(
        pos.job_vline.right.x, 
        pos.job_vline.right.y + pos.line_extend, 
        pos.job_vline.right.w, 
        pos.job_vline.right.h + pos.line_extend
    ); // Vertical Right


    // {
    //     level: 'Undergraduate',
    //     school_name: 'ACLC College of Butuan',
    //     degree: 'Bachelor of Science in Computer Science',
    //     inclusive: '2018 - 2019',
    //     honor: 'Cum Laude'
    // },

    // Data items   
    doc.setFontStyle('normal');
    if(data != null) {
        for(var i = 0; i < data.length; i++) {
            if(data[i].background_level != "" && data[i].school_name != "" && data[i].degree != "") {
                pos.line_extend += 10;
                // [18, 345, 18, 355]
                // [578, 345, 578, 355]
                doc.text(checkEmpty(data[i].background_level), xstart, y); // Level
                doc.text(checkEmpty(data[i].school_name), xstart + 100, y); // School Name
                doc.text(checkEmpty(data[i].degree), xstart + 230, y); // Degree
                var inclusive_years = "";
                if(data[i].date_start != "" || data[i].date_end != "") {
                    inclusive_years = data[i].date_start +"-"+ data[i].date_end;
                }
                doc.text(inclusive_years, xstart + 380, y); // Inclusive
                doc.text(checkEmpty(data[i].honors), xstart + 460, y); // Honor
        
                doc.line(
                    pos.job_vline.left.x,
                    pos.job_vline.left.y + pos.line_extend,
                    pos.job_vline.left.w,
                    pos.job_vline.left.h + pos.line_extend
                );
        
                doc.line(
                    pos.job_vline.right.x,
                    pos.job_vline.right.y + pos.line_extend,
                    pos.job_vline.right.w,
                    pos.job_vline.right.h + pos.line_extend
                );
        
                y += 10;
                if((i+1) == data.length) {
                    doc.line(
                        pos.job_vline.left.x,
                        pos.job_vline.left.y + pos.line_extend + 10,
                        pos.job_vline.left.w,
                        pos.job_vline.left.h + pos.line_extend + 10
                    ); // Vertical line
            
                    doc.line(
                        pos.job_vline.right.x,
                        pos.job_vline.right.y + pos.line_extend + 10,
                        pos.job_vline.right.w,
                        pos.job_vline.right.h + pos.line_extend + 10
                    ); // Vertical line
        
                    doc.line(
                        18,
                        pos.end_line + pos.line_extend + 10,
                        578,
                        pos.end_line + pos.line_extend + 10
                    ); // Horizontal line
                    
                    return pos.end_line + pos.line_extend + 10
                }
            }
            else {
                doc.line(
                    pos.job_vline.left.x,
                    pos.job_vline.left.y + pos.line_extend + 10,
                    pos.job_vline.left.w,
                    pos.job_vline.left.h + pos.line_extend + 10
                ); // Vertical line
        
                doc.line(
                    pos.job_vline.right.x,
                    pos.job_vline.right.y + pos.line_extend + 10,
                    pos.job_vline.right.w,
                    pos.job_vline.right.h + pos.line_extend + 10
                ); // Vertical line

                doc.line(
                    18,
                    pos.end_line + pos.line_extend + 10,
                    578,
                    pos.end_line + pos.line_extend + 10
                ); // Horizontal line
        
                return pos.end_line + pos.line_extend + 10
            }
        }
    }
    else {
        doc.line(
            pos.job_vline.left.x,
            pos.job_vline.left.y + pos.line_extend + 10,
            pos.job_vline.left.w,
            pos.job_vline.left.h + pos.line_extend + 10
        ); // Vertical line

        doc.line(
            pos.job_vline.right.x,
            pos.job_vline.right.y + pos.line_extend + 10,
            pos.job_vline.right.w,
            pos.job_vline.right.h + pos.line_extend + 10
        ); // Vertical line

        doc.line(
            18,
            pos.end_line + pos.line_extend + 10,
            578,
            pos.end_line + pos.line_extend + 10
        ); // Horizontal line

        return pos.end_line + pos.line_extend + 10
    }
    
}








// PDF Generator
var generatePDF = function(data) {

    console.log(">>>>>")
    console.log(data);


    var doc = new jsPDF('p', 'pt', 'a4');

    doc.setProperties({
        title: 'Personnel Profile',
    });

    // PERSONAL INFORMATION 
    // ===============================================================================================
    generatePersonalInformation(doc, data);


    // EMPLOYEE INFORMATION 
    // ===============================================================================================
    
    var ei_pos = {
        line_extend: 10,
        header: {x: 18, y: 280},
        rect: {x: 18, y: 290, w: 560, h: 35},
        code_field: {x: 25, y: 302},
        code_data: {x: 25, y: 313},
        job_header: {x: 25, y: 340},
        job_vline: {
            left: {x: 18, y: 325, w: 18, h: 335},
            right: {x: 578, y: 325, w: 578, h: 335}
        },
        xstart: 25,
        ystart: 342,
    }
    
    // Details
    var height_extend = generateEmploymentInformation(doc, job_headers, data.employment_details, ei_pos);


    // WORK EXPERIENCE
    // ===============================================================================================

    var we_pos = {
        line_extend: 10,
        header: {x: 18, y: height_extend + 25},
        top_line: {x: 18, y: height_extend + 35, w: 578, h: height_extend + 35},
        work_header: {x: 25, y: height_extend + 48},
        job_vline: {
            left: {x: 18, y: height_extend + 35, w: 18, h: height_extend + 45},   
            right: {x: 578, y: height_extend + 35, w: 578, h: height_extend + 45}
        },
        xstart: 25,
        ystart: height_extend + 50,
        end_line: height_extend + 45,
    }

    // Details
    height_extend = generateWorkExperience(doc, work_headers, data.work_experience, we_pos);


    // EDUCATION BACKGROUND
    // ===============================================================================================
    var eb_pos = {
        line_extend: 10,
        header: {x: 18, y: height_extend + 25},
        top_line: {x: 18, y: height_extend + 35, w: 578, h: height_extend + 35},
        work_header: {x: 25, y: height_extend + 48},
        job_vline: {
            left: {x: 18, y: height_extend + 35, w: 18, h: height_extend + 45},   
            right: {x: 578, y: height_extend + 35, w: 578, h: height_extend + 45}
        },
        xstart: 25,
        ystart: height_extend + 50,
        end_line: height_extend + 45,
    }

    height_extend = generateEducationBackground(doc, education_headers, data.education_background, eb_pos);


    // Save
    // doc.save();
    // window.open(doc.output('bloburl', '_blank'));
    return doc;
}












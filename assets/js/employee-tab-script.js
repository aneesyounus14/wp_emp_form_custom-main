/**
* Function of PDF
*/
jQuery(document).ready(function($){

    $('.emp_print').click(function () {

            id = $(this).attr("id");

            var pid1 = 'get-' + id + '-1';
            var pid2 = 'get-' + id + '-2';
            var pid3 = 'get-' + id + '-3';
            var pid4 = 'get-' + id + '-4';
            var pid5 = 'get-' + id + '-5';
            var pid6 = 'get-' + id + '-6';
            var pid7 = 'get-' + id + '-7';
            var pid8 = 'get-' + id + '-8';
            var pid9 = 'get-' + id + '-9';

            var img   = document.getElementById(pid1).firstChild.src
            var firstname = document.getElementById(pid2).innerText
            var lastname = document.getElementById(pid3).innerText
            var email = document.getElementById(pid4).innerText
            var design = document.getElementById(pid5).innerText
            var dob = document.getElementById(pid6).innerText
            var gender = document.getElementById(pid7).innerText
            var skills = document.getElementById(pid8).innerText
            var city = document.getElementById(pid9).innerText
            

            to_be_print = window.open("");

            to_be_print.document.write(
                
                `<div style="padding:50px">
                    <h1 style="font-family: sans-serif; font-size: 48px;">Employee Details</h1>
                    <img src="${img}" width="100" height="100"/>
                    <p style="font-family: sans-serif; font-size: 22px;"><b>First Name :</b> ${firstname} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>Last Name :</b> ${lastname} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>E-mail :</b> ${email} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>Desgination</b> : ${design} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>Date Of Birth</b> : ${dob} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>Gender</b> : ${gender} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>Skills In % ?</b> : ${skills} <br><br>
                    <pstyle="font-family: sans-serif; font-size: 22px;"><b>City</b> : ${city} <br><br>
                
                </div>`

            );

            to_be_print.print();
            to_be_print.close();

        }
    );
    

    
});
function updateTextInput(val) {
    document.getElementById('textInput').value=val; 
  }

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
// function department() {
//     document.getElementById("mydepartment").classList.toggle("show");
// }

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("department-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


// ----------------confirmNextExam()----------------
function confirmNextExam(){
  if (confirm("Are you sure you want to start New Exam")) {
    if (confirm("For New Exam ALL Previous Data will be Deleted..")) {
      location.href='deletePreviousData.php';
    }  
  }else{
    location.href='adminHome.php';
  }
}
// ---------------------------------------------------------------
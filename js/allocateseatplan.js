function subject1() {
	var dep1=document.getElementById('dep1').value;
	
	var sem1=document.getElementById('sem1').value;
	
	var totalid=document.getElementById('id').value;

	var s1=document.getElementById("s1");
	s1.innerHTML="";
	
		var departmentid=1;
		var semesterid=500;
		var subjectid=1000;

		var subject=Array[totalid];
		var department=Array[totalid];
		var semester=Array[totalid];

		var i=1;

	for (i; i <= totalid; i++) {

    	department=document.getElementById(departmentid).value;
    	semester=document.getElementById(semesterid).value
   		subject=document.getElementById(subjectid).value;

		if (department==dep1 && semester==sem1) {
			//document.getElementById("detail6").innerHTML=subject;
			var newopt=	document.createElement("option");
			newopt.value=subject;
			newopt.innerHTML=subject;
			s1.options.add(newopt);
		}
		departmentid++;
		semesterid++;
		subjectid++;
	}
}
//--------------------------------------------------------------------------

function subject2() {
	var dep2=document.getElementById('dep2').value;

	var sem2=document.getElementById('sem2').value;

	var totalid=document.getElementById('id').value;

	var s2=document.getElementById("s2");
	 s2.innerHTML="";
	// var opt=	document.createElement("option");
	// opt.value="";
	// opt.innerHTML=subject;
	// s2.options.add(opt);
	
		var departmentid=1;
		var semesterid=500;
		var subjectid=1000;

		var subject=Array[totalid];
		var department=Array[totalid];
		var semester=Array[totalid];

		var i=1;

	for (i; i <= totalid; i++) {

    	department=document.getElementById(departmentid).value;
    	semester=document.getElementById(semesterid).value
   		subject=document.getElementById(subjectid).value;

		if (department==dep2 && semester==sem2) {
			//document.getElementById("detail6").innerHTML=subject;
			var newopt=	document.createElement("option");
			newopt.value=subject;
			newopt.innerHTML=subject;
			s2.options.add(newopt);
		}
		departmentid++;
		semesterid++;
		subjectid++;
	}
}
//----------------------------------------------------------------


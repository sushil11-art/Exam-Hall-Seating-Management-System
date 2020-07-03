
// ----------------delete particulat data-----------------
function confirmDelete(delid){
  if (confirm("Are you sure you want to delete?")) {
  	location.href='Delete.php?id='+delid+'';
  	return true;
  }else{
  	location.href='viewData.php';
  }

}

// ----------------delete All----------------
function confirmDeleteAll(){
	if (confirm("Are you sure you want to delete?")) {
		location.href='deleteAll.php';
	}else{
  	location.href='viewData.php';
  }
}

// ------------------------------------------
function confirmEdit(edid){
                if (confirm("Are you sure you want to Edit ?")) {
                  location.href='DataUpdate.php?id='+edid+'';
                }else{
                    location.href='viewData.php';
             }
     }
//=============================================

function conformDeletestaff(id) {
        if (confirm("Are you sure you want to delete?")) {
            location.href='deletestaff.php?id='+id+'';
              return true;
              }else{
              location.href='staffMng.php';
            }
        }
        function conformDeletestaf(id) {
          if (confirm("Are you sure you want to delete?")) {
              location.href='deletestaff.php?id='+id+'';
                return true;
                }else{
                location.href='invigilatorManage.php';
              }
          }
//---------------------------------------------
// $(document).ready(function(){

// 	$(".delete_btn").click(function(){
// 		return confirm("Are you sure you want to delete?");
// 	});
	
// });
// Модальное окно 

function modalWindow(){
	
//document.write('<div class="modal bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="...">');
document.write('<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">');
  document.write('<div class="modal-dialog modal-sm" role="document">');
    document.write('<div class="modal-content">');
        document.write('<div class="modal-body">');
			document.write('<p id="modalTxt" style="font-size: 12pt; font-weight: bold;" />');
      document.write('</div>');
      document.write('<div class="modal-footer">');
        document.write('<button type="button" class="btn btn-primary" data-dismiss="modal" id="closeBtn">Ok</button>');
      document.write('</div>');
    document.write('</div>');
  document.write('</div>');
document.write('</div>');


	$('#closeBtn').on('click', 	function(){
					location.reload();
					});    

}// modalWindow()


// Данное окно не перегружает страницу
function modalWindowNonReload(){

//document.write('<div class="modal bs-example-modal-sm" id="myModalNonReload" tabindex="-1" role="dialog" aria-labelledby="...">');
document.write('<div class="modal fade bs-example-modal-sm" id="myModalNonReload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">');
  document.write('<div class="modal-dialog modal-sm" role="document">');
    document.write('<div class="modal-content">');
        document.write('<div class="modal-body">');
			document.write('<p id="modalTxtNonReload" style="font-size: 12pt; font-weight: bold;" />');
      document.write('</div>');
      document.write('<div class="modal-footer">');
        document.write('<button type="button" class="btn btn-primary" data-dismiss="modal" id="closeBtn">Ok</button>');
      document.write('</div>');
    document.write('</div>');
  document.write('</div>');
document.write('</div>');

}// modalWindowNonReload(){








































































						
							
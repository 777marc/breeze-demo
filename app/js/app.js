$(document).ready(function() {

  // set default grid visibility
  $('#people-table').hide();
  $('#errors').hide();
  $('#messages').hide();

  // get already loaded users
  loadGroups();

  // The event listener for the file upload
  document.getElementById('txtFileUpload').addEventListener('change', upload, false);

  // Method that checks that the browser supports the HTML5 File API
  function browserSupportFileUpload() {
      var isCompatible = false;
      if (window.File && window.FileReader && window.FileList && window.Blob) {
          isCompatible = true;
      }
      return isCompatible;
  }

  // Method that reads and processes the selected file
  function upload(evt) {
      if (!browserSupportFileUpload()) {
          alert('The File APIs are not fully supported in this browser!');
      }
      else {
          var data = null;
          var file = evt.target.files[0];
          var reader = new FileReader();
          reader.readAsText(file);
          reader.onload = function(event) {
              var csvData = event.target.result;
              data = $.csv.toObjects(csvData.replace(/"/g, ''));
              if (data && data.length > 0) {

                  if (JSON.stringify(Object.keys(data[0])) === JSON.stringify(getPersonSchema())) {
                      addPeople(data);
                      $('#people-table').show();
                      loadGroups();
                  }
                  else if(JSON.stringify(Object.keys(data[0])) === JSON.stringify(getGroupSchema())) {
                      addGroups(data)
                  }
                  else {
                      showError('The file format is invalid!');
                  }
              }
              else {
                  showError('No data to import!');
                  $('#people-table').hide();
              }
          };
          reader.onerror = function() {
              showError('Unable to read ' + file.fileName);
          };
      }
  }

  function addPeople(data) {
      $.ajax({
          type: "POST",
          url: "server/AddPeople.php",
          data: {arr: JSON.stringify(data)},
          success: function(data){
              showMessage("success in loading people!");},
          failure: function(errMsg) {
              showError("error:" . errMsg);
          }
      });
  }

  function addGroups(data) {
      $.ajax({
          type: "POST",
          url: "server/AddGroups.php",
          data: {arr: JSON.stringify(data)},
          success: function(data){
              showMessage("success in loading groups!");},
          failure: function(errMsg) {
              showError("error:" . errMsg);
          }
      });
  }

  function loadGroups() {
      $.get( "server/GetGroups.php", function( data ) {
          console.log('load',data);
          if(data != '[]') {
              $('#people-table').dynatable({ dataset: { records: JSON.parse(data.toString()) }});
              $('#people-table').show();
          }
      });
  }

  function showError(message) {
      $('#errors').show();
      $("#errors").html(message);
  }

  function showMessage(message) {
    $('#messages').show();
    $("#messages").html(message);
}


});
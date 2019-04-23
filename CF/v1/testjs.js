//create by igagamao 30/04/2019 ------------------------------------------------------
document.addEventListener( 'wpcf7mailsent', function( event ) {
//modified by alforque 15/04/2019
	var inputs = event.detail.inputs;
	var InputName = InputNumber = InputEmail = InputMessage = InputNote = InputPortfolio = SpinnerId = "" ;
	
    for ( var i = 0; i < inputs.length; i++ ) {

    	  
    	// test = inputs[i].name;
		// alert(test);
		switch(inputs[i].name) {
		
			case 'your-name':
				InputName = inputs[i].value ;			
				continue;
			case 'your-number':
				InputNumber = inputs[i].value ;
				continue;
			case 'your-email':
				InputEmail = inputs[i].value ;
				continue;
			case 'your-message':
				InputMessage = inputs[i].value ;
				continue;
			case 'notifications[]':
				InputNote = inputs[i].value;
				continue;
			case 'portfolio-url':
				InputPortfolio = inputs[i].value;
			default:

		}
			
    }

    // send loading spinner id's for contact forms
    if ( '3062' == event.detail.contactFormId ) {
    	SpinnerId = 1;
    }else if ( '3095' == event.detail.contactFormId ) {
		SpinnerId = 2;
    }else if ( '1288' == event.detail.contactFormId ) {
    	SpinnerId = 3;
    }
    else if ( '190' == event.detail.contactFormId) {
    	SpinnerId = 4;
    }
    // SpinnerId = 41;
      alert(SpinnerId);
    sarateltoJiraIntegration(InputName,InputNumber,InputEmail,InputMessage,InputNote,InputPortfolio,SpinnerId);

}, false );


function sarateltoJiraIntegration(InputName,InputNumber,InputEmail,InputMessage,InputNote,InputPortfolio,SpinnerId) {

	$.ajax({
		// url: "/wordpress/API/testapi.php",
		// url: "/Word/wordpress/transition/",
		 // url: "/Word/wordpress/API/testapi.php/",
		  url: "/Word/wordpress/API/v4/contact_jira.php/",
		type: "POST",
		dataType: "text",
		data: { field1: InputName,
			    field2 : InputNumber,
			    field3 : InputEmail,
			    field4 : InputMessage,
			    field5 : InputNote,
			    field6 : InputPortfolio,
			    spinid : SpinnerId
			} ,
		success: function(data){
			 //var w = window.open('about:blank');
			  w.document.write(data);
			// setTimeout(function() {
			// w.close();
			// }, 3000);
			 alert("OK");
		/*$("#mySpinner"+SpinnerId).slideToggle();
		setTimeout(function() {
			$("#mySpinner"+SpinnerId).slideUp(2000);
		}, 2000);*/
		},
		error: function(request, error){
			alert('Problem getting data ' + error);
		},
    });

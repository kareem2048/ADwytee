$(document).ready(function(){
	$("#regp").click(function(){
		 $(".regasp").removeClass("fade");
			$(".regasph").addClass("fade");
			$(".regasph").hide();
			$(".regasp").show();
		
	})
	$("#regph").click(function(){
	$(".regasph").removeClass("fade");
		$(".regasp").addClass("fade");
		$(".regasp").hide();
		$(".regasph").show();
	});
	
});
$('#preg-form').submit(function(event){
	event.preventDefault();
	registerfunction();
});
$('#phreg-form').submit(function(event){
	event.preventDefault();
	registerfunction();
});
function registerfunction(){
$('#preg-form').validate({ // initialize the plugin
    rules: {
    	email: {
            email: true
        },
        password: {
        	minlength: 8,
        	maxlength: 16
        }
    },
messages: {

},
     submitHandler: submitForm
})
}
 function submitForm()
    {
var data = $("#preg-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data
             ,success :  function(data)
            {
            	 //TODO khaled
                if(data=="1"){
                	alert("wrong or dublicated mail");
                }else{
                	alert("Registered");
                }

            }

    })
}
function registerphfunction(){
$('#phreg-form').validate({ // initialize the plugin
        rules: {
        	email: {
                email: true
            },
            pass: {
            	minlength: 8,
            	maxlength: 16
            }
            },
        messages: {
       
        },
             submitHandler: submitForm1
    })

}
 function submitForm1()
    {
var data = $("#phreg-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data
             ,success :  function(data)
            {
            	 //TODO khaled
              if(data=="1"){
            	  alert("wrong or dublicated mail");
                }else{
                	   alert("Registered");
                }

            }

    })
}
function loginfunction(){
$('.login-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },password:{
                required:true,
            }},




             submitHandler: submitForm2
    })

}

function submitForm2()
    {
var data = $(".login-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data,
             success :  function(data)
            {
              if(data=="0"){
                alert("Incorrect email or password!");
              }else{
                var arr = JSON.parse(data);
                alert("Welcome!");
                window.location.href+="?userType=" + arr[0] + "&userId=" + arr[1];
              }

            }

    })
}
<?php
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>test page</title>
	<?php
		require_once("config/headScripts.php");
	?>
	<style type="text/css">
		.error-class{
			color: red;
		}
	</style>
</head>
<body>
	<form>
	<div class="col-md-5">
		
		<div class="form-group label-floating">
			<label class="control-label" for="address">Address</label>        
			<textarea type="text" class="form-control" id="address" maxlength="100"></textarea>
			<span class="help-block" style="width: 100%;">Characters remaining: 
				<span id="addressCharacterCount"></span>
				<span class="help-text" style="float: right;">No special characters allowed except ',.-'</span>
			</span>
		</div>
	</div>
		<div>
			<button class="jobsActions">test</button>
			<select class="list" id="list1" onclick="javascript: checkFunction(this);">
			    <option value="op3">op3</option>
			    <option value="aop6">aop6</option>
			    <option value="dop1">dop1</option>
			    <option value="nobp2">nobp2</option>
			    <option value="bop7">bop7</option>
			    <option value="cop5">cop5</option>
			    <option value="yop4">yop4</option>
			</select>	
		</div>
		<div>
			<button class="jobsActions">test</button>
			<select class="list" id="list2" onclick="javascript: checkFunction(this);">
			    <option value="op3">op3</option>
			    <option value="aop6">aop6</option>
			    <option value="dop1">dop1</option>
			    <option value="nobp2">nobp2</option>
			    <option value="bop7">bop7</option>
			    <option value="cop5">cop5</option>
			    <option value="yop4">yop4</option>
			</select>
		</div>
		<div>	
			<button class="jobsActions">test</button>
			<select class="jobsActions" id="list3" onclick="javascript: checkFunction(this);">
			    <option value="op3">op3</option>
			    <option value="aop6">aop6</option>
			    <option value="dop1">dop1</option>
			    <option value="nobp2">nobp2</option>
			    <option value="bop7">bop7</option>
			    <option value="cop5">cop5</option>
			    <option value="yop4">yop4</option>
			</select>
		</div>
		<div>	
			<button class="jobsActions">test</button>
			<select class="jobsActions" id="list4" onclick="javascript: checkFunction(this);">
			    <option value="op3">op3</option>
			    <option value="aop6">aop6</option>
			    <option value="dop1">dop1</option>
			    <option value="nobp2">nobp2</option>
			    <option value="bop7">bop7</option>
			    <option value="cop5">cop5</option>
			    <option value="yop4">yop4</option>
			</select>
		</div>
		<button type="button" onclick="javascript: testImage();">Test</button>
	</form>

	<button onclick="javascript: testFunction();">Click me </button>

	<?php
		require_once("config/endingScripts.php");
	?>
	<script type="text/javascript">
	$('#address').keyup(function(e){
		// alert(String.fromCharCode(e.which));
		if(String.fromCharCode(e.which).match(/[^a-zA-Z0-9 ,.-]/)){
			// alert(String.fromCharCode(e.which));
			$("#address").closest(".form-group").children(".help-block").children(".help-text").addClass("error-class");
		}
		else{
			// alert(String.fromCharCode(e.which));
			$("#address").closest(".form-group").children(".help-block").children(".help-text").removeClass("error-class");

		}
		$(this).val($(this).val().replace(/[^a-z0-9 ,.-]/gi,''));

	});

		function checkFunction(a){

			var getId = $(a).attr("id");

			alert(getId);
			var options = $("#"+getId+" option");

			options.detach().sort(function(a,b) {               // Detach from select, then Sort
			    var at = $(a).text();
			    var bt = $(b).text();
			    // console.log(bt);         
			    return (at > bt)?1:((at < bt)?-1:0);            // Tell the sort function how to order
			});
			options.appendTo("#"+getId);   
		}
		// var options = $("#list option"); 

		$(".selectpicker").click(function(){
			var getSelectID = $(this).attr("data-id");
			var options = $("#"+getId+" option");

			options.detach().sort(function(a,b) {               // Detach from select, then Sort
			    var at = $(a).text();
			    var bt = $(b).text();
			    // console.log(bt);         
			    return (at > bt)?1:((at < bt)?-1:0);            // Tell the sort function how to order
			});
			options.appendTo("#"+getSelectID); 
			$("#"+getSelectID).selectpicker("refresh");  

		});
		function testImage(){
			$.ajax({
			    url:'img/preloader.gif',
			    type:'HEAD',
			    error:
			        function(){
			            alert("no File exist");
			        },
			    success:
			        function(){
			            alert("File exist");        
			        }
			});
		}
	</script>
</body>
</html>
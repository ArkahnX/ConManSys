var oldVersion;
var time = 0;

function save() {
	var instances = CKEDITOR.instances;
	for(var attr in instances) {
		var id = $("#"+attr).data("page-id");
		var value = instances[attr].getData();
		$.ajax({
			type: "POST",
			url: "save.php",
			data: "id="+id+"&value="+value,
			success: function() {
				console.log("saved");
			}
		});
	}
}

function check() {
	var instances = CKEDITOR.instances;
	for(var attr in instances) {
		var value = instances[attr].getData();
		if(!oldVersion) {
			oldVersion = value;
		}
		if(oldVersion !== value) {
			oldVersion = value;
		}
		if(oldVersion === value) {
			time++;
		}
		if(time === 2) {
			save();
		}
	}
}

$(function(){
	setInterval(check,2000);
});


var news = {
	news : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		remove : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
		
	},
	
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/news/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{
					if(response.success){
						$("#tblGroup").DataTable().draw();
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}
};

$.extend(fn.app,{news:news,edit:edit});
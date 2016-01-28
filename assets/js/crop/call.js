 $(document).ready(function(){

	$("#chooseImage").PictureCut({
		InputOfImageDirectory       : "image",
		Extensions					: ["jpg","png","gif","jpeg"],
		PluginFolderOnServer        : "/crop_image/",
		FolderOnServer              : "/uploads/Article/",
		EnableCrop                  : true,
		EnableResize                  : true,
		CropWindowStyle             : "Bootstrap",
		MinimumWidthToResize		: 770,
		MinimumHeightToResize		: 350,
		ImageNameRandom				: true,
		InputOfImageDirectory		:"artImage",
		EnableMaximumSize			: false,
		CropOrientation				: true,
		UploadedCallback			: function(data){
	                
	            }   
	});
});
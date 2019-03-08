var Player = 
{
	getVideo: function() {
		return document.getElementById('player');
	},
	pause: function() {
		this.getVideo().pauseVideo(true);
	},
	resume: function() {
		this.getVideo().pauseVideo(false);
	},
	isPause: function() {
		 document.getElementById("status").value = this.getVideo().isPause();				 
	 },
	showControl: function(show) {
		this.getVideo().showControlBar(show);		
	 },
	getNsData:function(){
		var obj = this.getVideo().getNsData();
		document.getElementById("status").value = obj.time.toFixed(0) + " : " + obj.loaded.toFixed(0);
	},
	setquality: function(qua){
		this.getVideo().setPlaybackQuality(qua);
	},
	getquality: function(){
		document.getElementById("status").value = this.getVideo().getPlaybackQuality();
	},		
	getVersion:function(){
		document.getElementById("status").value = this.getVideo().getVersion();
			   },
	getquality2: function(){
		return this.getVideo().getPlaybackQuality();
	},		
	getqualities: function(){
		document.getElementById("status").value = this.getVideo().getAvailableQualityLevels();
	},
	recordPosition: function(){
		this.getVideo().recordPosition();
	},
	getPlayerState: function(){
		var info = this.getVideo().getPlayerState().split('|');
		document.getElementById("status").value = info;
	},
	getJump: function(){
		document.getElementById("status").value = this.getVideo().getJump();
	},
	setJump: function(){
		this.getVideo().setJump(true);
	},	
	noJump: function(){
		this.getVideo().setJump(false);		
	},
	getThreed: function(){
		var obj = this.getVideo().getThreed();
		document.getElementById("status").value = obj.threed + ":" + obj.mode + ":" + obj.width + ":" +obj.height + ":" + obj.fullscreen + ":" + obj.pause; 
	},
	getVolume: function(){
		document.getElementById("status").value =this.getVideo().getVolume();
   },
	setVolume: function(){
		var t = document.getElementById("textinput").value;
		this.getVideo().setVolume(t);
	},
	setContinuous: function(){
		this.getVideo().setContinuous(true);
	},
/*	setAdClickThruURL: function(){
		this.getVideo().setAdClickThruURL(www.baidu.com);
	},
*/
	hasWatermark :function(){
		this.getVideo().hasWatermark();
	},
	seek : function() {
		var t = document.getElementById("textinput").value;
		this.getVideo().nsseek(t);
	},
	dump_obj: function(myObject) {  
	     var s = "";  
		 for (var property in myObject) {  
		     s = s + "\n "+property +": " + myObject[property] ;  
		 }  
		//return s;
	},
}
//var timeid = window.setInterval( "Player.getNsData()" , 300);

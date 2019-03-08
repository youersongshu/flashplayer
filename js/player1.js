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
		document.getElementById("status").value = obj.time + ":" + obj.alltime;
	},
	setquality: function(qua){
		this.getVideo().setPlaybackQuality(qua);
	},
	getquality: function(){
		document.getElementById("status").value = this.getVideo().getPlaybackQuality();
	},		
	getqualities: function(){
		document.getElementById("status").value = this.getVideo().getAvailableQualityLevels();
	},
	recordPosition: function(){
		this.getVideo().recordPosition();
	},
	getPlayerState: function(){
		var info = this.getVideo().getPlayerState().split('|');
		document.getElementById("status").value = info[info.length-1];
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
	    document.getElementById("status").value = obj.threed + ":" + obj.mode + ":" + obj.width + ":" +obj.height;
	}
}

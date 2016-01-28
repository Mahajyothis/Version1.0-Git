

   	// livechat by www.mylivechat.com/  

   	

   	if(typeof(MyLiveChat)=="undefined")
   	{
   		MyLiveChat={};
   		MyLiveChat.RawConfig={InlineChatFeedbackRedirectUrl:"http://www.astropeak.com",OperatingHoursSchedule:"0",SupportPhoto:"6",WaitingShowForClick:"1",InlineChatFeedbackBehavior:"Hide",OperatingHoursCheckDay6:"0",OperatingHoursCheckDay4:"1",OperatingHoursCheckDay5:"1",OperatingHoursCheckDay2:"1",OperatingHoursCheckDay3:"1",OperatingHoursCheckDay0:"0",OperatingHoursCheckDay1:"1",InlineChatOnholdWaitTime:"120",InlineChatSurveyUseRating:"0",WaitingShowForSmart:"1",WaitingFieldDepartment:"0",InlineChatBubbleUIMode:"1",CustomDataDefinition:"[{\x22text\x22:\x22Mobile\x5Cx20No\x22,\x22type\x22:\x22textbox\x22,\x22fieldtype\x22:\x22Phone\x22,\x22required\x22:true,\x22prechat\x22:false,\x22offline\x22:true,\x22placeholder\x22:\x22Mobile\x5Cx20No\x22}]",InPageHeadOnline:"Live chat with Expert",SupportTemplate:"4",InPageImageOffline:"1",OperatingHoursCheckWeekend:"0",InPageUseBubbleTop:"0",WaitingShowForInvite:"0",InPageImageOnline:"1",MessageTimestampVisible:"1",WaitingFieldEmail:"2",WebConsoleRedirectTime:"635724294151870291",InPageTemplate:"10",WaitingFieldQuestion:"1",InlineChatmaxWaitTime:"300",OperatingHoursValWeekday:"9:30-16:20",InlineChatOfflineLogo:"upload",InlineChatWaitingFieldQuestion:"1",maxWaitTime:"300",DialogHeight:"420",OperatingHoursValDay3:"9:00-17:00",InlineChatTemplate:"10",InPageBubbleTop:"2",InlineChatWaitingShowForClick:"1",OperatingHoursValDay1:"9:00-17:00",InlineChatOnlineLogo:"upload",OperatingHoursValDay2:"9:00-17:00",OperatingHoursValDay5:"9:00-17:00",OperatingHoursValDay4:"9:00-17:00",InlineChatWaitingFieldEmail:"1",InlineChatWaitingFieldDepartment:"0",DialogWidth:"580",InlineChatSurveyVisible:"0",OperatingHoursForceOffline:"1",OperatingHoursCheckWeekday:"1",OnholdWaitTime:"120",InlineChatSurveyUseEmail:"0",InlineChatSurveyUseComment:"0"};
   		MyLiveChat.RawQuery={hccid:"61590993",apimode:"chatinline"};
   		for(var mlcp in MyLiveChat.RawConfig)
   		{
   			MyLiveChat[mlcp]=MyLiveChat.RawConfig[mlcp];
   		}
   		for(var mlcp in MyLiveChat.RawQuery)
   		{
   			MyLiveChat[mlcp]=MyLiveChat.RawQuery[mlcp];
   		}
   		if(MyLiveChat.InPageTemplate=="1"||MyLiveChat.InPageTemplate=="7"||!MyLiveChat.InlineChatTemplate)
   			MyLiveChat.InlineChatTemplate="2";
   		MyLiveChat.HCCID='61590993';
		MyLiveChat.PageBeginTime=new Date().getTime();
		MyLiveChat.LoadingHandlers=[];
   		//	,"Departments"
		MyLiveChat.CPRFIELDS=["SyncType","SyncStatus","SyncResult","HasReadyAgents","VisitorUrls","VisitorStatus","VisitorDuration","VisitorEntryUrl","VisitorReferUrl"];
	}



   	MyLiveChat.Version=1018;
   	MyLiveChat.FirstRequestTimeout=14000;
   	MyLiveChat.NextRequestTimeout=14000;
   	MyLiveChat.SyncType=''
   	MyLiveChat.SyncStatus="LOADING";
   	MyLiveChat.SyncUserName=null;
   	MyLiveChat.SyncResult="LOADING";
   	MyLiveChat.HasReadyAgents=false;
   	MyLiveChat.SourceUrl="http://www.astrospeak.com/tarot/select-tarot-card/all-purpose";
   	MyLiveChat.AgentTimeZone=parseInt("5" || "-5");
	
   	MyLiveChat.Departments=[];

   	

   	MyLiveChat.Departments.push({
   		Name:"Default",
   		Agents:[{
   			Id:'User:1',
   			Name:'Astrospeak Expert',
   			Online:false
   			}],
   		Online:false
   		});

	

	
   	MyLiveChat.VisitorUrls=[];


	
   	

   	function MyLiveChat_AddScript(tag)
   	{
   		var func=MyLiveChat_AddScript;
   		var arr=func._list;
   		if(!arr)func._list=arr=[];
   		if(func._loading)
   		{
   			arr.push(tag);
   			return;
   		}
   		function ontagload()
   		{
   			func._loading=false;
   			if(!arr.length)return;
   			tag=arr.shift();
   			LoadTag();
   		}
   		function LoadTag()
   		{
   			func._loading=true;
   			if('onload' in tag)
   			{
   				tag.onload=ontagload;
   			}
   			else
   			{
   				var iid=setInterval(function()
   				{
   					if(tag.readyState!='complete'&&tag.readyState!='loaded')
   						return;
   					clearInterval(iid);
   					ontagload();
   				},10);
   			}
   			document.body.insertBefore(tag,document.body.firstChild);
		
   		}
   		LoadTag();
   	}

   	function MyLiveChat_GetLastScriptTag()
   	{
   		var coll=document.getElementsByTagName("script");
   		return coll[coll.length-1];
   	}
   	function MyLiveChat_DocWrite(html,relativetag)
   	{
   		//inside <head>
   		if(!document.body)
   		{
   			document.write(html);
   			return;
   		}

   		//TODO: do not use document.write , some thridparty may override it.
   		if(document.readyState=="loading")
   		{
   			document.write(html);
   			return;
   		}
	
   		if(html.substr(0,7)=="<script")	//Low IE interactive or defer
   		{
   			var tag=document.createElement("script");
   			var src=html.match(/src=["']?([^"'>]*)["']/)[1];
   			if(!MyLiveChat.LoadedScripts)MyLiveChat.LoadedScripts={};
   			if(MyLiveChat.LoadedScripts[src])return;
   			MyLiveChat.LoadedScripts[src]=true;
   			tag.setAttribute("src",src);
   			MyLiveChat_AddScript(tag);
   		}
   		else
   		{
		
   			if(!relativetag)relativetag=MyLiveChat_GetLastScriptTag();

   			var div = document.createElement("DIV");
   			div.innerHTML = html;
   			while (true) {
   				var c = div.firstChild;
   				if (!c) break;
   				div.removeChild(c);
   				relativetag.parentNode.insertBefore(c,relativetag);
   			}
   		}
   	}
	
   	MyLiveChat.NewGuid=function()
   	{
   		var guid = "";
   		for (var i = 1; i <= 32; i++){
   			guid +=Math.floor(Math.random()*16.0).toString(16);
   			if(i==8||i==12||i==16||i==20)guid += "-";
   		}
   		return guid;    
   	}

   	MyLiveChat.RandomID=MyLiveChat.NewGuid();

	

   	MyLiveChat.VisitorStatus="";
   	MyLiveChat.VisitorDuration=0;
   	MyLiveChat.VisitorEntryUrl="";
   	MyLiveChat.VisitorReferUrl="";

   	MyLiveChat.ShowButton=true;
   	MyLiveChat.ShowLink=true;
   	MyLiveChat.ShowBox=true;
   	MyLiveChat.ShowInvite=true;
   	MyLiveChat.ShowSmart=false;
   	MyLiveChat.ScriptUrl="https://s3.mylivechat.com/livechat/livechat.aspx?hccid=61590993\x26apimode=chatinline";
   	MyLiveChat.UrlBase="https://s3.mylivechat.com/livechat/";
   	MyLiveChat.SiteUrl="https://s3.mylivechat.com/";



   	MyLiveChat.NoPrivateLabel=true;


   	MyLiveChat.LoadingHandlers.push(function(funcself)
   	{
   		MyLiveChat_RunLoadingHandler('chatinline',funcself);
   	});

   	MyLiveChat.ResourcesVary="\x26culture=en-US\x26mlcv=1018";

   	function MyLiveChat_LoadMoreScripts()
   	{
   		var mlcresurl=MyLiveChat.UrlBase+"resources.aspx?HCCID="+MyLiveChat.HCCID;
   		if(MyLiveChat.InPageTemplate)mlcresurl+="&InPageTemplate="+MyLiveChat.InPageTemplate;
   		if(MyLiveChat.InlineChatTemplate)mlcresurl+="&InlineChatTemplate="+MyLiveChat.InlineChatTemplate;
	
   		if(!window.jsml)
   		{
   			MyLiveChat_DocWrite("<script src='"+MyLiveChat.SiteUrl+"JSML/jsml.js'></scr"+"ipt>");
   		}
   		MyLiveChat_DocWrite("<script src='"+mlcresurl+MyLiveChat.ResourcesVary+"'></scr"+"ipt>");

   		if(false)
   		{
		window.mlcapimodeisdialog=true;
   		var surl=MyLiveChat.ScriptUrl;
   		MyLiveChat_DocWrite("<script onerror='LoaderScriptTagError()' src='" + MyLiveChat.UrlBase + "dialog.aspx?"+surl.substring(surl.indexOf('?')+1)+"'></scr" + "ipt>");	
   		MyLiveChat_DocWrite("<script onerror='LoaderScriptTagError()' src='" +  MyLiveChat.UrlBase + "script/dialoginit.js'></scr" + "ipt>");
	   }
	   else if(false)
   	{
   		MyLiveChat.IsDesignMode=true;
   	}
   	}

   	MyLiveChat['chatinline'+"_script_tag"]=MyLiveChat_GetLastScriptTag();

   	if(typeof(MyLiveChat_Initialize)=="undefined")
   	{
   		MyLiveChat_LoadMoreScripts();
   	}
   	else
   	{
   		MyLiveChat_Initialize()
   	}


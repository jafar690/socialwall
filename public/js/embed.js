(function()
{
	/* EMBED GENERIC */
	
	/* No JQuery in here!! - it may not be loaded on the page in which we are embedded */

	// disable logging unless MIAPPI-LOG is present in user agent
	var logging = false;

	function MiappiEmbedConsole(/* arguments */) {
		if (!logging) return;
		if (typeof console === 'undefined') return;
		if (typeof arguments === 'undefined' || typeof arguments !== 'object') return;

		var args = [];
		for (var i = 0; i < arguments.length; i++) {
			args[i] = arguments[i];
		}

		if (typeof args[0] !== 'string' || typeof console[args[0]] !== 'function') return;
		var loglevel = args.splice(0, 1);

		console[loglevel].apply(console, args);
	}

	try {
		var agent = window.navigator.userAgent;
		if (agent.match('SLOG')) {
			logging = true;
			MiappiEmbedConsole('log', 'Logging enabled via useragent');
		}
	} catch(err) {
		// no useragent
	}

	if (!logging) {
		logging = (
			typeof window === 'object' && window &&
			typeof window.location === 'object' && window.location &&
			typeof window.location.search === 'string' && window.location.search &&
			window.location.search.match(/(\?|&)mpidebug=1/) !== null
		);
		if (logging) {
			MiappiEmbedConsole('log', 'Logging enabled via GET');
		}
	}

	if( typeof _mpi_debug === 'undefined' )
	{
		_mpi_debug = false;
	}

	if( !_mpi_user || !_mpi_user.match(/^[a-z0-9]{1,}$/i ) )
	{
		if( _mpi_debug )
		{
			alert('Missing required variable _mpi_user (or it is invalid)');
		}
		return;
	}

	var _mpi_frame = document.getElementById('miappi-frame');
	if( _mpi_frame === null )
	{
		if( _mpi_debug )
		{
			alert('Missing required element miappi-frame');
		}
		return;
	}

	// get the src used for this embed script
	var embedScript = document.getElementById('_mpi_js_embed_script');
	if (embedScript !== null) {
		embedScript = (embedScript.src || embedScript.getAttribute('src'));
		if (embedScript && embedScript.match(/\//)) {
			embedScript = embedScript.match(/^(https?\:)\/\/(([^:\/?#]*)(?:\:([0-9]+))?)(\/[^?#]*)(\?[^#]*|)(#.*|)$/);
			embedScript = embedScript[2];
		};
	} else {
		embedScript = '';
	};

	// beta / staging domain support find the script tag
	var domain = (embedScript || ('showcase.miappi.com'));

	// flag whether we have added the powered by link
	var _mpi_added_powered_by_link = false;

	function getDocHeight() {
	    var D = document;
	    return Math.max(
	        D.body.scrollHeight, D.documentElement.scrollHeight,
	        D.body.offsetHeight, D.documentElement.offsetHeight,
	        D.body.clientHeight, D.documentElement.clientHeight
	    );
	}

	// update the height etc
	function onVisibilityChange(event)
	{
		// throttle scroll requests once iframe is created
		if (iframe_created && typeof event !== 'undefined')
		{
			// call once scroll has settled down
			if (visInterval)
			{
				clearTimeout(visInterval);
			}
			visInterval = setTimeout(function(){
				onVisibilityChange();
			},1000);
			return;
		}

        var iframe 		  	= document.getElementById('miappi-iframe'),
        	frame 		  	= document.getElementById('miappi-frame'),
            frame_height  	= frame.scrollHeight,
            window_height 	= window.innerHeight,
            document_height = getDocHeight();
            scroll 	 	  	= window.scrollY || window.pageYOffset,
            elemRect 	  	= frame.getBoundingClientRect(),
            offset   	  	= elemRect.top;

        // default
        if ( typeof _mpi_lazy_load === 'undefined' )
        {
        	_mpi_lazy_load = false;
        }

        // create iframe immediately / once in view / after a delay
       	if (!iframe_created)
       	{
       		MiappiEmbedConsole('log', 'embed.js : lazy_load : '+_mpi_lazy_load+ '('+typeof _mpi_lazy_load+')');
       		// on or off
       		if (typeof _mpi_lazy_load === 'boolean')
       		{
				if (!_mpi_lazy_load)
				{
					// load immediately
					create_iframe('on startup');
				}
				else if ((window_height-offset)>0 && offset<window_height)
				{
					// create once top is in view
					create_iframe('on visible');
				}
			}
			// time delay
			else if (typeof _mpi_lazy_load === 'number')
			{
				setTimeout(function(){
					create_iframe('time delay');
				}, _mpi_lazy_load * 1000);
			}
			// bad value
			else
			{
				var msg = "_mpi_lazy_load must be set to 'true','false' or 1,2,3 etc (delay in seconds)";
				alert(msg);
				MiappiEmbedConsole('error', msg);
				create_iframe();
			}
		}

        if (typeof iframe == 'undefined' || iframe == null)
        {
        	// app not ready yet
        	MiappiEmbedConsole('log', 'embed.js : onVisibilityChange : waiting for embed to come into view');
        	setTimeout(function(){
        		onVisibilityChange();
        	},1000);
        	return;
        }

   	    // console.log('embed.js : document height : '+document_height);        
   	    // console.log('embed.js : window height : '+window_height);
   	    // console.log('embed.js : frame height  : '+frame_height);
        // console.log('embed.js : offset : '+offset);
        // console.log('embed.js : scroll : '+scroll);

        var data_to_send = {},
        	rect = iframe.getBoundingClientRect();
        
        data_to_send.originator  = 'miappi-embed';
        data_to_send.scroll_now  = false;
        data_to_send.scroll 	 = scroll;
        data_to_send.offset 	 = offset;
		data_to_send.rect 	 	 = { top: rect.top, right: rect.right, bottom: rect.bottom, left: rect.left, width: rect.width };
		data_to_send.height 	 = frame_height;
		
		// scroll request
   		var st = Math.max(document.documentElement.scrollTop,document.body.scrollTop);

   		// console.log(st,document.documentElement.clientHeight,document.documentElement.scrollHeight);

		if (scroll>100) {
		    if ((st+document.documentElement.clientHeight)>=document.documentElement.scrollHeight )
		    {
		    	data_to_send.scroll_now = true;
		    }

			if(scroll + window_height == document_height) {
				data_to_send.scroll_now = true;
		    }
		}

		if( typeof _mpi_fontsize === 'number' )
		{
			data_to_send.fontsize = _mpi_fontsize;
		}
		if( typeof _mpi_ga === 'string' )
		{
			data_to_send.ga = _mpi_ga;
		}

		// send message
		// console.log(data_to_send);
		iframe.contentWindow.postMessage( data_to_send, postMsgOrig );
    }

    function elem_height(e)
    {
    	return Math.max( e.scrollHeight, e.offsetHeight, e.clientHeight, e.scrollHeight, e.offsetHeight );
    }

    function hackChromeIframe(){
    	// chrome sometimes ignores 100% bizarrely, tweaking to 100.x% forces redraw
    	window.hackChromeIframe = setInterval(function(){
	    	var el = document.getElementById('miappi-iframe');
	    	var height = elem_height(el);
    		if (typeof height === 'number' && height < 200) {
				el.style.height = '100.' + Math.random(1) + '%';
    		}
    		else
    		{
    			clearInterval(window.hackChromeIframe);
    		}
    	},1000);
    }

    function create_iframe(method)
    {
    	MiappiEmbedConsole('log', 'embed.js : create_iframe : '+method);

		var _mpi_iframe = document.createElement('iframe');

		// allow starting on particular network / latest
		if (typeof _mpi_default_route == 'undefined')
		{
			_mpi_iframe.setAttribute( 'src' , pageProtocol + '//' + domain + '/embed/' + _mpi_user );
		}
		else
		{
			_mpi_iframe.setAttribute( 'src' , pageProtocol + '//' + domain + '/embed/' + _mpi_user + '/' + _mpi_default_route );
		};

		_mpi_iframe.setAttribute( 'id' , 'miappi-iframe' );
		_mpi_iframe.setAttribute( 'seamless' , 'true' );
		_mpi_iframe.setAttribute( 'allowtransparency' , 'true' );
	
		_mpi_iframe.style.borderWidth = 0;
		_mpi_iframe.style.frameBorder = 0;
		_mpi_iframe.style.padding = 0;
		_mpi_iframe.style.width  = '100%';
		_mpi_iframe.style.height = '100%';

		// mouse wheel in safari doesn't work without this hack :-(
		var is_safari = navigator.userAgent.indexOf("Safari") > -1;
		if (is_safari)
		{
			//_mpi_iframe.setAttribute( 'onMouseWheel' , '' );
		}		

		// chrome hack
		hackChromeIframe();

		// add iframe
		_mpi_frame.appendChild(_mpi_iframe);
		iframe_created = true;
	}

	function add_powered_by_link(wl) {
		// make sure we don't already have this....
		var wl = (typeof wl === 'object' && wl !== null) ? wl : {},
			pbl_id = 'mpi-powered-by-a',
			wl_id = (wl.id || 'miappi');
		if (!_mpi_added_powered_by_link && document.getElementById(pbl_id) === null && wl_id.match(/^(?:miappi|feedlamp\-com)$/)) {
			var pbl    = document.createElement('a');
			pbl.id     = pbl_id;
			pbl.target = '_blank';
			pbl.href   = '//miappi.com';
			pbl.text   = (wl_id === 'feedlamp-com') ? 'A Miappi Company' : 'Powered by ' + (wl.name || 'Miappi');
			var pbl_css = 'margin-top: 5px; margin-bottom: 5px; margin-left: -15px; text-align: right; width: 100%; display: block; clear: both; color: #999999; text-decoration: none; font-size: 80%;';
			(pbl.style && pbl.style.cssText) ? (pbl.style.cssText = pbl_css) : (pbl.style = pbl_css);
			_mpi_frame.appendChild(pbl);
			_mpi_added_powered_by_link = true;
		};
	};

	// listen to load more resize calls
	var eventMethod  = window.addEventListener ? "addEventListener" : "attachEvent";
	var eventer 	 = window[eventMethod];
	var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

	// pick out the protocol, http is default
	var pageProtocol = ( window.location.protocol && window.location.protocol.match( /^http(s)?:/i ) ) ? window.location.protocol : 'http:';

	// targetOrigin
	var postMsgOrig = pageProtocol + '//' + domain;

	var iframe_created = false,
		visInterval = 0;

	// Listen to message from child window
	MiappiEmbedConsole('log', 'embed.js : listening for resize messages');

	var last_frame_height = 0;
	eventer(messageEvent,function(e)
	{
		var key = e.message ? "message" : "data";
		var data = e[key];

		// console.log('embed',data);

		// bad messages
		if (typeof data.originator === 'undefined' || !data.originator.match('miappi'))
		{
			MiappiEmbedConsole('log', 'embed.js : bad message');
			MiappiEmbedConsole('log', data);
			return;
		}

		// messages from feed and profile to resize the outer frame
		if (data.originator === 'miappi-feed' || data.originator === 'miappi-profile')
		{
			if (typeof data.height === 'number')
			{
				if (last_frame_height != data.height)
				{
					last_frame_height = data.height;
					// console.log("embed.js : setting height : "+data.height);
					var miappi_frame  = document.getElementById('miappi-frame');
					miappi_frame.style.height  = data.height + 'px';
				}
				return;
			}
			else
			{
				MiappiEmbedConsole('log', "embed.js : bad height");
				MiappiEmbedConsole('log', data);
			}
		}

		// add the powered by link
		if (typeof data === 'object' && typeof data.trigger !== 'undefined') {
			switch(data.trigger) {

				case 'addPoweredByLink':
					add_powered_by_link((data.whitelabel || {}));
					break;

				case 'getHost':
					var _mpi_iframe_dom = document.getElementById('miappi-iframe');
					if (_mpi_iframe_dom !== null) {
						_mpi_iframe_dom.contentWindow.postMessage({
							originator: 'miappi-embed',
							trigger: 'setHost',
							host: ((window.location && window.location.host) || '')
						}, postMsgOrig);
					};
					break;

				default:
					break;

			}
			return;
		};

	},false);

	// watch for scroll events, reaching the bottom of the page
	MiappiEmbedConsole('log', 'embed.js : watching for scrollbar / resize');

	// for loading via F1
	onVisibilityChange();

	if (window.addEventListener)
	{
	    addEventListener('DOMContentLoaded', onVisibilityChange, false); 
	    addEventListener('load', onVisibilityChange, false); 
	    addEventListener('scroll', onVisibilityChange, false); 
	    addEventListener('resize', onVisibilityChange, false); 
	}
	else if (window.attachEvent)
	{
	    attachEvent('onDOMContentLoaded', onVisibilityChange); // IE9+ :(
	    attachEvent('onload', onVisibilityChange);
	    attachEvent('onscroll', onVisibilityChange);
	    attachEvent('onresize', onVisibilityChange);
	}
})();
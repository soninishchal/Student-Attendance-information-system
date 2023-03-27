
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  
  <!DOCTYPE html>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Rows Frames Layout (header frame)</title>
		<style type="text/css">
		
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;
			height: 100%; 
			max-height: 100%; 
			font-family:Sans-serif;
			line-height: 1.5em;
		}
		
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100px; 
			overflow: hidden; /* Disables scrollbars on the navigation frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}
		
		#logo {
			padding:10px;
			float:left;
		}
		
		main {
			position: fixed;
			top: 100px; /* Set this to the height of the header */
			left: 0; 
			right: 0;
			bottom: 0;
			overflow: auto; 
			background: #fff;
		}
		
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		
		p {
			color: #555;
		}

		/* Menu */
		nav { 
			margin:0 auto; 
			padding:0; 
			float:right;
		}
		nav ul { 
			list-style:none; 
			padding:0; 
			float:left;
		}
		nav ul li { 
			margin:0; 
			padding:0 0 0 8px; 
			float:left;
		}
		nav ul li a { 
			display:block; 
			margin:0; 
			padding:8px 20px; 
			color:darkgreen; 
			text-decoration:none;
		}
		nav ul li.active a, #top-nav ul li a:hover { 
			color:#d3d3f9;
		}
				
		/*IE6 fix*/
		* html body{
			padding: 100px 0 0 0; /* Set the first value to the height of the header */
		}
		
		* html main{ 
			height: 100%; 
			width: 100%; 
		}
		
		</style>	
	
	</head>
	
	<body>		

		<header id="header">
			<div id="logo">
				<h1>CoolLogo</h1>
			</div>
			<nav>
				<div class="innertube">
				<ul>
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
					<li><a href="#">Link 5</a></li>
				</ul>
				</div>
			</nav>
		</header>
				
		<main>
			<div class="innertube">
				
			</div>
		</main>
	
	</body>
</html>
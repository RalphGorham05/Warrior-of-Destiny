<?php

echo <<<EOT

<html>
	<head>
		<title>Test Screen</title>
        <script type="text/javascript">
		function validateRadio (radios)
		{
   			for (i = 0; i < radios.length; ++ i)
			{
       			if (radios [i].checked) 
					return true;
				return false;
    		}
   	 		return false;
		}

		function validateForm()
		{
    		if(validateRadio (document.forms["form1"]))
   			{
        		return true;
    		}
    		else
    		{
        		alert('Please answer all questions');
        		return false;
    		}
		}
        </script>

		<link rel="stylesheet" href="../css/testscreen.css" media="screen"/>
	</head>
	
	<body>
		
		<div id="testDiv">
			<div align="center">Morality Test</div>
			<form name="form1" action="views/build_character.php" method="post" id='good/evil_test'>
			
			<div>
				<h3>Which is your spirit animal?</h3>
    			<input type="radio" name="q1" id="q1-A" value="A" />
    			<label for="q1-A">A) 2 head lion beast who breathes fire and has dragon teeth </label>
    		</div>
			<div>
				<input type="radio" name="q1" id="q1-B" value="B" />
        		<label for="q1-B">B) Chameleon monkey who spits water </label>
			<div>
            <br/>
    			
			<div>
    	    	<h3>You are handily beating your opponent and they are on the brink of defeat.</h3>
				<input type="radio" name="q2" id="q2-A" value="A" />        				
				<label for="q2-A">A) Finish them fatally</label>
    		</div>
			<div>        				
				<input type="radio" name="q2" id="q2-B" value="B" />
        		<label for="q2-B">B) Allow them mercy</label>
			</div>
            <br/>

			<div>
				<h3>A stranger bumps into you while walking down a path.</h3>
        		<input type="radio" name="q3" id="q3-A" value="A" />
        		<label for="q3-A">A) Destroy them for even the idea of touching your greatness.</label>
			</div>
    		<div>
				<input type="radio" name="q3" id="q3-B" value="B" />
				<label for="q3-B">B) Teach them the art of "walking down path.</label>
    		</div>
            <br/>
    		
			<div>
				<h3>War is coming</h3>
    			<input type="radio" name="q4" id="q4-A" value="A" />
    			<label for="q4-A">A) Relish the opportunity to hold your enemies head in your hand</label>    			
    		</div>
    		<div>
    			<input type="radio" name="q4" id="q4-B" value="B" />
    			<label for="q4-B">B) Hope for peace and diplomacy</label>
    		</div>
    		<br/>
    			
    		<div>
    			<h3> There is an old man coming down path who is struggling and about to fall.</h3>	
        		<input type="radio" name="q5" id="q5-A" value="A" />
        		<label for="q5-A">A) Take him down since he might be a grandmaster.</label>
    		</div>

    		<div>
        		<input type="radio" name="q5" id="q5-B" value="B" />
        		<label for="q5-B">B) Help him steady himself and walk him down the path.</label>
			</div>            
            <br/>
            <br/>

    		<div align= 'center'>
				<input id="testInput" type="submit" value="Choose Your Warrior" onclick=" validateForm()"/>
           </div>

			</form>


    	</div>

	</body>
</html>
EOT
?>
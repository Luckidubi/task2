<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
    <title>Contact Me</title>
    
    <form action="check.php" method="POST">
           
    		<p>
    			<label for="firstname">First Name</label><br />
    			 <input type="text" name="fname" placeholder="First Name" />
    		</p>
    
    		<p>
    			<label for="lastname">Last Name</label><br />
    			 <input type="text" name="lname" placeholder=" Last Name" />
    		</p>
    
    		<p>
    			<label for="email">Email</label><br />
    			<input type="email" name="email" placeholder="Enter Your Email" required />
    		</p>
    
    		<p>
    			<label for="email">Your Message</label><br />
    			<textarea name="msg"></textarea>
    		</p>
    
            
            
             <input type="submit" name="submit" value="Send Message">
    
    </form>
  </body>
</html>

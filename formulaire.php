

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

input,
textarea,
select {
	background: #fff;
	outline: none;
	-webkit-appearance: none;
	color: #333;
	border: 0px solid #fff;
	padding: 11px 25px;
	margin: 0px;
	font-style: italic;
	font-weight: 400;
	line-height: 1.42857143;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	height: auto;
	-webkit-border-radius: none;
	-moz-border-radius: none;
	border-radius: none;
	margin-bottom: 20px;
	-webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
	-webkit-transition: background-color .3s ease, border .3s ease, color .3s ease;
	   -moz-transition: background-color .3s ease, border .3s ease, color .3s ease;
	    -ms-transition: background-color .3s ease, border .3s ease, color .3s ease;
	     -o-transition: background-color .3s ease, border .3s ease, color .3s ease;
	        transition: background-color .3s ease, border .3s ease, color .3s ease;
}

textarea {
	width: 100%;
	padding: 10px 20px;
	resize: both;
	margin-top: 0px;
	font-style: italic;
	height: 150px;
}
	
input:hover,
textarea:hover,
select:hover {
	color: #333;
}
	
input:focus,
textarea:focus,
select:focus {
	color: #333;
}

input[type="submit"],
button {
	width: auto;
	font-style: normal;
	font-weight: 300;
	background: #fff;
	color: #333;
	cursor: pointer;
	border: 0px solid #fff;
	padding: 12px 20px;
	letter-spacing: 1px;
}

input[type="submit"]:hover,
button:hover {
	color: #333;
}

select, option {
	cursor: pointer;
}

input[type="checkbox"] {
	-webkit-appearance: checkbox;
}

input[type="radio"] {
	-webkit-appearance: radio;
}

input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
	color: #333;
}

input:-moz-placeholder,
textarea:-moz-placeholder {
	color: #333;
}

input.placeholder,
textarea.placeholder {
	color: #333;
}

input[placeholder] {
	text-overflow: ellipsis;
}

::-moz-placeholder {
	text-overflow: ellipsis;
} /* firefox 19+ */

input:-moz-placeholder {
	text-overflow: ellipsis;
}

.form {
	position: relative;
	overflow: hidden;
}

.form-container {
	position: relative;
	overflow: hidden;
}

.form-note {
	color: #333;
	font-style: italic;
	margin: 24px 0;
}

.success-message {
	padding-top: 10px;
	color: #fff;
	font-size: 14px;
	font-weight: 300;
	display: none;
}

.error-message {
	padding-top: 10px;
	color: #fff;
	font-size: 14px;
	font-weight: 300;
	display: none;
}

.contact-form input[type="text"], .contact-form input[type="email"] {
	width: 100%;
}

.contact-form input, .contact-form textarea, .contact-form select {
	background: #fff;
	outline: none;
	-webkit-appearance: none;
	color: #333;
	border-bottom: 2px solid #999;
	padding: 16px 20px;
	margin: 0px;
	font-style: italic;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	height: auto;
	margin-bottom: 20px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	-webkit-transition: background-color .3s ease, border .3s ease, color .3s ease;
	-moz-transition: background-color .3s ease, border .3s ease, color .3s ease;
	-ms-transition: background-color .3s ease, border .3s ease, color .3s ease;
	-o-transition: background-color .3s ease, border .3s ease, color .3s ease;
	transition: background-color .3s ease, border .3s ease, color .3s ease;
	position: relative; 
}

.contact-form textarea {
	margin-bottom: 18px;
}

.contact-form .input-error {
	border-color: #ed5555;
}


.contact-form .response-message {
	margin: 20px 0 30px 0;
	font-size: 18px;
	font-weight: 300;
	color: #333;
}

/* WebKit browsers */
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder { 
    color: #333;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: #333;
    opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    color: #333;
    opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
   color: #333;
}
    </style>
</head>
<body>
<form method="post" action="send-mail.php" class="contact-form" id="form">
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="name" placeholder="Insérez votre nom" class="required">
									</div>
									<div class="col-md-12">
										<input type="email" name="email" placeholder="Insérez votre adresse email" class="contact-form-email required">
									</div>
									<div class="col-md-12">
										<input type="text" name="subject" placeholder="Votre sujet" class="contact-form-subject required">
									</div>
								</div>
								<textarea name="message" placeholder="Insérez votre message" class="required" rows="7"></textarea>
								<div class="response-message"></div>
								<button class="border-button border-bt-red" type="submit" id="submit" name="submit">Envoyer Message</button>
							</form>

</body>
</html>
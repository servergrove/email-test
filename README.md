email-test
==========

PHP script to test sending emails

Installation
------------

You will need Composer, you can install it with:

	curl -sS https://getcomposer.org/installer | php

For more information visit http://getcomposer.org/download/

Once Composer is installed, run:

	php composer.phar install

Usage
-----

To send a test, you will need to edit test-email.php and change:

- $from Your email address
- $to The email address where to send the message

By default, the script will send the email through the local SMTP server.
You can also change the transport to use sendmail or mail. For this edit the $transport variable

If you want to test the ServerGrove SMTP server, change the $smtpHost to 'mail.servergorve.com' and change
the $smtpPassword. If your From address is different that then smtp user, change $smtpUser.
Please note that $from still needs to be a valid address in our system.

To test a test run:

 	php test-email.php
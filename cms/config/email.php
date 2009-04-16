<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 29 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

// Choose as protocol (mail, sendmail, smtp)
$config['protocol'] = 'smtp';

// For use with sendmail only (/usr/sbin/sendmail)
$config['mailpath'] = '';

// SMTP configurations
$config['smtp_host'] = 'mail.silentworks.co.uk';
$config['smtp_user'] = 'mailer@silentworks.co.uk';
$config['smtp_pass'] = 'WmqggFGk';
$config['smtp_port'] = 25;

$config['charset'] = 'utf-8';

// Wrap words in email
$config['wordwrap'] = TRUE;

/* End of file email.php */
/* Location: ./application/config/email.php */
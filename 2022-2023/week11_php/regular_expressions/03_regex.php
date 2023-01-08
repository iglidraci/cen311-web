<?php
/*
Lookahead and Lookbehind "match here if this is next"
Use lookahead to make sure that there's more data after the separator
Lookbehind checks the preceding text
The come in two forms:
Positive -> the next/preceding text must be like this
Negative -> the next/preceding text must not be like this
(?=subpattern) Positive lookahead
(?!subpattern)  Negative lookahead
(?<=subpattern) Positive lookbehind
(?<!subpattern) Negative lookbehind
*/

/*
Example of a positive lookahead is splitting a Unix mbox mail file into messages
The word "From" starting a line by itself indicates the start of a new message
We can split the mailbox into messages by specifying the next text "From"
*/

$mailbox = <<< MAILBOX
From: me@domain.com
Subject: lottery winner
Congrats,
You won the lottery!
From: foo@domain.com
Subject: urgent
Urgent, call back asap.
From: bar@domain.com
Subject: info
Info regarding ...
MAILBOX;

$messages = preg_split("/(?=^From: )/m", $mailbox);
var_dump($messages);

/*
Conditional expressions
A conditional expression is like an if statement in a regular expression
(?(condition)yespattern)
(?(condition)yespattern|nopattern)
The assertion can be one of two types: either a backreference, or a lookahead or lookbehind match
*/
 ?>

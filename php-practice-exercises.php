<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>PHP Practice Page</title>
</head>

<body>

<?php

$nl = "\n\n";

/*
NOTE: in all cases where the exercise asks you to echo or print the result to the web page,
please precede the value with the exercise number, and put a line break <br> at the end
(or enclose the whole thing in paragraphs, or in a <div>, if appropriate)
to separate the values visually on the web page.

Example:

echo '4.1 ' . $myVariable . '<br>';

or:

echo '<p>4.1 ' . $myVariable . '</p>';

or:

echo '<div>4.1 ' . $myVariable . '</div>';

*/



/*
TOPIC 1: THE BASICS -- VARIABLES, STRINGS, COMMENTS
*/

/*
1.1 Declare a variable without setting a value for that variable.
*/

$var11 = null;
echo $nl . '<p>Task 1.1: Declare a variable without setting a value for that variable.</p>';
echo $nl . '<p>The value is: ' . $var11 . '</p>';

/*
1.2 Set a variable to an empty string.
*/

$var12 = '';
echo $nl . '<p>Task 1.2: Set a variable to an empty string.</p>';
echo $nl . '<p>The value is: ' . $var12 . '</p>';

/*
1.3 Set variable to a string of text.
*/

$var13 = 'String of text';
echo $nl . '<p>Task 1.3: Set variable to a string of text.</p>';
echo $nl . '<p>The value is: ' . $var13 . '</p>';

/*
1.4 Set a variable to an integer.
*/

$var14 = 17;
echo $nl . '<p>Task 1.4: Set a variable to an integer.</p>';
echo $nl . '<p>The value is: ' . $var14 . '</p>';

/*
1.5 Set a variable to a numeric string.
*/

$var15 = '17';
echo $nl . '<p>Task 1.5: Set a variable to a numeric string.</p>';
echo $nl . '<p>The value is: ' . $var15 . '</p>';

/*
1.6 Set one of the variables above to a new value. (Redefine the value of a the variable.)
*/

$var15 = '18';
echo $nl . '<p>Task 1.6: Set one of the variables above to a new value. (Redefine the value of the variable.)</p>';
echo $nl . '<p>The value is: ' . $var15 . '</p>';

/*
1.7 Set a variable to a string that starts with multiple spaces and ends with multiple spaces
*/

$var17 = '      Words before and after multiple spaces       ';
echo $nl . '<p>Task 1.7: Set a variable to a string that starts with multiple spaces and ends with multiple spaces</p>';
echo $nl . '<p>The value is: ' . $var17 . '</p>';

/*
1.8 Use the trim() function to strip the spaces from the above variable.
*/

$var18 = trim($var17);
echo $nl . '<p>Task 1.8: Use the trim() function to strip the spaces from the above variable.</p>';
echo $nl . '<p>The value is: ' . $var18 . '</p>';

/*
1.9 Set a new variable as the concatonation (combination) of two of the above string variables.
*/

$var19 = $var13 . ' ' . $var15;
echo $nl . '<p>Task 1.9: Set a new variable as the concatonation (combination) of two of the above string variables. (Using variables from Task 1.3 and 1.6)</p>';
echo $nl . '<p>The value is: ' . $var19 . '</p>';

/*
1.10 Set a string variable using double quotes, with one of the above variables inside.
*/

$var110 = "$var13";
echo $nl . '<p>Task 1.10: Set a string variable using double quotes, with one of the above variables inside. (Using variable from Task 1.3)</p>';
echo $nl . "<p>The value is: $var110 </p>";

/*
1.11 Set a variable that concatonates a string in single quotes and a string in double quotes.
*/

$var111 = 'This is a single quote ' . " and this is a double quote.";
echo $nl . '<p>Task 1.11: Set a variable that concatonates a string in single quotes and a string in double quotes.</p>';
echo $nl . '<p>The value is: ' . $var111 . '</p>';

/*
1.12 Set a string variable with double quotes and escaped double quotes inside of it.
*/

$var112 = "\"Escaped double-quotes\"";
echo $nl . '<p>Task 1.12: Set a string variable with double quotes and escaped double quotes inside of it.</p>';
echo $nl . '<p>The value is: ' . $var112 . '</p>';

/*
1.13 Echo one of the above variables to the web page, followed by an HTML break tag.
*/

$var113 = $var14;
echo $nl . '<p>Task 1.13: Echo one of the above variables to the web page, followed by an HTML break tag. (Using variable from Task 1.4)</p>';
echo $nl . '<p>The value is: ' . $var113 . ' and is followed by a break tag (br) right now.</p>' . '<br>';

/*
1.14 Replace characters within the above variable with other characters, and echo the new value to the web page, followed by an HTML break tag.
*/

$var114 = $var113;
echo $nl . '<p>Task 1.14: Replace characters within the above variable with other characters, and echo the new value to the web page, followed by an HTML break tag.</p>';
echo $nl . '<p>The value replaced the 1 with a 2 and is now: ' . str_replace('1', '2', $var114) . ' and is followed by a break tag (br) right now.</p>' . '<br>';

/*
1.15 Set a string variable with some HTML tags in it, and echo it to the web page, followed by an HTML break tag.
*/

$var115 = '<h2>H2 Heading followed by a break tag</h2>';
echo $nl . '<p>Task 1.15: Set a string variable with some HTML tags in it, and echo it to the web page, followed by an HTML break tag.</p>';
echo $nl . '<p>The value is a H2 Header and is followed a break tag (br): ' . $var115 . '</p><br>';

/*
1.16 Use strip_tags() on the above variable and echo it to the web page again, followed by an HTML break tag.
*/

$var116 = strip_tags($var115);
echo $nl . '<p>Task 1.16: Use strip_tags() on the above variable and echo it to the web page again, followed by an HTML break tag.</p>';
echo $nl . '<p>The value strips the H2 Header html tag and is followed a break tag (br): ' . $var116 . '</p><br>';

/*
1.17 Set a variable in single quotes that includes the following inside: double quotes, an ampersand, less than, greater than.
*/

$var117 = '"Double Quotes" followed by an ampersand: & followed by less than: < followed by greater than >';
echo $nl . '<p>Task 1.17: Set a variable in single quotes that includes the following inside: double quotes, an ampersand, less than, greater than.</p>';
echo $nl . $var117;

/*
1.18 Use htmlentities() on the above variable, and echo it to the web page, followed by an HTML break tag,
THEN view the source code of the page in a browser and
THEN create a multi-line PHP comment in this file
THEN copy and paste the exact text of that variable as it appears in the HTML source code.
*/

$var118 = htmlentities($var117);
echo $nl . '<p>Task 1.18: Use htmlentities on the above variable. Echo it. Then in a php multi-line comment below this code, add the exact text of the variable from the HTML source code.</p>';
echo $nl . $var118;

/* Per the source code, the exact text of the variable is:
&quot;Double Quotes&quot; followed by an ampersand: &amp; followed by less than: &lt; followed by greater than &gt;
*/

/*
1.19 Write a single line PHP comment.
*/

echo $nl . '<p>Task 1.19: Write a single line PHP comment.</p>';

// Single line comment

/*
1.20 Use PHP to get the current date and time, and echo it to the web page in this format: YYYY-MM-DD HH:MM:SS where HH is 24 hour time (not 12 hours).
*/


$var120 = date("Y-m-d G:i:s");
echo $nl . '<p>Task 1.20: Use PHP to get the current date and time in format: YYYY-MM-DD HH:MM:SS where HH is 24 hour time</p>';
echo $nl . '<p>' . $var120 . '</p>';

/*
TOPIC 2: ARRAYS
*/

/*
2.1 Declare variable as an empty array.
*/

$array21 = array();
echo $nl . '<p>Task 2.1: Declare variable as an empty array.</p>';
echo '<pre>' . print_r($array21, true) . '</pre>';


/*
2.2 Add five values, one at a time, to the above array (as a simple array)
*/

$array21[0] = 'red';
$array21[1] = 'orange';
$array21[2] = 'yellow';
$array21[3] = 'green';
$array21[4] = 'blue';

echo $nl . '<p>Task 2.2: Add five values, one at a time, to the above array (as a simple array)</p>';
echo '<pre>' . print_r($array21, true) . '</pre>';

/*
2.3 Create a simple array with 5 values already in the array when you declare it.
*/

$array23 = array('indigo','violet','black','white','grey');
echo $nl . '<p>Task 2.3: Create a simple array with 5 values already in the array when you declare it.</p>';
echo '<pre>' . print_r($array23, true) . '</pre>';

/*
2.4 Use print_r() on one of the arrays above
*/

echo $nl . '<p>Task 2.4: Use print_r() on one of the arrays above</p>';
echo print_r($array23, true);

/*
2.5 Use print_r() surrounded by <pre> tags on one of the arrays above.
*/

echo $nl . '<p>Task 2.5: Use print_r() surrounded by pre tags on one of the arrays above.</p>';
echo '<pre>' . print_r($array23, true) . '</pre>';

/*
2.6 Combine the two arrays into one array.
*/

$array26 = array_merge($array21, $array23);
echo $nl . '<p>Task 2.6: Combine the two arrays into one array.</p>';
echo '<pre>' . print_r($array26, true) . '</pre>';

/*
2.7 Use print_r() surrounded by <pre> tags on the combined array.
*/

echo $nl . '<p>Task 2.7: Use print_r() surrounded by pre tags on the combined array.</p>';
echo '<pre>' . print_r($array26, true) . '</pre>';

/*
2.8 Sort the combined array alphabetically and use print_r() surrounded by <pre> tags on the array.
*/

sort($array26);
echo $nl . '<p>Task 2.8: Sort the combined array alphabetically and use print_r() surrounded by pre tags on the array.</p>';
echo '<pre>' . print_r($array26, true) . '</pre>';

/*
2.9 Sort the combined array in reverse alphabetical order and use print_r() surrounded by <pre> tags on the array.
*/

rsort($array26);
echo $nl . '<p>Task 2.9: Sort the combined array in reverse alphabetical order and use print_r() surrounded by pre tags on the array.</p>';
echo '<pre>' . print_r($array26, true) . '</pre>';

/*
2.10 Set a new variable to the resulting value of using implode() on the combined array, and echo the result to the web page,
THEN paste the result into a PHP comment.
*/

$var210 = implode(', ', $array26);
echo $nl . '<p>Task 2.10: Set a new variable to the resulting value of using implode() on the combined array, and echo the result to the web page,
THEN paste the result into a PHP comment.</p>';
echo $nl . '<p>' . $var210 . '</p>';

// Result: yellow, white, violet, red, orange, indigo, grey, green, blue, black

/*
2.11 Use a built-in PHP function to count the total number of items in the array.
*/

echo $nl . '<p>Task 2.11: Use a built-in PHP function to count the total number of items in the array.</p>';
echo $nl . '<p> There are ' . count($array26) . ' attributes in this array.</p>';

/*
2.12 Echo the second item in the array, using the numeric key of the array.
*/

echo $nl . '<p>Task 2.12: Echo the second item in the array, using the numeric key of the array.</p>';
echo $nl . '<p> The second item in the array is "' . $array26[1] . '".</p>';

/*
2.13 Create a multi-dimensional array of 5 key/value pairs.
*/

$array213 = [
        'California' => 'Sacramento',
        'Virginia' => 'Richmond',
        'Maryland' => 'Annapolis',
        'New York' => 'Albany',
        'New Jersey' => 'Trenton'
];

echo $nl . '<p>Task 2.13: Create a multi-dimensional array of 5 key/value pairs.</p>';
echo '<pre>' . print_r($array213, true) . '</pre>';

/*
2.14 Use a built-in PHP function to sort this array by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

ksort($array213);
echo $nl . '<p>Task 2.14: Use a built-in PHP function to sort this array by the keys, and use print_r() surrounded by pre tags on the array.</p>';
echo '<pre>' . print_r($array213, true) . '</pre>';

/*
2.15 Use a built-in PHP function to sort this array by the values, and use print_r() surrounded by <pre> tags on the array.
*/

asort($array213);
echo $nl . '<p>Task 2.15: Use a built-in PHP function to sort this array by the values, and use print_r() surrounded by pre tags on the array.</p>';
echo '<pre>' . print_r($array213, true) . '</pre>';

/*
2.16 Add another key/value pair to this array, then sort it again by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

$array213['Texas'] = 'Austin';
ksort($array213);
echo $nl . '<p>Task 2.16: Add another key/value pair to this array, then sort it again by the keys, and use print_r() surrounded by pre tags on the array.</p>';
echo '<pre>' . print_r($array213, true) . '</pre>';


/*
TOPIC 3: CONDITIONAL LOGIC
*/


/*
3.1 Write a simple if/else test to see if a variable contains any value, and echo the result to the web page.
*/

$var31 = '';
echo $nl . '<p>Task 3.1: Write a simple if/else test to see if a variable contains any value, and echo the result to the web page.</p>';
if ($var31) {
  echo $nl . '<p>The variable has a value, which is: ' . $var31 . '</p>';
} else {
  echo $nl . '<p>The variable has no value</p>';
}

/*
3.2 Write an if/else test with 4 possibilities. For example, if it is equal to x, y, or z (you can choose what values to test for), else default,
and echo the result to the web page.
*/

$var32 = 'Lenny';
echo $nl . '<p>Task 3.2: Write an if/else test with 4 possibilities. For example, if it is equal to x, y, or z (you can choose what values to test for), else default,
and echo the result to the web page.</p>';
if ($var32 == 'Lenny') {
  echo $nl . '<p>The variable has a value, which is: Lenny</p>';
} elseif ($var32 == 'Charlie') {
  echo $nl . '<p>The variable has a value, which is: Charlie</p>';
} elseif ($var32 == 'Annie') {
    echo $nl . '<p>The variable has a value, which is: Annie</p>';
} elseif ($var32 == 'Katie'){
  echo $nl . '<p>The variable has a value, which is: Katie</p>';
} else {
  echo $nl . '<p>The variable did not match any of our conditions.</p>';
}

/*
3.3 Write a test for the exact same conditions as above, but use switch/case syntax, and echo the result to the web page.
*/

echo $nl . '<p>Task 3.3: Write a test for the exact same conditions as above, but use switch/case syntax, and echo the result to the web page.</p>';
switch ($var32) {
    case 'Lenny':
        echo '<p>The variable has a value, which is: Lenny</p>';
        break;
    case 'Charlie':
        echo '<p>The variable has a value, which is: Charlie</p>';
        break;
    case 'Annie':
        echo '<p>The variable has a value, which is: Annie</p>';
        break;
    case 'Katie':
        echo '<p>The variable has a value, which is: Katie</p>';
        break;
}

/*
3.4 Write an if/else test in which two conditions must both be true, and echo the result to the web page.
*/

$var34 = 17;
echo $nl . '<p>Task 3.4: Write an if/else test in which two conditions must both be true, and echo the result to the web page.</p>';
if ($var34 > 15 && $var34 < 25) {
  echo $nl . '<p>The variable is greater than 15 AND less than 25. The value is: ' . $var34 . '</p>';
} else {
  echo $nl . '<p>The variable is NOT greater than 15 AND less than 25. The value is: ' . $var34 . '</p>';
}

/*
3.5 Write an if/else test in which either one condition or the other must be true, and echo the result to the web page.
*/

$var35 = 17;
echo $nl . '<p>Task 3.5: Write an if/else test in which either one condition or the other must be true, and echo the result to the web page.</p>';
if ($var35 < 15 || $var35 > 25) {
  echo $nl . '<p>The variable is less than 15 OR greater than 25. The value is: ' . $var35 . '</p>';
} else {
  echo $nl . '<p>The variable is NOT less than 15 OR greater than 25. The value is: ' . $var35 . '</p>';
}

/*
3.6 Write an if/else test in which either two conditions must both be true or another condition must be true, and echo the result to the web page.
*/

$var36 = 15;
echo $nl . '<p>Task 3.6: Write an if/else test in which either two conditions must both be true or another condition must be true, and echo the result to the web page.</p>';
if (($var36 > 15 && $var36 % 2 == 0) || $var36 < 15) {
  echo $nl . '<p>The variable is less than 15 OR greater than 15 AND even. The value is: ' . $var35 . '</p>';
} else {
  echo $nl . '<p>The variable is NOT less than 15 OR greater than 15 AND even. The value is: ' . $var35 . '</p>';
}

/*
3.7 Write an if/else test using the not operator (the exclamation mark), and echo the result to the web page.
*/

$var37 = 11;
echo $nl . '<p>Task 3.7: Write an if/else test using the not operator (the exclamation mark), and echo the result to the web page.</p>';
if ($var37 != 10) {
  echo $nl . '<p>The variable is not 10.</p>';
} else {
  echo $nl . '<p>The variable is 10.</p>';
}

/*
3.8 Write an if/else test to find out if the first character of a string is the letter "A", and echo the result to the web page.
*/

$var38 = 'Afternoon';
echo $nl . '<p>Task 3.8: Write an if/else test to find out if the first character of a string is the letter "A", and echo the result to the web page.</p>';
if ($var38[0] == 'A') {
  echo $nl . '<p>The variable begins with the letter \'A\'.</p>';
} else {
  echo $nl . '<p>The variable does not begin with the letter \'A\'.</p>';
}

/*
3.9 Write an if/else test to find out if a variable value is an integer, or an array, or if neither, and echo the result to the web page.
*/

$var39 = 'None';
echo $nl . '<p>Task 3.9: Write an if/else test to find out if a variable value is an integer, or an array, or if neither, and echo the result to the web page.</p>';
if (is_int($var39)) {
  echo $nl . '<p>The variable is an integer.</p>';
} elseif (is_array($var39)) {
  echo $nl . '<p>The variable is an array.</p>';
} else {
  echo $nl . '<p>The variable is neither an integer nor an array.</p>';
}

/*
3.10 Write an if/else test to find out if a simple array contains a particular value
(you can use one of your simple arrays that you created earlier in this file), and echo the result to the web page.
*/

$array310 = $array213;
echo $nl . '<p> Task 3.10: Write an if/else test to find out if a simple array contains a particular value.</p>';
if (in_array('Sacramento',$array310)) {
  echo $nl . '<p>The value is in the array.</p>';
} else {
  echo $nl . '<p>The value is NOT in the array.</p>';
}

/*
3.11 Use the null coalescing operator to set the value of a variable to either:
1. the value of another variable, if it is not empty, or
2. a default value
and echo the resulting value of the variable to the web page.
*/

$var311a = null;
$var311b = 'Default Value';
$var311c = $var311a ?? $var311b;
echo $nl . '<p> Task 3.11: Use the null coalescing operator.</p>';
echo $nl . $var311c;

/*
TOPIC 4: MATH CALCULATIONS
*/

/*
4.1 Create two variables as integers, then create a third variable as the sum of the first two, and echo the result to the web page.
*/

$var41a = 41;
$var41b = 42;
$var41c = $var41a+$var41b;
echo $nl . '<p> Task 4.1: Sum.</p>';
echo $nl . '<p>The sum of the first variable (' . $var41a . ') and the second variable (' . $var41b . ') is: ' . $var41c . '.</p>';


/*
4.2 Create another variable as the product (multiplied value) of the two variables, and echo the result to the web page.
*/

$var42a = 5;
$var42b = 4;
$var42c = $var42a * $var42b;
echo $nl . '<p> Task 4.2: Product.</p>';
echo $nl . '<p>The product of the first variable (' . $var42a . ') and the second variable (' . $var42b . ') is: ' . $var42c . '.</p>';

/*
4.3 Create another variable as the quotient (divided by) of the two variables, and echo the result to the web page.
*/

$var43a = 50;
$var43b = 4;
$var43c = $var43a / $var43b;
echo $nl . '<p> Task 4.3: Quotient.</p>';
echo $nl . '<p>The quotient of the first variable (' . $var43a . ') and the second variable (' . $var43b . ') is: ' . $var43c . '.</p>';



/*
TOPIC 5: LOOPS
*/

/*
5.1 Write a for() loop to echo each value of a simple array (you can use one of your arrays above), with each item on its own line on the web page.
*/

$array51 = $array21;
echo $nl . '<p> Task 5.1: Write a for() loop to echo each value of a simple array (you can use one of your arrays above), with each item on its own line on the web page.</p>';
for($x=0; $x<count($array51); $x++) {
  echo '<pre>' . $array51[$x] . '</pre>';
}

/*
5.2 Write a while() loop to do the same task as above.
*/

$array52 = $array51;
$x = 0;
echo $nl . '<p>Task 5.2: Write a while() loop to do the same task as above.</p>';
while ($x < count($array52)) {
  echo '<pre>' . $array52[$x] . '</pre>';
  $x = $x+1;
}

/*
5.3 Write a foreach() loop to do the same task as above.
*/

$array53 = $array52;
echo $nl . '<p> Task 5.3: Write a foreach() loop to do the same task as above.</p>';
foreach($array53 as $value) {
  echo '<pre>' . $value . '</pre>';
}

/*
5.4 Write a foreach() loop to echo the key/value pairs of a multidimensional array (you can use one of your multidimensional arrays above).
*/

$array54 = $array213;
echo $nl . '<p> Task 5.4: Write a foreach() loop to echo the key/value pairs of a multidimensional array (you can use one of your multidimensional arrays above).</p>';
foreach($array54 as $key => $value) {
  echo '<pre>' . "$key = $value" . '</pre>';
}

/*
5.5 Write a foreach() loop to find out if a multidimensional array contains a particular KEY, and echo the result to the web page.
*/

$array55 = $array54;
$var55 = 'California';
echo $nl . '<p> Task 5.4: Write a foreach() loop to find out if a multidimensional array contains a particular KEY, and echo the result to the web page.</p>';
foreach($array54 as $key => $value) {
  if ($key == $var55) {
  echo '<pre>' . "$key = $value" . '</pre>';
  }
}

/*
5.6 Write a foreach() loop to find out if a multidimensional array contains a particular VALUE, and echo the result to the web page.
*/

$array56 = $array55;
$var56 = 'Albany';
echo $nl . '<p> Task 5.6: Write a foreach() loop to find out if a multidimensional array contains a particular VALUE, and echo the result to the web page.</p>';
foreach($array55 as $key => $value) {
  if ($value == $var56) {
  echo '<pre>' . "$key = $value" . '</pre>';
  }
}

/*
TOPIC 6: FUNCTIONS
*/

/*
6.1 Write a function to do the task in exercise 5.5 above, and send an array into that function,
plus the value to check for (2 parameters in total), and echo the result to the web page.
You don't have to write new logic here. Just take the same logic as in 5.5. and wrap it in a function.
*/

$array66 = $array56;
function arrayCheckValue($array, $val) {
  $output = '';
  foreach($array as $key => $value) {
    if ($value == $val) {
    $output .= '<pre>' . "$key = $value" . '</pre>';
    }
  }
  return $output;
}

echo $nl . '<p> Task 6.1: Write a function to do the task in exercise 5.5 above.</p>';
echo arrayCheckValue($array66, 'Trenton');

/*
6.2 Create another function that can check either the key or the value (the logic from 5.5. and 5.6 above). To call this function,
you want to send three parameters to it:
1. an array
2. the value you want to find
3. whether to search for it in the key or in the value of the array's key/value pairs.
*/

$array67 = $array66;
function arrayCheckKeyOrValue($array, $val, $keyOrValue) {
  $output = '';
  foreach($array as $key => $value) {
    if ($value == $val && $keyOrValue == 'Value') {
    $output .= '<pre>' . "$key = $value" . '</pre>';
    }
    if ($key == $val && $keyOrValue == 'Key') {
    $output .= '<pre>' . "$key = $value" . '</pre>';
    }
  }
  return $output;
}

echo $nl . '<p> Task 6.2: Create another function that can check either the key or the value.</p>';
echo arrayCheckKeyOrValue($array67, 'Texas', 'Key');

?>
</body>
</html>

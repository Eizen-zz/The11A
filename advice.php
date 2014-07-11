<?php

$today = date(l);

$file= fopen("advice.txt", "r");

if ($file) 
{
while (!feof($file))

{

$massiv [] = fgets($file);

}
}
else
echo "error";

switch ($today)

{

case Monday:

{

$number = rand(0,19);

echo ("$massiv[$number]");

}
break;

case Tuesday:

{

$number = rand(20,39);

echo ("$massiv[$number]");

}
break;

case Wednesday:

{

$number = rand(40,59);

echo ("$massiv[$number]");

}
break;

case Thursday:

{

$number = rand(60,79);

echo ("$massiv[$number]");
}
break;

case Friday:

{

$number = rand(80,99);

echo ("$massiv[$number]");
}
break;

case Saturday:

{

$number = rand(100,119);

echo ("$massiv[$number]");

}
break;

case Sunday:

{

$number = rand(120,139);

echo ("$massiv[$number]");
}
break;

}

?>
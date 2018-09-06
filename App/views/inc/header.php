<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVC</title>
</head>
<link rel="shortcut icon" href="">
<link href="https://fonts.googleapis.com/css?family=Inconsolata|M+PLUS+Rounded+1c" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href=<?php echo URLROOT.'public/css/style.css'?> rel="stylesheet">
<body>
<div class="row" id="wrapper_div">
    <div id='mobile'>
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
     width="50" height="50"
     viewBox="0 0 252 252"
     style="fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,252v-252h252v252z" fill="none"></path><g><g id="surface1"><path d="M120.75,78.75h99.75v10.5h-99.75zM120.75,115.5h99.75v-10.5h-99.75zM105,141.75h115.5v-10.5h-115.5zM105,168h115.5v-10.5h-115.5z" fill="#ffffff"></path><path d="M136.5,107.625c0,4.34766 -3.52734,7.875 -7.875,7.875c-4.34766,0 -7.875,-3.52734 -7.875,-7.875c0,-4.34766 3.52734,-7.875 7.875,-7.875c4.34766,0 7.875,3.52734 7.875,7.875M68.25,107.625c0,-4.34766 -3.52734,-7.875 -7.875,-7.875c-4.34766,0 -7.875,3.52734 -7.875,7.875c0,4.34766 3.52734,7.875 7.875,7.875c4.34766,0 7.875,-3.52734 7.875,-7.875" fill="#ffa726"></path><path d="M115.5,152.25c0,0 0,21 -21,21c-21,0 -21,-21 -21,-21" fill="#ff9800"></path><path d="M114.1875,152.25l-19.6875,4.04004l-19.6875,-4.04004c0,0 -43.3125,8.01856 -43.3125,52.5h126c0,-44.31738 -43.3125,-52.5 -43.3125,-52.5" fill="#27ae60"></path><path d="M94.5,173.25c-21,0 -21,-21 -21,-21v-21h42v21c0,0 0,21 -21,21z" fill="#ff9800"></path><path d="M131.25,87.56836c0,-30.86426 -73.5,-20.09766 -73.5,0v23.05078c0,20.07714 16.44727,36.38086 36.75,36.38086c20.30274,0 36.75,-16.30371 36.75,-36.38086z" fill="#ffb74d"></path><path d="M94.5,183.75c16.05762,0 29.28516,-12.01758 31.2334,-27.5625c-4.65527,-2.09179 -8.42871,-3.17871 -10.27441,-3.62988c-0.14356,11.44336 -9.47461,20.69238 -20.95899,20.69238c-11.50488,0 -20.81543,-9.24902 -20.95898,-20.71289c-1.86621,0.45117 -5.63965,1.53808 -10.27442,3.60938c1.92774,15.54492 15.15527,27.60351 31.2334,27.60351z" fill="#01579b"></path><path d="M94.5,47.25c-25.51172,0 -42,22.64063 -42,42.90234v9.59766l10.5,10.5v-21l48.2959,-15.75l14.7041,15.75v21l10.5,-10.5v-4.24512c0,-16.89844 -4.34766,-35.72461 -25.2041,-39.86719l-4.2041,-8.38769z" fill="#424242"></path><path d="M105,105c0,-2.8916 2.3584,-5.25 5.25,-5.25c2.8916,0 5.25,2.3584 5.25,5.25c0,2.8916 -2.3584,5.25 -5.25,5.25c-2.8916,0 -5.25,-2.3584 -5.25,-5.25M73.5,105c0,2.8916 2.3584,5.25 5.25,5.25c2.8916,0 5.25,-2.3584 5.25,-5.25c0,-2.8916 -2.3584,-5.25 -5.25,-5.25c-2.8916,0 -5.25,2.3584 -5.25,5.25" fill="#784719"></path></g></g></g></svg>
</div>